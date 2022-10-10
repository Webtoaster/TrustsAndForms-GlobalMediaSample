<?php

namespace App\Controller;

use App\Document\ATF;
use App\Form\ATF\ATFMongoFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/atf")
 */
class ATFMasterController extends BaseController
{

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    private RequestStack $requestStack;

    #[Route('/master', name: 'app_atf_master')]
    public function index(Request $request): Response
    {
        $session = $this->requestStack->getSession();

        /*
         * Without the recent evaluation of the for type the user wants to
         * create, the user can't proceed so make them do the form.
         */
        // if ($session->has('options')) {
        //     $options = $session->get('options');
        // } else {
        //     return $this->redirectToRoute('app_assessment');
        // }

        //  CURRENTLY OVERRIDING....
        $options = [
            //  individual/representative
            'userRole'        => 'individual',
            // 'userRole'        => 'representative',

            'userAction'      => 'make-self-sbr',
            'method'          => 'make',
            'source'          => 'self',
            'propertyType'    => 'sup',
            'form_1'          => true,
            'form_4'          => false,
            'form_5'          => false,
            'form_rp'         => false,
            'transfereeIsFFL' => true,
            'transferorIsFFL' => false,
        ];

        $formData = new ATF();

        $form = $this->createForm(ATFMongoFormType::class, $formData, $options);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            dd($form->getData());
        }

        dump($form);

        return $this->renderForm('atf_master/index.html.twig', [
            'form' => $form,

            'options' => $options,
        ]);
    }
}