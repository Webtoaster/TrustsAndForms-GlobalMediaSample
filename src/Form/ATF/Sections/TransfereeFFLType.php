<?php

namespace App\Form\ATF\Sections;

use App\Form\Embedded\TypeOfApplicationType;
use App\Service\Options;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TransfereeFFLType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add(
            'transfereeFfl1',
            TextType::class,
            [
                'label'      => 'First 6 digits',
                'label_attr' => [
                    'class' => 'label-ul',
                ],
                'help'       => null,
                'attr'       => [
                    'placeholder' => null,
                    'maxlength'   => 6,
                ],
            ]
        )
            ->add(
                'transfereeFfl2',
                TextType::class,
                [
                    'label'      => '2 digits',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'help'       => null,
                    'attr'       => [
                        'placeholder' => null,
                        'maxlength'   => 2,
                    ],
                ]
            )
            ->add(
                'transfereeFfl3',
                TextType::class,
                [
                    'label'      => '2 digits',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'help'       => null,
                    'attr'       => [
                        'placeholder' => null,
                        'maxlength'   => 2,
                    ],
                ]
            )
            ->add(
                'transfereeFfl4',
                TextType::class,
                [
                    'label'      => '5 digits',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'help'       => null,
                    'attr'       => [
                        'placeholder' => null,
                        'maxlength'   => 5,
                    ],
                ]
            )
            ->add(
                'transfereeEin',
                TextType::class,
                [
                    'label'      => 'Transferee\'s Employer Identification Number',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'help'       => null,
                    'attr'       => [
                        'placeholder' => null,
                        'maxlength'   => 34,
                    ],
                ]
            )
            ->add(
                'transfereeClass',
                TextType::class,
                [
                    'label'      => 'Class',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'help'       => null,
                    'attr'       => [
                        'placeholder' => null,
                        'maxlength'   => 34,
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