<?php

namespace App\Form\Embedded;

use App\Entity\Embedded\State;
use App\Service\Options;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LicenseSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'premiseState',
                ChoiceType::class,
                [
                    'label' => '',
                    'placeholder' => '-- Select Answer --',
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => Options::OPTIONS_STATES,
                ])




            ->add(
                'name',


            )



//            $premiseState
//            premise_state
//                private string|null $licenseName;
//                private string|null $businessName;

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'inherit_data' => true,
        ]);
    }
}
