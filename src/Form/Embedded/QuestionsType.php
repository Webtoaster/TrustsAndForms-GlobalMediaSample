<?php

namespace App\Form\Embedded;

use App\Entity\Embedded\Questions;
use App\Service\Options;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuestionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'a',
                ChoiceType::class,
                [
                    'label' => 'a. Are you under indictment or information in any court for a felony, or any other crime, for which the judge could imprison you for more than one year?',
                    'placeholder' => '-- Select Answer --',
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => Options::OPTIONS_YES_NO,
                ])
            ->add(
                'b',
                ChoiceType::class,
                [
                    'label' => 'b. Have you ever been convicted in any court for a felony, or any other crime, for which the judge could have imprisoned you for more than one year, even if you received a shorter sentence including probation?',
                    'placeholder' => '-- Select Answer --',
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => Options::OPTIONS_YES_NO,
                ])
            ->add(
                'c',
                ChoiceType::class,
                [
                    'label' => 'c. Are you a fugitive from justice?',
                    'placeholder' => '-- Select Answer --',
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => Options::OPTIONS_YES_NO,
                ])
            ->add(
                'd',
                ChoiceType::class,
                [
                    'label' => 'd. Are you an unlawful user of, or addicted to, marijuana or any depressant, stimulant, narcotic drug, or any other controlled substance? Warning: The use or possession of marijuana remains unlawful under Federal law regardless of whether it has been legalized or decriminalized for medicinal or recreational purposes in the state where you reside.',
                    'placeholder' => '-- Select Answer --',
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => Options::OPTIONS_YES_NO,
                ])
            ->add(
                'e',
                ChoiceType::class,
                [
                    'label' => 'e. Have you ever been adjudicated as a mental defective OR have you ever been committed to a mental institution?',
                    'placeholder' => '-- Select Answer --',
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => Options::OPTIONS_YES_NO,
                ])
            ->add(
                'f',
                ChoiceType::class,
                [
                    'label' => 'f. Have you been discharged from the Armed Forces under dishonorable conditions?',
                    'placeholder' => '-- Select Answer --',
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => Options::OPTIONS_YES_NO,
                ])
            ->add(
                'g',
                ChoiceType::class,
                [
                    'label' => 'g. Are you subject to a court order restraining you from harassing, stalking, or threatening your child or an intimate partner or child of such partner?',
                    'placeholder' => '-- Select Answer --',
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => Options::OPTIONS_YES_NO,
                ])
            ->add(
                'h',
                ChoiceType::class,
                [
                    'label' => 'h. Have you ever been convicted in any court of a misdemeanor crime of domestic violence?',
                    'placeholder' => '-- Select Answer --',
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => Options::OPTIONS_YES_NO,
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
