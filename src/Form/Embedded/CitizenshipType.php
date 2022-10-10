<?php

namespace App\Form\Embedded;

use App\Service\Options;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CitizenshipType extends AbstractType
{
    public function buildForm(
        FormBuilderInterface $builder,
        array $options
    ): void {
        $builder
            ->add(
                'citizenshipUs',
                ChoiceType::class,
                [
                    'label'       => 'Are you a US Citizen?',
                    'placeholder' => '-- Select Answer --',
                    'expanded'    => false,
                    'multiple'    => false,
                    'choices'     => Options::OPTIONS_YES_NO,
                ]
            )
            ->add(
                'citizenshipOther',
                ChoiceType::class,
                [
                    'label'       => 'Are you a Citizen of any other Country?',
                    'placeholder' => '-- Select Answer --',
                    'expanded'    => false,
                    'multiple'    => false,
                    'choices'     => Options::OPTIONS_YES_NO,
                ]
            )
            ->add(
                'citizenship',
                TextType::class,
                [
                    'label' => 'What Countries do you hold Citizenship?',
                    'trim'  => true,
                    'attr'  => ['maxlength' => 35],
                ]
            )
            ->add(
                'stateOfBirth',
                TextType::class,
                [
                    'label' => 'State Of Birth',
                    'trim'  => true,
                    'attr'  => ['maxlength' => 40],
                ]
            )
            ->add(
                'countryOfBirth',
                TextType::class,
                [
                    'label' => 'Country of Birth',
                    'trim'  => true,
                    'attr'  => ['maxlength' => 40],
                ]
            )
            ->add(
                'renounced',
                ChoiceType::class,
                [
                    'label'       => 'Have you ever renounced your United States citizenship?',
                    'placeholder' => '-- Select Answer --',
                    'expanded'    => false,
                    'multiple'    => false,
                    'choices'     => Options::OPTIONS_YES_NO,
                ]
            )
            ->add(
                'illegalAlien',
                ChoiceType::class,
                [
                    'label'       => 'Are you an alien illegally or unlawfully in the United States?',
                    'placeholder' => '-- Select Answer --',
                    'expanded'    => false,
                    'multiple'    => false,
                    'choices'     => Options::OPTIONS_YES_NO,
                ]
            )
            ->add(
                'residentAlien',
                ChoiceType::class,
                [
                    'label'       => 'Are you an alien who has been admitted to the United States under a nonimmigrant visa?',
                    'placeholder' => '-- Select Answer --',
                    'expanded'    => false,
                    'multiple'    => false,
                    'choices'     => Options::OPTIONS_YES_NO,
                ]
            )
            ->add(
                'residentAlienException',
                ChoiceType::class,
                [
                    'label'       => 'If “yes”, do you fall within any of the exceptions stated in the instructions? Attach the documentation to the application',
                    'placeholder' => '-- Select Answer --',
                    'expanded'    => false,
                    'multiple'    => false,
                    'choices'     => Options::OPTIONS_YES_NO_NA,
                ]
            )
            ->add(
                'admissionNumber',
                TextType::class,
                [
                    'label' => 'If you are an alien, record your U.S.-Issued Alien or Admission number (AR#, USCIS#, or I94#)',
                    'trim'  => true,
                    'attr'  => ['maxlength' => 16],
                ]
            )
            ->add(
                'upin',
                TextType::class,
                [
                    'label' => 'If yes please list',
                    'trim'  => true,
                    'attr'  => ['maxlength' => 16],
                ]
            )
            ->add(
                'upinOption',
                ChoiceType::class,
                [
                    'label'       => 'Have you been issued a Unique Personal Identification Number (UPIN)? (See instruction 2f)',
                    'placeholder' => '-- Select Answer --',
                    'expanded'    => false,
                    'multiple'    => false,
                    'choices'     => Options::OPTIONS_YES_NO,
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
