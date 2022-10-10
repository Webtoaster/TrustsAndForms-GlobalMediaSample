<?php

namespace App\Controller\Signup;

use App\Controller\BaseController;
use App\Entity\User;
use App\Form\Signup\SignupFormType;
use App\Repository\UserRepository;
use App\Security\EmailVerifier;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;
use SymfonyCasts\Bundle\VerifyEmail\VerifyEmailHelperInterface;
use Symfony\Component\Mime\Address;

#[Route('/signup')]
class SignupController extends BaseController
{

    public EmailVerifier $emailVerifier;

    public function __construct(EmailVerifier $emailVerifier)
    {
        $this->emailVerifier = $emailVerifier;
    }

    /**
     * Step 1 for customer registration.
     *
     * @param Request                     $request
     * @param UserPasswordHasherInterface $userPasswordHasher
     * @param ManagerRegistry             $doctrine
     *
     * @return Response
     */
    #[Route('/', name: 'app_signup')]
    public function register(
        Request $request,
        UserPasswordHasherInterface $userPasswordHasher,
        ManagerRegistry $doctrine
    ): Response {
        $user = new User();
        $form = $this->createForm(SignupFormType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $user->getPlainPassword()
                )
            );
            $user->setRoles(['ROLE_UNVERIFIED_EMAIL']);
            $entityManager = $doctrine->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // generate a signed url and email it to the user
            try {
                $this->emailVerifier->sendEmailConfirmation(
                    'app_verify_email',
                    $user,
                    (new TemplatedEmail())
                        ->from(
                            new Address(
                                $this->getParameter('app.signup_email_address'),
                                $this->getParameter('app.signup_email_name')
                            )
                        )
                        ->to($user->getEmail())
                        ->subject('Email Signup Confirmation')
                        ->htmlTemplate('registration/confirmation_email.html.twig')
                );
            } catch (TransportExceptionInterface $e) {
                $e->appendDebug('Email not sent.');
            }
            return $this->redirectToRoute('app_check_email_to_verify');
        }

        return $this->renderForm('signup/signup_one_personal_information.html.twig', [
            'form'       => $form,
            'page_title' => 'User Signup',
        ]);
    }

    /**
     * Step 2
     * After registration in the method above, send the user to a page where they can
     * get the instruction to verify their email address.
     */
    #[Route('/check_your_email', name: 'app_check_email_to_verify')]
    public function send_to_email(): Response
    {
        return $this->render('signup/signup_two_check_email.html.twig', [
            'page_title' => 'Check Your Email',
        ]);
    }

    /**
     * This is where the user is sent when they click on the email link.
     *
     * @param Request                    $request
     * @param VerifyEmailHelperInterface $verifyEmailHelper
     * @param UserRepository             $userRepository
     * @param EntityManagerInterface     $entityManager
     *
     * @return Response
     */
    #[Route('/verify', name: 'app_verify_email')]
    public function verifyUserEmail(
        Request $request,
        VerifyEmailHelperInterface $verifyEmailHelper,
        UserRepository $userRepository,
        EntityManagerInterface $entityManager
    ): Response {
        $user = $userRepository->find($request->query->get('id'));
        if (!$user) {
            throw $this->createNotFoundException();
        }
        try {
            $verifyEmailHelper->validateEmailConfirmation(
                $request->getUri(),
                $user->getId(),
                $user->getEmail(),
            );
        } catch (VerifyEmailExceptionInterface $e) {
            $this->addFlash('error', $e->getReason());
            return $this->redirectToRoute('app_signup');
        }
        $user->setIsVerified(true);
        $user->addRoles(['ROLE_VERIFIED_EMAIL']);
        $user->removeRoles(['ROLE_UNVERIFIED_EMAIL']);
        $entityManager->flush();
        $this->addFlash('success', 'Account Verified! You can now log in.');
        return $this->redirectToRoute('app_login');
    }

    #[Route('/verify/resend', name: 'app_verify_resend_email')]
    public function resendVerifyEmail(): Response
    {
        return $this->render('registration/resend_verify_email.html.twig');
    }

}