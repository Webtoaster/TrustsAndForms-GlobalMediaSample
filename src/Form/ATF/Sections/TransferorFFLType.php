<?php

namespace App\Form\ATF\Sections;

use App\Service\Options;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TransferorFFLType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add(
            'transferorFfl1',
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
                'transferorFfl2',
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
                'transferorFfl3',
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
                'transferorFfl4',
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
                'transferorEin',
                TextType::class,
                [
                    'label'      => 'Transferor\'s Employer Identification Number',
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
                'transferorClass',
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