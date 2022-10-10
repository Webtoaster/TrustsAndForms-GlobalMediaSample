<?php

namespace App\Form\ATF\Sections;

use App\Service\Options;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TransfereeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        if ($options['userRole'] === 'individual') {
            $builder->add(
                'applicantName',
                TextType::class,
                [
                    'label'      => 'Applicant\'s Legal Name',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'attr'       => ['maxlength' => 128],

                ]
            );

            $builder->add(
                'applicantTitle',
                TextType::class,
                [
                    'label'      => 'Applicant\'s Legal Title',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'attr'       => ['maxlength' => 128],
                    'help'       => 'If this is a Trust, use Trustee.  Other Titles include Member, Manager, etc..',
                ]
            );

        }





        if ($options['userRole'] === 'representative') {
            $builder->add(
                'applicantName',
                TextType::class,
                [
                    'label'      => 'Applicant\'s Legal Name',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'attr'       => ['maxlength' => 128],

                ]
            );

            $builder->add(
                'applicantTitle',
                TextType::class,
                [
                    'label'      => 'Applicant\'s Legal Title',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'attr'       => ['maxlength' => 128],
                    'help'       => 'If this is a Trust, use Trustee.  Other Titles include Member, Manager, etc..',
                ]
            );

            $builder->add(
                'transfereeName',
                TextType::class,
                [
                    'label'      => 'Legal Name of Organization',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'attr'       => ['maxlength' => 128],
                ]
            );
        }

        // Address Elements of the Transferee
        $builder->add(
            'transfereeLine1',
            TextType::class,
            [
                'label'      => 'Line 1',
                'label_attr' => [
                    'class' => 'label-ul',
                ],
                'attr'       => ['maxlength' => 128],
            ]
        )
            ->add(
                'transfereeLine2',
                TextType::class,
                [
                    'label'      => 'Line 2',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'attr'       => ['maxlength' => 128],
                ]
            )
            ->add(
                'transfereeCity',
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
                'transfereeState',
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
                'transfereeZipcode',
                TextType::class,
                [
                    'label'      => 'ZipCode',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'attr'       => ['maxlength' => 10],
                ]
            );

        /*
         * RE: Transferee's...
         * If this is a Form 1, You need....
         *                  County, Telephone Number and Email Address
         * If this is a Form 4, You need....
         *                  County Only (The get the rest from the Transferor)
         * If this is a Form 5, You need....
         *                  County Only (Who knows why?)
         */

        if ($options['form_1'] === true) {
            $builder->add(
                'transfereeCounty',
                TextType::class,
                [
                    'label'      => 'County',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'attr'       => ['maxlength' => 128],
                ]
            );

            $builder->add(
                'transfereeAlternateAddress',
                TextType::class,
                [
                    'label'      => 'Alternate Physical Address',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'attr'       => ['maxlength' => 128],
                ]
            );


            $builder->add(
                'transfereePhone',
                TextType::class,
                [
                    'label'      => 'Telephone Number',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'attr'       => ['maxlength' => 14],
                ]
            );
            $builder->add(
                'transfereeEmail',
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

        if ($options['form_4'] === true) {
            $builder->add(
                'transfereeCounty',
                TextType::class,
                [
                    'label'      => 'County',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'attr'       => ['maxlength' => 128],
                ]
            );
        }
        if ($options['form_5'] === true) {
            $builder->add(
                'transfereeCounty',
                TextType::class,
                [
                    'label'      => 'County',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'attr'       => ['maxlength' => 128],
                ]
            );
        }






        /*
         * This is for Form 1 that is a submitted by a representative.
         */
        if ($options['form_1'] === true && $options['userRole'] === 'representative') {
            $builder
                ->add(
                    'typeTransferee',
                    ChoiceType::class,
                    [
                        'label'       => 'Type of Organization',
                        'label_attr' => [
                            'class' => 'label-ul',
                        ],
                        'placeholder' => '-- Select Answer --',
                        'expanded'    => false,
                        'multiple'    => false,
                        'choices'     => Options::OPTIONS_REPRESENTATIVE_FORM_1_PARTY_TYPE,
                    ]
                );
            $builder->add(
                'transfereeTradeName',
                TextType::class,
                [
                    'label'      => 'Trade name (If any)',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'attr'       => ['maxlength' => 128],
                    'help'       => '(Rarely does this apply.  Better left empty.)',
                ]
            );
        }

        /*
         * This is for Form 4 that is a submitted by a representative.
         */
        if ($options['form_4'] === true && $options['userRole'] === 'representative') {
            $builder
                ->add(
                    'typeTransferee',
                    ChoiceType::class,
                    [
                        'label'       => 'Type of Organization',
                        'label_attr' => [
                            'class' => 'label-ul',
                        ],
                        'placeholder' => '-- Select Answer --',
                        'expanded'    => false,
                        'multiple'    => false,
                        'choices'     => Options::OPTIONS_REPRESENTATIVE_FORM_4_PARTY_TYPE,
                    ]
                );

        }

        /*
         * This is for Form 5 that is a submitted by a representative.
         */
        if ($options['form_5'] === true && $options['userRole'] === 'representative') {
            $builder
                ->add(
                    'typeTransferee',
                    ChoiceType::class,
                    [
                        'label'       => 'Type of Organization',
                        'label_attr' => [
                            'class' => 'label-ul',
                        ],
                        'placeholder' => '-- Select Answer --',
                        'expanded'    => false,
                        'multiple'    => false,
                        'choices'     => Options::OPTIONS_REPRESENTATIVE_FORM_5_PARTY_TYPE,
                    ]
                );

        }


        /*
         * This is for forms submitted by individuals.
         */
        if ($options['userRole'] === 'individual') {
            $builder->add(
                'typeTransferee',
                HiddenType::class,
                [
                    'empty_data' => 'individual',
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