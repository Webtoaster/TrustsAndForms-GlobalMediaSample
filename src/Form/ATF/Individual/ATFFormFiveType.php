<?php

namespace App\Form\ATF\Individual;

use App\Entity\Embedded\NameSimple;
use App\Form\Embedded\AddressType;
use App\Form\Embedded\CountyType;
use App\Form\Embedded\DescriptionCommonType;
use App\Form\Embedded\DescriptionFirearmType;
use App\Form\Embedded\EmailAddressType;
use App\Form\Embedded\EventType;
use App\Form\Embedded\NamePersonType;
use App\Form\Embedded\NameSimpleType;
use App\Form\Embedded\PhoneType;
use App\Form\Embedded\TypeOfPartyType;
use App\Form\Embedded\YesNoType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ATFFormFiveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        //  userRole:
        //  userAction:


        $builder->add('transferee_party', TypeOfPartyType::class);


        $builder->add('transferee_name', NamePersonType::class);
        $builder->add('transferee_company', NameSimpleType::class);
        $builder->add('transferee_address', AddressType::class);
        $builder->add('transferee_county', CountyType::class);


        $builder->add('transferor_name', NamePersonType::class);
        $builder->add('transferor_company', NameSimple::class);
        $builder->add('transferor_address', AddressType::class);

        $builder->add('transferor_alt_address', AddressType::class);
        $builder->setAttribute(
            'transferor_alt_address',
            ['label' => 'Number, Street, City, State and Zip Code of Residence (or Firearms Business Premises) if Different from Item 3a.']
        );

        $builder->add('transferor_phone', PhoneType::class);
        $builder->add('transferor_email', EmailAddressType::class);


        $builder->add('transferor_phone', PhoneType::class);
        $builder->add('transferor_email', EmailAddressType::class);

        $builder->add('decedent_name', NameSimple::class);
        $builder->setAttribute(
            'decedent_name',
            ['label' => 'Decedents Name']
        );
        $builder->add('decedent_address', AddressType::class);
        $builder->setAttribute(
            'decedent_address',
            ['label' => 'Decedents Address']
        );
        $builder->add('decedent_death', EventType::class);
        $builder->setAttribute(
            'decedent_death',
            ['label' => 'Decedents Date of Death']
        );


        $builder->add('property_manufacture', NameSimpleType::class);
        $builder->add('property_manufacture_address', AddressType::class);

        $builder->add('property_common', DescriptionCommonType::class);
        $builder->add('property_firearm', DescriptionFirearmType::class);


        $builder->add('de-milled', YesNoType::class);
        $builder->setAttribute(
            'de-milled',
            ['label' => 'Has the Firearm been rendered unserviceable as defined in Definition 1m?']
        );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}