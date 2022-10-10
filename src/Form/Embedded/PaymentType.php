<?php

namespace App\Form\Embedded;

use App\Entity\Embedded\Payment;
use App\Service\Options;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaymentType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'method',
                ChoiceType::class,
                [
                    'label' => 'Method of Payment',
                    'placeholder' => '-- Select Answer --',
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => Options::OPTIONS_PAYMENT_METHODS,
                ]
            )
            ->add(
                'expMonth',
                ChoiceType::class,
                [
                    'label' => 'Expiration Month',
                    'placeholder' => '-- Select Answer --',
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => Options::OPTIONS_PAYMENT_METHODS,
                ]
            )
            ->add(
                'expYear',
                ChoiceType::class,
                [
                    'label' => 'Expiration Year',
                    'placeholder' => '-- Select Answer --',
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $this->getPaymentYears(),
                ]
            )
            ->add(
                'cc',
                TextType::class,
                [
                    'label' => 'Credit Card Number',
                    'placeholder' => '#### #### #### ####',
                    'help' => 'We do not store Credit Card Numbers.  The Credit Card Number will be printed out when download this document at the end.'
                    //  TODO  Add help attribute here later.
                ]
            );
    }

    private function getPaymentYears(): array
    {
        return Options::getPaymentYears();
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'inherit_data' => true,
        ]);
    }
}
