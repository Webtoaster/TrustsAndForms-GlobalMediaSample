<?php

namespace App\Form\Embedded;

use App\Entity\Embedded\DescriptionFirearm;
use App\Service\Options;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DescriptionFirearmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'caliber',
                TextType::class,
                [
                    'label' => 'Caliber',
                    'trim' => true,
                    'attr' => ['maxlength' => 16],
                ]
            )
            ->add(
                'caliberUnit',
                ChoiceType::class,
                [
                    'label' => '',
                    'placeholder' => '-- Select Answer --',
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => Options::OPTIONS_CALIBER_MEASUREMENT,
                ]
            )
            ->add(
                'lengthBarrel',
                TextType::class,
                [
                    'label' => '',
                    'trim' => true,
                    'attr' => ['maxlength' => 16],
                ]
            )
            ->add(
                'lengthOverall',
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
