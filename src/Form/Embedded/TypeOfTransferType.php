<?php

namespace App\Form\Embedded;

use App\Entity\Embedded\TypeOfTransfer;
use App\Service\Options;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TypeOfTransferType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'type',
                ChoiceType::class,
                [
                    'label' => 'Type of Firearms Transfer',
                    'placeholder' => '-- Select Answer --',
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => Options::OPTIONS_FIREARM_TRANSFER_TYPES,
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
