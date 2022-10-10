<?php

namespace App\Form\ATF;

use App\Document\ATF;
use App\Form\ATF\Sections\BackgroundQuestionsType;
use App\Form\ATF\Sections\NecessityType;
use App\Form\ATF\Sections\ResponsiblePartyType;
use App\Form\ATF\Sections\TransfereeFFLType;
use App\Form\ATF\Sections\TransfereeType;
use App\Form\ATF\Sections\TransferorFFLType;
use App\Form\ATF\Sections\TransferorType;
use App\Service\Options;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ATFMongoFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $options = array_intersect_key($options, Options::DEFAULT_ASSESSMENT_OPTIONS);

        if ($options['form_1'] === true) {
            $builder->add(
                'transferee',
                TransfereeType::class,
                $options
            );
        }


        //  Extract ONLY the keys used and set by default in the assessment so that you can
        //  pass them to the sub-forms easily by passing just the variable.


        if ($options['form_1'] === true) {
            //  TRANSFEREE -------------------
            $builder->add(
                'transferee',
                TransfereeType::class,
                $options
            );

            if ($options['transfereeIsFFL'] === true) {
                $builder->add(
                    'transfereeFFL',
                    TransfereeFFLType::class,
                    $options
                );
            }

            $builder->add(
                'necessity',
                NecessityType::class,
                $options

            );

            // $builder->add(
            //     'responsibleParty',
            //     ResponsiblePartyType::class,
            //     $options
            //
            // );

            if ($options['userRole'] === 'representative') {
                // TODO include Transferee Type
                $builder
                    ->add(
                        'responsibleParty',
                        ResponsiblePartyType::class
                    );
            } else {
                // TODO include the Responsible Party elements.
                $builder
                    ->add(
                        'background',
                        BackgroundQuestionsType::class
                    );
            }
        }

        if ($options['form_4'] === true) {
            //  TRANSFEREE -------------------
            $builder->add(
                'transferee',
                TransfereeType::class
            );

            if ($options['transfereeIsFFL'] === true) {
                $builder->add(
                    'transfereeFFL',
                    TransfereeFFLType::class
                );
            }

            //  TRANSFEROR -------------------
            $builder->add(
                'transferor',
                TransferorType::class
            );

            if ($options['transferorIsFFL'] === true) {
                $builder->add(
                    'transferorFFL',
                    TransferorFFLType::class
                );
            }

            $builder->add(
                'necessity',
                NecessityType::class
            );

            $builder->add(
                'necessity',
                NecessityType::class
            );

            $builder->add(
                'responsibleParty',
                ResponsiblePartyType::class
            );
        }

        if ($options['form_5'] === true) {
            //  TRANSFEREE -------------------
            $builder->add(
                'transferee',
                TransfereeType::class
            );

            if ($options['transfereeIsFFL'] === true) {
                $builder->add(
                    'transfereeFFL',
                    TransfereeFFLType::class
                );
            }

            //  TRANSFEROR -------------------
            $builder->add(
                'transferor',
                TransferorType::class
            );

            if ($options['transferorIsFFL'] === true) {
                $builder->add(
                    'transferorFFL',
                    TransferorFFLType::class
                );
            }

            $builder->add(
                'necessity',
                NecessityType::class
            );

            $builder->add(
                'responsibleParty',
                ResponsiblePartyType::class
            );
        }

        if ($options['form_rp'] === true) {
            //  TRANSFEREE -------------------

        }

        //  TRANSFEROR -------------------
        if ($options['form_4'] === true || $options['form_5'] === true) {
            $builder
                ->add(
                    'transferor',
                    TransferorType::class
                );
        }

        //
        if ($options['userRole'] === 'organization') {
            $builder
                ->add(
                    'responsibleParty',
                    ResponsiblePartyType::class
                );
        }
        //
        // if ($options['userRole'] === 'individual') {
        //     $builder
        //         ->add(
        //             'questions',
        //             BackgroundQuestionsType::class
        //         );
        // }

        // $builder
        //     ->add(
        //         'property',
        //         PropertyType::class
        //     );
        // ->add('dateSigned');

        dump($options);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class'      => ATF::class,
            'userRole'        => null,
            //  individual/representative
            'userAction'      => null,
            //  make/purchase
            'propertyType'    => null,
            //  sbr/sbs/sup/aow/dd/mg
            'source'          => null,
            //  bool (false)
            'form_1'          => null,
            //  bool (false)
            'form_4'          => null,
            //  bool (false)
            'form_5'          => null,
            //  bool (false)
            'form_rp'         => null,
            //  bool (false)
            'transfereeIsFFL' => null,
            //  bool (false)
            'transferorIsFFL' => null,
            //  bool (false)
        ]);
    }
}