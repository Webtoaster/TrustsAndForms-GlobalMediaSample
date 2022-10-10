<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends BaseController
{

    public EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'app_homepage')]
    public function index(): Response
    {
        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
        ]);
    }

    #[Route('/about', name: 'app_about')]
    public function about(): Response
    {
        return $this->render('home/about.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/disclaimer', name: 'app_policy_disclaimer')]
    public function disclaimer(): Response
    {
        return $this->render('home/disclaimer.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/faq', name: 'app_faq')]
    public function faq(): Response
    {
        return $this->render('home/faq.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/terms_of_service', name: 'app_policy_tos')]
    public function terms_of_service(): Response
    {
        return $this->render('home/terms_of_service.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/privacy_policy', name: 'app_policy_privacy')]
    public function privacy_policy(): Response
    {
        return $this->render('home/privacy_policy.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/acceptable_use', name: 'app_policy_acceptable_use')]
    public function acceptable_use(): Response
    {
        return $this->render('home/acceptable_use.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

}