<?php

namespace App\Form\ATF\Sections;

use App\Service\Options;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BackgroundQuestionsType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add(
            'a',
            ChoiceType::class,
            [
                'label'       => 'A. Are you under indictment or information in any court for a felony, or any other crime, for which the judge could imprison you for more than one year?',
                'label_attr'  => [
                    'class' => 'label-ul',
                ],
                'placeholder' => '-- Select Answer --',
                'expanded'    => false,
                'multiple'    => false,
                'choices'     => Options::OPTIONS_YES_NO,
            ]
        )
            ->add(
                'b',
                ChoiceType::class,
                [
                    'label'       => 'B. Have you ever been convicted in any court for a felony, or any other crime, for which the judge could have imprisoned you for more than one year, even if you received a shorter sentence including probation?',
                    'label_attr'  => [
                        'class' => 'label-ul',
                    ],
                    'placeholder' => '-- Select Answer --',
                    'expanded'    => false,
                    'multiple'    => false,
                    'choices'     => Options::OPTIONS_YES_NO,
                ]
            )
            ->add(
                'c',
                ChoiceType::class,
                [
                    'label'       => 'C. Are you a fugitive from justice?',
                    'label_attr'  => [
                        'class' => 'label-ul',
                    ],
                    'placeholder' => '-- Select Answer --',
                    'expanded'    => false,
                    'multiple'    => false,
                    'choices'     => Options::OPTIONS_YES_NO,
                ]
            )
            ->add(
                'd',
                ChoiceType::class,
                [
                    'label'       => 'D. Are you an unlawful user of, or addicted to, marijuana or any depressant, stimulant, narcotic drug, or any other controlled substance? Warning: The use or possession of marijuana remains unlawful under Federal law regardless of whether it has been legalized or decriminalized for medicinal or recreational purposes in the state where you reside.',
                    'label_attr'  => [
                        'class' => 'label-ul',
                    ],
                    'placeholder' => '-- Select Answer --',
                    'expanded'    => false,
                    'multiple'    => false,
                    'choices'     => Options::OPTIONS_YES_NO,
                ]
            )
            ->add(
                'e',
                ChoiceType::class,
                [
                    'label'       => 'E. Have you ever been adjudicated as a mental defective OR have you ever been committed to a mental institution?',
                    'label_attr'  => [
                        'class' => 'label-ul',
                    ],
                    'placeholder' => '-- Select Answer --',
                    'expanded'    => false,
                    'multiple'    => false,
                    'choices'     => Options::OPTIONS_YES_NO,
                ]
            )
            ->add(
                'f',
                ChoiceType::class,
                [
                    'label'       => 'F. Have you been discharged from the Armed Forces under dishonorable conditions?',
                    'label_attr'  => [
                        'class' => 'label-ul',
                    ],
                    'placeholder' => '-- Select Answer --',
                    'expanded'    => false,
                    'multiple'    => false,
                    'choices'     => Options::OPTIONS_YES_NO,
                ]
            )
            ->add(
                'g',
                ChoiceType::class,
                [
                    'label'       => 'G. Are you subject to a court order restraining you from harassing, stalking, or threatening your child or an intimate partner or child of such partner?',
                    'label_attr'  => [
                        'class' => 'label-ul',
                    ],
                    'placeholder' => '-- Select Answer --',
                    'expanded'    => false,
                    'multiple'    => false,
                    'choices'     => Options::OPTIONS_YES_NO,
                ]
            )
            ->add(
                'h',
                ChoiceType::class,
                [
                    'label'       => 'H. Have you ever been convicted in any court of a misdemeanor crime of domestic violence?',
                    'label_attr'  => [
                        'class' => 'label-ul',
                    ],
                    'placeholder' => '-- Select Answer --',
                    'expanded'    => false,
                    'multiple'    => false,
                    'choices'     => Options::OPTIONS_YES_NO,
                ]
            );

        $builder->add(
            'citizenshipUs',
            ChoiceType::class,
            [
                'label'       => 'Are you a US Citizen?',
                'label_attr'  => [
                    'class' => 'label-ul',
                ],
                'placeholder' => '-- Select Answer --',
                'expanded'    => false,
                'multiple'    => false,
                'choices'     => Options::OPTIONS_YES_NO,
            ]
        )
            ->add(
                'citizenshipOther',
                ChoiceType::class,
                [
                    'label'       => 'Are you a Citizen of any other Country?',
                    'label_attr'  => [
                        'class' => 'label-ul',
                    ],
                    'placeholder' => '-- Select Answer --',
                    'expanded'    => false,
                    'multiple'    => false,
                    'choices'     => Options::OPTIONS_YES_NO,
                ]
            )
            ->add(
                'citizenship',
                TextType::class,
                [
                    'label'      => 'What Countries do you hold Citizenship?',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'trim'       => true,
                    'attr'       => ['maxlength' => 35],
                ]
            )
            ->add(
                'stateOfBirth',
                TextType::class,
                [
                    'label'      => 'State Of Birth',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'trim'       => true,
                    'attr'       => ['maxlength' => 40],
                ]
            )
            ->add(
                'countryOfBirth',
                TextType::class,
                [
                    'label'      => 'Country of Birth',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'trim'       => true,
                    'attr'       => ['maxlength' => 40],
                ]
            )
            ->add(
                'renounced',
                ChoiceType::class,
                [
                    'label'       => 'Have you ever renounced your United States citizenship?',
                    'label_attr'  => [
                        'class' => 'label-ul',
                    ],
                    'placeholder' => '-- Select Answer --',
                    'expanded'    => false,
                    'multiple'    => false,
                    'choices'     => Options::OPTIONS_YES_NO,
                ]
            )
            ->add(
                'illegalAlien',
                ChoiceType::class,
                [
                    'label'       => 'Are you an alien illegally or unlawfully in the United States?',
                    'label_attr'  => [
                        'class' => 'label-ul',
                    ],
                    'placeholder' => '-- Select Answer --',
                    'expanded'    => false,
                    'multiple'    => false,
                    'choices'     => Options::OPTIONS_YES_NO,
                ]
            )
            ->add(
                'residentAlien',
                ChoiceType::class,
                [
                    'label'       => 'Are you an alien who has been admitted to the United States under a nonimmigrant visa?',
                    'label_attr'  => [
                        'class' => 'label-ul',
                    ],
                    'placeholder' => '-- Select Answer --',
                    'expanded'    => false,
                    'multiple'    => false,
                    'choices'     => Options::OPTIONS_YES_NO,
                ]
            )
            ->add(
                'residentAlienException',
                ChoiceType::class,
                [
                    'label'       => 'If “yes”, do you fall within any of the exceptions stated in the instructions? Attach the documentation to the application',
                    'label_attr'  => [
                        'class' => 'label-ul',
                    ],
                    'placeholder' => '-- Select Answer --',
                    'expanded'    => false,
                    'multiple'    => false,
                    'choices'     => Options::OPTIONS_YES_NO_NA,
                ]
            )
            ->add(
                'admissionNumber',
                TextType::class,
                [
                    'label'      => 'If you are an alien, record your U.S.-Issued Alien or Admission number (AR#, USCIS#, or I94#)',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'trim'       => true,
                    'attr'       => ['maxlength' => 16],
                ]
            )
            ->add(
                'upin',
                TextType::class,
                [
                    'label'      => 'Unique Personal Identification Number:',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'trim'       => true,
                    'attr'       => ['maxlength' => 16],
                ]
            )
            ->add(
                'hasUPIN',
                ChoiceType::class,
                [
                    'label'       => 'Have you been issued a Unique Personal Identification Number (UPIN)? (See instruction 2f)',
                    'label_attr'  => [
                        'class' => 'label-ul',
                    ],
                    'placeholder' => '-- Select Answer --',
                    'expanded'    => false,
                    'multiple'    => false,
                    'choices'     => Options::OPTIONS_YES_NO,
                ]
            );

        $builder->add(
            'ssn',
            TextType::class,
            [
                'label'      => 'Social Security Number',
                'label_attr' => [
                    'class' => 'label-ul',
                ],
                'trim'       => true,
                'attr'       => ['maxlength' => 32],
            ]
        );





        $builder->add(
            'dateOfBirth',
            BirthdayType::class,
            [
                'label'          => 'Date of Birth',
                'label_attr'     => [
                    // 'class' => 'label-ul col-form-label',
                    'class' => 'label-ul',
                ],
                // 'attr' =>
                //     [
                //       // 'class' => 'form-control'
                //      ],
                'model_timezone' => 'America/Chicago',
                'widget'         => 'choice',
                'placeholder'    => [
                    'year'  => 'Year',
                    'month' => 'Month',
                    'day'   => 'Day',
                ],
                'input'          => 'datetime',
                'format'         => 'MM-dd-yyyy',
                // 'format'         => 'yyyy-MM-dd',
                'invalid_message'=>'Please choose a valid birth date.',
                'years'=>Options::getEighteenYearsAgoArray(),



            ]
        );
        $builder->add(
            'ethnicity',
            ChoiceType::class,
            [
                'label'       => '',
                'label_attr'  => [
                    'class' => 'label-ul',
                ],
                'placeholder' => '-- Select Answer --',
                'expanded'    => false,
                'multiple'    => false,
                'choices'     => Options::OPTIONS_ETHNICITY,
            ]
        )
            ->add(
                'race',
                ChoiceType::class,
                [
                    'label'       => '',
                    'label_attr'  => [
                        'class' => 'label-ul',
                    ],
                    'placeholder' => '-- Select Answer --',
                    'expanded'    => false,
                    'multiple'    => false,
                    'choices'     => Options::OPTIONS_RACE,
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