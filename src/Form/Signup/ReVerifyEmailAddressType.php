<?php

namespace App\Form\Signup;

use App\Form\Parts\PartButtonSubmitUpdateInformation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReVerifyEmailAddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'email_address',
                EmailType::class
            )
            // TODO put the Captcha functionality back into effect.
            //     ->add('captcha', CaptchaType::class)
            ->add('submit', PartButtonSubmitUpdateInformation::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {

    }
}