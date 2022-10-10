<?php

namespace App\Form\Signup;

use App\Entity\User;
use App\Form\Embedded\AddressType;
use App\Form\Embedded\EmailAddressType;
use App\Form\Embedded\NamePersonType;
use App\Form\Embedded\PlainPasswordType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SignupFormType extends AbstractType
{
    public function buildForm(
        FormBuilderInterface $builder,
        array $options
    ): void {
        $builder->add(
            'name',
            NamePersonType::class,
            ['data_class' => User::class]
        );
        $builder->add(
            'physical',
            AddressType::class,
            ['data_class' => User::class]
        );
        $builder->add(
            'email',
            EmailAddressType::class,
            ['data_class' => User::class]
        );
        $builder->add(
            'plainPassword',
            PlainPasswordType::class,
            ['data_class' => User::class]
        );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([

            'data_class'=>User::class,

        ]);
    }
}