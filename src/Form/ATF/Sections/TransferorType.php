<?php

namespace App\Form\ATF\Sections;

use App\Service\Options;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TransferorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add(
            'transferorName',
            TextType::class,
            [
                'label'      => 'Full Legal Name',
                'label_attr' => [
                    'class' => 'label-ul',
                ],
                'trim'       => true,
                'attr'       => ['maxlength' => 128],
            ]
        );

        $builder->add(
            'transferorTitle',
            TextType::class,
            [
                'label'      => 'Title',
                'label_attr' => [
                    'class' => 'label-ul',
                ],
                'trim'       => true,
                'attr'       => ['maxlength' => 128],
            ]
        );

        // $builder
        //     ->add(
        //         'transferorNameAndTitle',
        //         TextType::class,
        //         [
        //             'label' => 'Name',
        //             'trim' => true,
        //             'attr'=>['maxlength' => 128]
        //         ]
        //     )
        // ;

        $builder->add(
            'transferorLine1',
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
            ->add(
                'transferorLine2',
                TextType::class,
                [
                    'label'      => 'Line 2',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'trim'       => true,
                    'attr'       => ['maxlength' => 128],
                ]
            )
            ->add(
                'transferorCity',
                TextType::class,
                [
                    'label'      => 'City',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'trim'       => true,
                    'attr'       => ['maxlength' => 128],
                ]
            )
            ->add(
                'transferorState',
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
                'transferorZipcode',
                TextType::class,
                [
                    'label'      => 'ZipCode',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'trim'       => true,
                    'attr'       => ['maxlength' => 10],
                ]
            )
            // ->add(
            //     'transferorCounty',
            //     TextType::class,
            //     [
            //         'label' => 'County',
            //         'trim'  => true,
            //         'attr'  => ['maxlength' => 128],
            //     ]
            // )

        ;

        $builder->add(
            'transferorPhone',
            TextType::class,
            [
                'label'      => 'Telephone Number',
                'label_attr' => [
                    'class' => 'label-ul',
                ],
                'trim'       => true,
                'attr'       => ['maxlength' => 14],
            ]
        );
        $builder->add(
            'transferorEmail',
            EmailType::class,
            [
                'label'      => 'Email Address',
                'label_attr' => [
                    'class' => 'label-ul',
                ],
                'attr'       => [
                    'placeholder'  => 'me@my_domain.com',
                    'autocomplete' => 'username',
                ],
            ]
        );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $options = Options::DEFAULT_ASSESSMENT_OPTIONS;
        $options['inherit_data'] = true;
        $resolver->setDefaults($options);
    }
}