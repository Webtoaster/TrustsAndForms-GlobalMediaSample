<?php

namespace App\Form\ATF\Sections;

use App\Form\Embedded\AddressType;
use App\Form\Embedded\NamePersonType;
use App\Form\Embedded\NameSimpleType;
use App\Form\Embedded\TitleType;
use App\Form\Embedded\TypeOfApplicationType;
use App\Service\Options;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CLOType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add(
            'cloName',
            TextType::class,
            [
                'label'      => 'Name - Chief Law Enforcement Agent',
                'label_attr' => [
                    'class' => 'label-ul',
                ],
                'trim'       => true,
                'attr'       => ['maxlength' => 128],
            ]
        );

        $builder->add(
            'cloTitle',
            TextType::class,
            [
                'label' => 'Title ',

                'label_attr' => [
                    'class' => 'label-ul',
                ],
                'trim'       => true,
                'attr'       => ['maxlength' => 50],
            ]
        );

        $builder->add(
            'cloAgency',
            TextType::class,
            [
                'label'      => 'Agency',
                'label_attr' => [
                    'class' => 'label-ul',
                ],
                'trim'       => true,
                'attr'       => ['maxlength' => 128],
            ]
        );

        $builder->add(
            'cloLine1',
            TextType::class,
            [
                'label'      => 'Line 1',
                'label_attr' => [
                    'class' => 'label-ul',
                ],
                'trim'       => true,
                'attr'       => ['maxlength' => 100],
            ]
        )
            ->add(
                'cloCity',
                TextType::class,
                [
                    'label'      => 'City',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'trim'       => true,
                    'attr'       => ['maxlength' => 75],
                ]
            )
            ->add(
                'cloState',
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
                'cloZipcode',
                TextType::class,
                [
                    'label'      => 'ZipCode',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'trim'       => true,
                    'attr'       => ['maxlength' => 10],
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