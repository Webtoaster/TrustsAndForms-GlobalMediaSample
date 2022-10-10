<?php

namespace App\Controller\User;

use App\Controller\BaseController;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @IsGranted("ROLE_USER")
 */
#[Route('/user')]
class UserController extends BaseController
{

    public EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route(
        '/profile/control_panel',
        name: 'app_user_control_panel'
    )]
    public function user_control_panel(): Response
    {
        return $this->render('user/control_panel.html.twig', [
            'controller_name' => 'User Control Panel',
        ]);
    }

    #[Route(
        '/profile/user/edit',
        name: 'app_user_profile_edit'
    )]
    public function user_profile_edit(): Response
    {
        return $this->render('user/profile_edit.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    #[Route(
        '/profile/password/change',
        name: 'app_user_change_password'
    )]
    public function user_password_change(): Response
    {
        return $this->render('user/change_password.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    #[Route(
        '/profile/email/change',
        name: 'app_user_change_email'
    )]
    public function user_email_change(): Response
    {
        return $this->render('user/change_email.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

}