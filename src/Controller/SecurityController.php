<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use RuntimeException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

#[Route('/security')]
class SecurityController extends BaseController
{

    public EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        return $this->render('security/login.html.twig', [
            'last_username' => $authenticationUtils->getLastUsername(),
            'error'         => $authenticationUtils->getLastAuthenticationError(),
        ]);
    }

    #[Route('/logout', name: 'app_logout', methods: ['GET'])]
    public function logout(): void
    {
        throw new RuntimeException('You have forgotten to activate logout in security.yaml');
    }

    #[Route('/password/recover', name: 'app_user_recover_password')]
    public function user_recover_password(): Response
    {
        $this->getUser()->eraseCredentials();

        return $this->render('user/recover_password.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

}