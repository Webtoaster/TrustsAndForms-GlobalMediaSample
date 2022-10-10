<?php

namespace App\Form\Embedded;

use App\Entity\User;
use App\Service\Options;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class PlainPasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'plainPassword',
                RepeatedType::class,
                [
                    'type'            => PasswordType::class,
                    'invalid_message' => 'The password fields must match.',
                    'help'            => 'Please enter a password between 8 and 32 characters in length.',
                    'attr'            => [
                        'autocomplete' => 'new-password',
                    ],
                    'mapped' => true,
                    'options'         => [
                        'attr' => [
                            'class' => 'password-field',
                        ],
                    ],
                    'required'        => true,
                    'first_options'   => [
                        'label' => 'Password',
                        'attr'  => [
                            'tabindex'   => 20001,
                            'max_length' => 32,
                        ],
                    ],
                    'second_options'  => [
                        'label' => 'Repeat Password',
                        'attr'  => [
                            'tabindex'   => 20002,
                            'max_length' => 32,
                        ],
                    ],
                    'constraints'     => [
                        new NotBlank([
                            'message' => 'Please enter a password',
                        ]),
                        new Length([
                            'min'        => 8,
                            'max'        => 32,
                            'minMessage' => 'Your password cannot be shorter than {{ limit }} characters in length.',
                            'maxMessage' => 'Your password cannot be more than {{ limit }} characters in length.',
                        ]),
                        new Regex([
                            'match'      => false,
                            'pattern'    => Options::PASSWORD_REGEX,
                            'message'    => Options::PASSWORD_MESSAGE,
                            'normalizer' => 'trim',
                        ]),
                    ],
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'inherit_data' => true,
            // 'data_class' => User::class,
        ]);
    }
    // public function configureOptions(OptionsResolver $resolver): void
    // {
    //     $resolver->setDefaults([
    //         'data_class' => User::class,
    //     ]);
    // }


}