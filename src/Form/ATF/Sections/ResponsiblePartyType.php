<?php

namespace App\Form\ATF\Sections;

use App\Service\Options;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResponsiblePartyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add(
            'rpName1',
            TextType::class,
            [
                'label'      => 'Legal Name (Party #1)',
                'label_attr' => [
                    'class' => 'label-ul',
                ],
                'attr'       => ['maxlength' => 62],
            ]
        )
            ->add(
                'rpEmail1',
                EmailType::class,
                [
                    'label'      => 'Email Address (Party #1)',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'attr'       => ['maxlength' => 128],
                ]
            )
            ->add(
                'rpName2',
                TextType::class,
                [
                    'label'      => 'Legal Name (Party #2)',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'attr'       => ['maxlength' => 62],
                ]
            )
            ->add(
                'rpEmail2',
                EmailType::class,
                [
                    'label'      => 'Email Address (Party #2)',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'attr'       => ['maxlength' => 128],
                ]
            )
            ->add(
                'rpName3',
                TextType::class,
                [
                    'label'      => 'Legal Name (Party #3)',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'attr'       => ['maxlength' => 62],
                ]
            )
            ->add(
                'rpEmail3',
                EmailType::class,
                [
                    'label'      => 'Email Address (Party #3)',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'attr'       => ['maxlength' => 128],
                ]
            )
            ->add(
                'rpName4',
                TextType::class,
                [
                    'label'      => 'Legal Name (Party #4)',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'attr'       => ['maxlength' => 62],
                ]
            )
            ->add(
                'rpEmail4',
                EmailType::class,
                [
                    'label'      => 'Email Address (Party #4)',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'attr'       => ['maxlength' => 128],
                ]
            )
            ->add(
                'rpName5',
                TextType::class,
                [
                    'label'      => 'Legal Name (Party #5)',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'attr'       => ['maxlength' => 62],
                ]
            )
            ->add(
                'rpEmail5',
                EmailType::class,
                [
                    'label'      => 'Email Address (Party #5)',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'attr'       => ['maxlength' => 128],
                ]
            )
            ->add(
                'rpName6',
                TextType::class,
                [
                    'label'      => 'Legal Name (Party #6)',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'attr'       => ['maxlength' => 62],
                ]
            )
            ->add(
                'rpEmail6',
                EmailType::class,
                [
                    'label'      => 'Email Address (Party #6)',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'attr'       => ['maxlength' => 128],
                ]
            );

        if ($options['form_4'] === true) {
            $builder
                ->add(
                    'rpName7',
                    TextType::class,
                    [
                        'label'      => 'Legal Name (Party #7)',
                        'label_attr' => [
                            'class' => 'label-ul',
                        ],
                        'attr'       => ['maxlength' => 62],
                    ]
                )
                ->add(
                    'rpEmail7',
                    EmailType::class,
                    [
                        'label'      => 'Email Address (Party #7)',
                        'label_attr' => [
                            'class' => 'label-ul',
                        ],
                        'attr'       => ['maxlength' => 128],
                    ]
                )
                ->add(
                    'rpName8',
                    TextType::class,
                    [
                        'label'      => 'Legal Name (Party #8)',
                        'label_attr' => [
                            'class' => 'label-ul',
                        ],
                        'attr'       => ['maxlength' => 62],
                    ]
                )
                ->add(
                    'rpEmail8',
                    EmailType::class,
                    [
                        'label'      => 'Email Address (Party #8)',
                        'label_attr' => [
                            'class' => 'label-ul',
                        ],
                        'attr'       => ['maxlength' => 128],
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