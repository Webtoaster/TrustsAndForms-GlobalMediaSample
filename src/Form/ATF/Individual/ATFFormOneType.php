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
use App\Form\Embedded\TypeOfApplicationType;
use App\Form\Embedded\TypeOfPartyType;
use App\Form\Embedded\YesNoType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ATFFormOneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        //  form:           One
        //  userRole:       individual
        //  userAction:     making an SBR, SBS, Suppressor, AOW or Destructive Device.

        //  This one will be set to Individual by default.  This field is also not needed.
        //  $builder->add('transferee_party', TypeOfPartyType::class);

        //  TRANSFEREE FIELDS
        //  A transferee and applicant are the same thing for the purpose of this application.
        //  This can be pre-populated with the data from Party


        $builder->add('type_of_application', TypeOfApplicationType::class);







        //  Name for Personal Application
        $builder->add('transferee_person', NamePersonType::class);

        //  Name for Organization
        $builder->add('transferee_org', NameSimpleType::class);

        $builder->add('transferee_address', AddressType::class);
        $builder->add('transferee_alt_address', AddressType::class);
        $builder->setAttribute(
            'transferee_alt_address',
            ['label' => 'If P.O. Box is shown above, street address must be given here']
        );
        $builder->add('transferee_county', CountyType::class);
        $builder->add('transferee_phone', PhoneType::class);
        $builder->add('transferee_email', EmailAddressType::class);


        //  PROPERTY FIELDS
        $builder->add('property_manufacture', NameSimpleType::class);
        $builder->add('property_manufacture_address', AddressType::class);
        //  remove line 2 of address here...  $builder->remove('line2');
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
