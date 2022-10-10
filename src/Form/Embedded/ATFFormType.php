<?php

namespace App\Form\Embedded;

use App\Entity\Embedded\ATFForm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ATFFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'ombFormId',
                TextType::class,
                [
                    'label' => 'OMB Form Number - Top Right of the Form.',
                    'required' => true,
                    'attr'=>['maxlength' => 64]
                ]
            )
            ->add(
                'nameATFForm',
                TextType::class,
                [
                    'label' => 'Common Name of the Form.',
                    'required' => true,
                    'attr'=>['maxlength' => 64]
                ]
            )
        ;
    }



    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'inherit_data' => true,
        ]);
    }
}
