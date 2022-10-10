<?php

namespace App\Form;

use App\Entity\Property;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PropertyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameContributor')
            ->add('propertyType')
            ->add('nameManufacture')
            ->add('description')
            ->add('value')
            ->add('modelNo')
            ->add('serialNo')
            ->add('serialNoForm')
            ->add('dateStamp')
            ->add('nameSeller')
            ->add('nameBuyer')
            ->add('dateAcquired')
            ->add('dateDisposed')
            ->add('isDraft')

            ->add(


                'trust'



            )

//            ->add('createdFromIp')
//            ->add('updatedFromIp')
//            ->add('createdAt')
//            ->add('updatedAt')
//            ->add('deletedAt')
//            ->add('isActive')


        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Property::class,
        ]);
    }
}
