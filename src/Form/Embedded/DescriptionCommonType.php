<?php

namespace App\Form\Embedded;

use App\Entity\Embedded\DescriptionCommon;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DescriptionCommonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'model',
                TextType::class,
                [
                    'label' => '',
                    'trim' => true,
                    'attr'=>['maxlength' => 32]
                ])
            ->add(
                'serialNo',
                TextType::class,
                [
                    'label' => '',
                    'trim' => true,
                    'attr'=>['maxlength' => 32]
                ])
            ->add(
                'description',
                TextType::class,
                [
                    'label' => '',
                    'trim' => true,
                    'attr'=>['maxlength' => 6400]
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'inherit_data' => true,
        ]);
    }
}
