<?php

namespace App\Controller\Assessment;

use App\Controller\BaseController;
use App\Form\Model\TransferAssessmentModel;
use App\Form\TransferAssessmentType;
use App\Service\Options;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/assessment')]
class AssessmentController extends BaseController
{

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    private RequestStack $requestStack;

    #[Route('/step-1', name: 'app_assessment')]
    public function index(Request $request): Response
    {
        $assessment = new TransferAssessmentModel();

        $form = $this->createForm(TransferAssessmentType::class, $assessment);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $options = Options::DEFAULT_ASSESSMENT_OPTIONS;

            $options['userRole'] = $assessment->getUserRole();
            $options['userAction'] = $assessment->getUserAction();

            //  Break down the second part of the answer into the $options array
            $action = explode('-', $assessment->getUserAction());
            $options['method'] = $action[0];
            $options['source'] = $action[1];
            $options['propertyType'] = $action[2];

            if ($options['userRole'] === 'representative') {
                $options['form_rp'] = true;
            }

            if ($options['method'] === 'purchase') {
                $options['form_1'] = false;
                $options['form_4'] = true;
                $options['form_5'] = false;
            }

            if ($options['method'] === 'make') {
                $options['form_1'] = true;
                $options['form_4'] = false;
                $options['form_5'] = false;
            }

            if ($options['method'] === 'transfer') {
                $options['form_1'] = false;
                $options['form_4'] = false;
                $options['form_5'] = true;
            }

            if ($options['source'] === 'ffl') {
                $options['transfereeIsFFL'] = false;
                $options['transferorIsFFL'] = true;
            }

            $session = $this->requestStack->getSession();
            $session->set('options', $options);

            return $this->redirectToRoute('app_atf_master');
        }

        return $this->renderForm('assessment/index.html.twig', [
            'form' => $form,
        ]);
    }
}