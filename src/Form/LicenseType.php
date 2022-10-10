<?php

namespace App\Form;

use App\Entity\License;
use App\Form\Model\LicenseLookupModel;
use App\Service\Options;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LicenseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add(
            //     'state',
            //     ChoiceType::class,
            //     [
            //         'label'=>'Select State',
            //         'choices'=>Options::OPTIONS_STATES,
            //     ]
            // )

            ->add(
                'state',
                ChoiceType::class,
                [
                    'label' => 'State',
                    'label_attr'=>[
                        'class' => 'label-ul'
                    ],
                    'placeholder' => '---- Select State ----',
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => Options::OPTIONS_STATES,
                    'mapped' => true,
                ]
            )
            ->add(
                'name',
                TextType::class,
                [
                    'label' => 'Dealer Name',
                    'mapped' => true,
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LicenseLookupModel::class,
        ]);
    }
}