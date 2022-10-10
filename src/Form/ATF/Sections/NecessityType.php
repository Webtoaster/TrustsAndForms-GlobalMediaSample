<?php

namespace App\Form\ATF\Sections;

use App\Service\Options;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NecessityType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        if ($options['form_1'] === true) {
            $builder->add(
                'statementPurpose', TextType::class,
                [
                    'label'      => 'Specify Why You Intend To Make Firearm:',
                    'help'       => 'Best answer: "FOR LAWFUL PURPOSES".',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'attr'       => [
                        'maxlength' => 265,
                    ],
                ]
            );
        }
        if ($options['form_4'] === true) {
            $builder->add(
                'statementPurpose', TextType::class,
                [
                    'label'      => 'State why you have a reasonable necessity to possess the machinegun, 
                    short-barreled rifle, short-barreled shotgun, or destructive device described on this
                    application for the following reason(s) and my possession of the device or weapon 
                    would be consistent with public safety (18 U.S.C. § 922(b) (4) and 27 CFR § 478.98).',
                    'help'       => 'Best answer: "FOR LAWFUL PURPOSES". (See instruction 2e)',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'attr'       => [
                        'maxlength' => 180,
                    ],
                ]
            );
        }

        if ($options['form_5'] === true) {
            $builder->add(
                'statementPurpose', TextType::class,
                [
                    'label'      => 'State why you have a have a reasonable necessity to possess the
                     machinegun, short-barreled rifle, short-barreled shotgun, or destructive device 
                     described on this application for the following reason(s) and my possession of 
                     the device or weapon would be consistent with public safety (18 U.S.C. § 922(b) 
                     (4) and 27 CFR § 478.98).',
                    'help'       => 'Best answer: "FOR LAWFUL PURPOSES".  Also, (Do not complete if the 
                    transferee is a government agency) (See instruction 2e)',
                    'label_attr' => [
                        'class' => 'label-ul',
                    ],
                    'attr'       => [
                        'maxlength' => 180,
                    ],
                ]
            );
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $options = Options::DEFAULT_ASSESSMENT_OPTIONS;
        $options['inherit_data'] = true;
        $resolver->setDefaults($options);
    }
}