<?php

namespace App\Form\ATF\Individual;

use App\Entity\Embedded\NameSimple;
use App\Form\Embedded\AddressType;
use App\Form\Embedded\CitizenshipType;
use App\Form\Embedded\CountyType;
use App\Form\Embedded\DescriptionCommonType;
use App\Form\Embedded\DescriptionFirearmType;
use App\Form\Embedded\EmailAddressType;
use App\Form\Embedded\EthnicityRaceType;
use App\Form\Embedded\EventType;
use App\Form\Embedded\NamePersonType;
use App\Form\Embedded\NameSimpleType;
use App\Form\Embedded\PaymentType;
use App\Form\Embedded\PhoneType;
use App\Form\Embedded\PurposeType;
use App\Form\Embedded\QuestionsType;
use App\Form\Embedded\SocialSecurityNoType;
use App\Form\Embedded\TitleType;
use App\Form\Embedded\TypeOfPartyType;
use App\Form\Embedded\YesNoType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ATFFormFourType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {


        //  userRole:
        //  userAction:


        //  Form  4 and 5 Elements
        $builder->add('transferee_type', TypeOfPartyType::class);


        $builder->add('transferee_name', NamePersonType::class);
        $builder->add('transferee_company', NameSimple::class);
        $builder->add('transferee_address', AddressType::class);
        $builder->add('transferee_county', CountyType::class);


        //  Form  4 and 5 Elements
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


        //  Form 1, 4, and 5 elements

        $builder->add('property_manufacture', NameSimpleType::class);
        $builder->add('property_manufacture_address', AddressType::class);

        $builder->add('property_common', DescriptionCommonType::class);
        $builder->add('property_firearm', DescriptionFirearmType::class);



        //  PROPERTY FIELDS
        $builder->add('property_manufacture', NameSimpleType::class);
        $builder->add('property_manufacture_address', AddressType::class);
        //  $builder->remove('line2');
        $builder->add('property_common', DescriptionCommonType::class);
        $builder->add('property_firearm', DescriptionFirearmType::class);


        //  Chief Law Enforcement Officer fields.
        $builder->add('clo_name', NamePersonType::class);
        $builder->add('clo_title', TitleType::class);
        $builder->add('clo_agency', NameSimpleType::class);
        $builder->add('clo_address', AddressType::class);


        $builder->add('purpose', PurposeType::class);


        $builder->add('bg_questions', QuestionsType::class);
        $builder->add('bg_citizenship', CitizenshipType::class);

        $builder->add('ss_no', SocialSecurityNoType::class);
        $builder->add('transferee_birth', EventType::class);
        $builder->add('ethnicity_race', EthnicityRaceType::class);

        $builder->add('payment', PaymentType::class);
        $builder->add('payee_name', NameSimpleType::class);


    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
