<?php

namespace App\Form\Embedded;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NamePersonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'first',
                TextType::class,
                [
                    'label' => 'First',
                    'attr' => [
                        'placeholder' => 'First Name',
                        'size' => 32,
                        'max_length' => 32,
                        'tabindex' => 1001,
                    ],
                ]
            )
            ->add(
                'middle',
                TextType::class,
                [
                    'label' => 'Middle',
                    'attr' => [
                        'placeholder' => 'Middle Name',
                        'size' => 32,
                        'max_length' => 32,
                        'tabindex' => 1002,
                    ],
                    'required' => false,
                ]
            )
            ->add(
                'last',
                TextType::class,
                [
                    'label' => 'Last',
                    'attr' => [
                        'placeholder' => 'Last Name',
                        'size' => 32,
                        'max_length' => 32,
                        'tabindex' => 1003,
                    ],
                ]
            )
            ->add(
                'suffix',
                TextType::class,
                [
                    'label' => 'Suffix',
                    'attr' => [
                        'placeholder' => 'Jr, Sr. M.D. etc',
                        'size' => 12,
                        'max_length' => 12,
                        'tabindex' => 1004,
                    ],
                    'required' => false,
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