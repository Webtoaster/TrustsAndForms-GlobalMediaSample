<?php

namespace App\Form\Embedded;

use App\Service\Options;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'line1',
                TextType::class,
                [
                    'label'    => 'Line 1',
                    'attr'     => [
                        'maxlength' => 128,
                        'tabindex'  => 10001,
                    ],
                    'required' => true,
                ]
            )
            ->add(
                'line2',
                TextType::class,
                [
                    'label'    => 'Line 2',
                    'attr'     => [
                        'maxlength' => 128,
                        'tabindex'  => 10002,
                    ],
                    'required' => false,
                ]

            )
            ->add(
                'city',
                TextType::class,
                [
                    'label'    => 'City',
                    'attr'     => [
                        'maxlength' => 128,
                        'tabindex'  => 10003,
                    ],
                    'required' => true,
                ]
            )
            ->add(
                'state',
                ChoiceType::class,
                [
                    'label'       => 'State',
                    'placeholder' => '---- Select State ----',
                    'expanded'    => false,
                    'multiple'    => false,
                    'choices'     => Options::OPTIONS_STATES,
                    'required'    => true,
                    'attr'        => [
                        'tabindex' => 10004,
                    ],
                ]
            )
            ->add(
                'zipcode',
                TextType::class,
                [
                    'label'    => 'ZipCode',
                    'attr'     => [
                        'maxlength' => 10,
                        'tabindex'  => 10005,
                    ],
                    'required' => true,

                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'inherit_data' => true,
        ]);
    }
}