<?php

namespace App\Form;

use App\Form\Model\TransferAssessmentModel;
use App\Service\Options;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TransferAssessmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'userRole',
                ChoiceType::class,
                [
                    //  Radio Buttons
                    'expanded' => false,
                    'multiple' => false,
                    //  Label
                    'label' => 'Which Option Describes Your Role?:',
                    'label_attr'=>[
                        'class' => 'label-ul control-label'
                    ],
                    'placeholder' => '---- Select One ----',
                    //  Display Choices
                    'choices' => Options::OPTIONS_ASSESSMENT_USER_ROLE,
                    'mapped' => true,
                    'required' => true,
                    'invalid_message' => 'Required: You must select the Option that describes your role.',
                ]
            )
            ->add(
                'userAction',
                ChoiceType::class,
                [
                    //  Radio Buttons
                    'expanded' => false,
                    'multiple' => false,
                    'placeholder' => '---- Select One ----',
                    //  Label
                    'label' => 'Which Option Describes Your Intent?:',
                    'label_attr'=>[
                        'class' => 'label-ul control-label'
                    ],

                    //  Display Choices
                    'choices' => [
                        'Make, using raw materials or by converting an existing firearm into, a:' => Options::OPTIONS_ASSESSMENT_USER_ACTION_MAKE,
                        'Purchase one of the following items that is currently in the possession of an individual, trust, corporation or other legal entity that does not hold a Federal Firearms License:' => Options::OPTIONS_ASSESSMENT_USER_ACTION_PURCHASE_IND,
                        'Purchase from a Seller that is a Federal Firearms Licensee, one of the following items that is currently in their possession:' => Options::OPTIONS_ASSESSMENT_USER_ACTION_PURCHASE_FFL,
                    ],
                    'mapped' => true,
                    'required' => true,
                    'invalid_message' => 'Required: You must select the Option that describes what you are making or purchasing.',
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TransferAssessmentModel::class,
        ]);
    }
}