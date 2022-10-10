<?php

namespace App\Form\Embedded;

use App\Entity\Embedded\FFL;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FFLType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'fflSection1',
                TextType::class,
                [
                    'label' => '',
                    'trim' => true,
                    'attr' => ['maxlength' => 6],
                ]
            )
            ->add(
                'fflSection2',
                TextType::class,
                [
                    'label' => '',
                    'trim' => true,
                    'attr' => ['maxlength' => 2],
                ]
            )
            ->add(
                'fflSection3',
                TextType::class,
                [
                    'label' => '',
                    'trim' => true,
                    'attr' => ['maxlength' => 2],
                ]
            )
            ->add(
                'fflSection4',
                TextType::class,
                [
                    'label' => '',
                    'trim' => true,
                    'attr' => ['maxlength' => 5],
                ]
            )
            ->add(
                'ein',
                TextType::class,
                [
                    'label' => '',
                    'trim' => true,
                    'attr' => ['maxlength' => 10],
                ]
            )
            ->add(
                'class',
                TextType::class,
                [
                    'label' => '',
                    'trim' => true,
                    'attr' => ['maxlength' => 16],
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
