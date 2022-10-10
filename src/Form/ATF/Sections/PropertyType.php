<?php

namespace App\Form\ATF\Sections;

use App\Service\Options;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PropertyType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add(
            'manufactureName',
            TextType::class,
            [
                'label'      => 'Manufacture&apos;s Name',
                'label_attr' => [
                    'class' => 'label-ul',
                ],
                'trim'       => true,
                'attr'       => ['maxlength' => 128],
            ]
        )
            ->add(
                'manufactureLine1',
                TextType::class,
                [
                    'label'      => 'Line 1',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'trim'       => true,
                    'attr'       => ['maxlength' => 128],
                ]
            )
            // ->add(
            //     'manufactureLine2',
            //     TextType::class,
            //     [
            //         'label' => 'Line 2',
            //         'attr'  => ['maxlength' => 128],
            //     ]
            // )
            ->add(
                'manufactureCity',
                TextType::class,
                [
                    'label'      => 'City',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'attr'       => ['maxlength' => 128],
                ]
            )
            ->add(
                'manufactureState',
                ChoiceType::class,
                [
                    'label'       => 'State',
                    'label_attr'  => [
                        'class' => 'label-ul',
                    ],
                    'placeholder' => '---- Select State ----',
                    'expanded'    => false,
                    'multiple'    => false,
                    'choices'     => Options::OPTIONS_STATES,
                ]
            )
            ->add(
                'manufactureZipcode',
                TextType::class,
                [
                    'label'      => 'ZipCode',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'attr'       => ['maxlength' => 10],
                ]
            );
        $builder->add(
            'model',
            TextType::class,
            [
                'label'      => 'Model',
                'label_attr' => [
                    'class' => 'label-ul',
                ],
                'attr'       => ['maxlength' => 32],
            ]
        )
            ->add(
                'serialNo',
                TextType::class,
                [
                    'label'      => 'Serial Number',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'attr'       => ['maxlength' => 32],
                ]
            )
            ->add(
                'description',
                TextType::class,
                [
                    'label'      => 'Extra Description',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'attr'       => ['maxlength' => 6400],
                ]
            );
        $builder->add(
            'caliber',
            TextType::class,
            [
                'label'      => 'Caliber',
                'label_attr' => [
                    'class' => 'label-ul',
                ],
                'attr'       => ['maxlength' => 16],
            ]
        )
            ->add(
                'caliberUnit',
                ChoiceType::class,
                [
                    'label'       => 'Unit',
                    'label_attr'  => [
                        'class' => 'label-ul',
                    ],
                    'placeholder' => '-- Select Answer --',
                    'expanded'    => false,
                    'multiple'    => false,
                    'choices'     => Options::OPTIONS_CALIBER_MEASUREMENT,
                ]
            )
            ->add(
                'lengthBarrel',
                TextType::class,
                [
                    'label'      => 'Length of Barrel',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'attr'       => ['maxlength' => 16],
                ]
            )
            ->add(
                'lengthOverall',
                TextType::class,
                [
                    'label'      => 'Overall Length',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'attr'       => ['maxlength' => 16],
                ]
            );

        if ($options['form_1'] === true) {
            $builder
                ->add(
                    'ddType',
                    ChoiceType::class,
                    [
                        'label'       => 'Type of destructive device:',
                        'label_attr'  => [
                            'class' => 'label-ul',
                        ],
                        'placeholder' => '---- Select One ----',
                        'expanded'    => false,
                        'multiple'    => false,
                        'choices'     => Options::OPTIONS_FORM_1_DESTRUCTIVE_DEVICE,
                    ]
                )
                ->add(
                    'ddExplosive', TextType::class,
                    [
                        'label'      => 'If an explosive type destructive device, identify the type of explosive(s):',
                        'label_attr' => [
                            'class' => 'label-ul',
                        ],
                        'attr'       => [
                            'maxlength' => 67,
                        ],
                    ]
                )
                ->add(
                    'firearmReactivated',
                    ChoiceType::class,
                    [
                        'label'       => 'Is this firearm being reactivated?',
                        'label_attr'  => [
                            'class' => 'label-ul',
                        ],
                        'placeholder' => '---- Select One ----',
                        'expanded'    => false,
                        'multiple'    => false,
                        'choices'     => Options::OPTIONS_YES_NO_NA,
                    ]
                );
        }

        if ($options['form_5'] === true) {
            $builder
                ->add(
                    'renderedUnserviceable',
                    TextType::class,
                    [
                        'label' => 'Has the Firearm been rendered unserviceable as defined in Definition 1m?',
                        'attr'  => [
                            'maxlength' => 265,
                        ],
                    ]
                );
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $options = Options::DEFAULT_ASSESSMENT_OPTIONS;
        $options['inherit_data'] = true;
        $resolver->setDefaults($options);
    }
}