<?php

namespace App\Service;

use JetBrains\PhpStorm\ArrayShape;
use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
class Options
{
    public const OPTIONS_PAYMENT_METHODS
        = [
            'CHECK' => 'Check (Enclosed)',
            'CCMO'  => 'Cashier’s Check or Money Order (Enclosed)',
            'VISA'  => 'Visa',
            'MC'    => 'Mastercard',
            'AMEX'  => 'American Express',
            'DISC'  => 'Discover',
            'DINER' => 'Diners Club',
            'BITCOIN' => 'Bitcoin'
        ];

    public const VALID_PAYMENT_METHODS
        = [
            'CHECK',
            'CCMO',
            'VISA',
            'MC',
            'AMEX',
            'DISC',
            'DINER',
            'BITCOIN'
        ];

    public const OPTIONS_STATES
        = [
            'Alabama'              => 'AL',
            'Alaska'               => 'AK',
            'Arizona'              => 'AZ',
            'Arkansas'             => 'AR',
            'California'           => 'CA',
            'Colorado'             => 'CO',
            'Connecticut'          => 'CT',
            'Delaware'             => 'DE',
            'District of Columbia' => 'DC',
            'Florida'              => 'FL',
            'Georgia'              => 'GA',
            'Hawaii'               => 'HI',
            'Idaho'                => 'ID',
            'Illinois'             => 'IL',
            'Indiana'              => 'IN',
            'Iowa'                 => 'IA',
            'Kansas'               => 'KS',
            'Kentucky'             => 'KY',
            'Louisiana'            => 'LA',
            'Maine'                => 'ME',
            'Maryland'             => 'MD',
            'Massachusetts'        => 'MA',
            'Michigan'             => 'MI',
            'Minnesota'            => 'MN',
            'Mississippi'          => 'MS',
            'Missouri'             => 'MO',
            'Montana'              => 'MT',
            'Nebraska'             => 'NE',
            'Nevada'               => 'NV',
            'New Hampshire'        => 'NH',
            'New Jersey'           => 'NJ',
            'New Mexico'           => 'NM',
            'New York'             => 'NY',
            'North Carolina'       => 'NC',
            'North Dakota'         => 'ND',
            'Ohio'                 => 'OH',
            'Oklahoma'             => 'OK',
            'Oregon'               => 'OR',
            'Pennsylvania'         => 'PA',
            'Rhode Island'         => 'RI',
            'South Carolina'       => 'SC',
            'South Dakota'         => 'SD',
            'Tennessee'            => 'TN',
            'Texas'                => 'TX',
            'Utah'                 => 'UT',
            'Vermont'              => 'VT',
            'Virginia'             => 'VA',
            'Washington'           => 'WA',
            'West Virginia'        => 'WV',
            'Wisconsin'            => 'WI',
            'Wyoming'              => 'WY',
        ];

    public const VALID_STATES
        = [
            'AL',
            'AK',
            'AZ',
            'AR',
            'CA',
            'CO',
            'CT',
            'DE',
            'DC',
            'FL',
            'GA',
            'HI',
            'ID',
            'IL',
            'IN',
            'IA',
            'KS',
            'KY',
            'LA',
            'ME',
            'MD',
            'MA',
            'MI',
            'MN',
            'MS',
            'MO',
            'MT',
            'NE',
            'NV',
            'NH',
            'NJ',
            'NM',
            'NY',
            'NC',
            'ND',
            'OH',
            'OK',
            'OR',
            'PA',
            'RI',
            'SC',
            'SD',
            'TN',
            'TX',
            'UT',
            'VT',
            'VA',
            'WA',
            'WV',
            'WI',
            'WY',
        ];

    public const OPTIONS_MONTHS
        = [
            '01 - January'   => '01',
            '02 - February'  => '02',
            '03 - March'     => '03',
            '04 - April'     => '04',
            '05 - May'       => '05',
            '06 - June'      => '06',
            '07 - July'      => '07',
            '08 - August'    => '08',
            '09 - September' => '09',
            '10 - October'   => '10',
            '11 - November'  => '11',
            '12 - December'  => '12',
        ];

    public const VALID_MONTHS
        = [
            '01',
            '02',
            '03',
            '04',
            '05',
            '06',
            '07',
            '08',
            '09',
            '10',
            '11',
            '12',
        ];

    public const OPTIONS_ETHNICITY
        = [
            'Hispanic or Latino'     => 'latino',
            'Not Hispanic or Latino' => 'other',
        ];

    public const VALID_ETHNICITY
        = [
            'LATINO',
            'OTHER',
        ];

    public const OPTIONS_FORM_1_FIREARM_TYPE
        = [
            'Any Other Weapon (AOW)' => 'AOW',
            'Destructive Device'     => 'DD ',
            'Short-Barreled Shotgun' => 'SBS',
            'Short-Barreled Rifle'   => 'SBR',
            'Silencer'               => 'SUP',
        ];

    public const VALID_FORM_1_FIREARM_TYPE
        = [
            'AOW',
            'DD ',
            'SBS',
            'SBR',
            'SUP',
        ];

    public const OPTIONS_FORM_1_DESTRUCTIVE_DEVICE
        = [
            'firearm'    => 'Firearm',
            'explosives' => 'Explosives',
        ];

    public const VALID_FORM_1_DESTRUCTIVE_DEVICE
        = [
            'firearm',
            'explosives',
        ];

    public const OPTIONS_FORM_4_FIREARM_TYPE
        = [
            'Any Other Weapon (AOW)' => 'AOW',
            'Destructive Device'     => 'DD ',
            'Machine Gun'            => 'MG ',
            'Short-Barreled Shotgun' => 'SBS',
            'Short-Barreled Rifle'   => 'SBR',
            'Silencer'               => 'SUP',
        ];

    public const VALID_FORM_4_FIREARM_TYPE
        = [
            'AOW',
            'DD ',
            'MG ',
            'SBS',
            'SBR',
            'SUP',
        ];

    public const OPTIONS_TRANSFER_FEE
        = [
            '$ 5.00'   => 5.00,
            '$ 200.00' => 200.00,
        ];

    public const VALID_TRANSFER_FEE
        = [
            5.00,
            200.00,
        ];

    public const OPTIONS_FORM_4_TRANSFER_TYPE
        = [
            '$ 5.00'   => 5.00,
            '$ 200.00' => 200.00,
        ];

    public const VALID_FORM_4_TRANSFER_TYPE
        = [
            5.00,
            200.00,
        ];

    public const OPTIONS_CALIBER_MEASUREMENT
        = [
            'Cal - Caliber'        => 'CAL',
            'MM - Millimeter'      => 'MM',
            'GA - Gauge'           => 'GA',
            'N/A - Not Applicable' => 'N/A',
        ];

    public const VALID_CALIBER_MEASUREMENT
        = [
            'CAL',
            'MM',
            'GA',
            'N/A',
        ];

    public const OPTIONS_FIREARM_TRANSFER_TYPES_LONG
        = [
            'Any Other Weapon (AOW) - any other weapon as defined in 26 U.S.C. § 5845(e).'                                                                 => 'AOW',
            'Destructive Device'                                                                                                                           => 'DD',
            'Machine Gun'                                                                                                                                  => 'MG',
            'Short-Barreled Shotgun - a shotgun having a barrel or barrels of less than 18 inches in length, regardless of overall length.'                => 'SBS',
            'Short-Barreled Rifle - a rifle having a barrel or barrels of less than 16 inches in length, regardless of overall length.'                    => 'SBR',
            'Silencer - a muffler or silencer for any firearm whether or not such firearm is included within this definition.  Also known as a Suppressor' => 'SUP',
        ];
    public const VALID_FIREARM_TRANSFER_TYPES_LONG
        = [
            'AOW',
            'DD ',
            'MG ',
            'SBS',
            'SBR',
            'SUP',
        ];

    public const OPTIONS_FORM_1_PARTY_TYPE
        = [
            'Trust'              => 'TRUST',
            'Individual'         => 'INDIVIDUAL',
            'Corporation'        => 'CORPORATION',
            'Other Legal Entity' => 'OTHER',
            'Government Entity'  => 'GOVERNMENT',
        ];

    public const VALID_FORM_1_PARTY_TYPE
        = [
            'TRUST',
            'INDIVIDUAL',
            'CORPORATION',
            'OTHER',
            'GOVERNMENT',
        ];

    public const OPTIONS_REPRESENTATIVE_FORM_1_PARTY_TYPE
        = [
            'Trust'              => 'TRUST',
            'Corporation'        => 'CORPORATION',
            'Other Legal Entity' => 'OTHER',
            'Government Entity'  => 'GOVERNMENT',
        ];

    public const VALID_REPRESENTATIVE_FORM_1_PARTY_TYPE
        = [
            'TRUST',
            'CORPORATION',
            'OTHER',
            'GOVERNMENT',
        ];

    public const OPTIONS_REPRESENTATIVE_FORM_4_PARTY_TYPE
        = [
            'Trust'              => 'TRUST',
            'Corporation'        => 'CORPORATION',
            'Other Legal Entity' => 'OTHER',

        ];

    public const VALID_REPRESENTATIVE_FORM_4_PARTY_TYPE
        = [
            'TRUST',
            'CORPORATION',
            'OTHER',
        ];

    public const OPTIONS_REPRESENTATIVE_FORM_5_PARTY_TYPE
        = [
            'Trust'              => 'TRUST',
            'Corporation'        => 'CORPORATION',
            'Other Legal Entity' => 'OTHER',
            'Government Entity'  => 'GOVERNMENT',
        ];

    public const VALID_REPRESENTATIVE_FORM_5_PARTY_TYPE
        = [
            'TRUST',
            'CORPORATION',
            'OTHER',
            'GOVERNMENT',
        ];

    public const OPTIONS_FORM_4_PARTY_TYPE
        = [
            'Trust'              => 'TRUST',
            'Individual'         => 'INDIVIDUAL',
            'Corporation'        => 'CORPORATION',
            'Other Legal Entity' => 'OTHER',
        ];

    public const VALID_FORM_4_PARTY_TYPE
        = [
            'TRUST',
            'INDIVIDUAL',
            'CORPORATION',
            'OTHER',
        ];

    public const OPTIONS_RACE
        = [
            'American Indian or Alaska Native'          => 'NATIVE',
            'Asian'                                     => 'ASIAN',
            'African American'                          => 'BLACK',
            'Native Hawaiian or Other Pacific Islander' => 'ISLANDER',
            'White'                                     => 'WHITE',
        ];
    public const VALID_RACE
        = [
            'NATIVE',
            'ASIAN',
            'BLACK',
            'ISLANDER',
            'WHITE',
        ];

    public const OPTIONS_PROPERTY_TYPE
        = [
            'Money'                                                 => 'MONEY',
            'Regular Firearms'                                      => 'NON-NFA',
            'NFA Regulated Items (Suppressors, Machine Guns, etc.)' => 'NFA',
            'Other'                                                 => 'OTHER',
        ];
    public const VALID_PROPERTY_TYPE
        = [
            'MONEY',
            'NON-NFA',
            'NFA',
            'OTHER',
        ];

    public const OPTIONS_YES_NO_NA
        = [
            'Yes'            => 'YES',
            'No'             => 'NO',
            'Not Applicable' => 'NA',

        ];
    public const VALID_YES_NO_NA
        = [
            'YES',
            'NO',
            'NA',
        ];

    public const OPTIONS_YES_NO
        = [
            'Yes' => 'YES',
            'No'  => 'NO',
        ];
    public const VALID_YES_NO
        = [
            'YES',
            'NO',
        ];

    public const OPTIONS_NUMBER_RESPONSIBLE_PARTIES
        = [
            1  => 1,
            2  => 2,
            3  => 3,
            4  => 4,
            5  => 5,
            6  => 6,
            7  => 7,
            8  => 8,
            9  => 9,
            10 => 10,
            11 => 11,
            12 => 12,
            13 => 13,
            14 => 14,
            15 => 15,
            16 => 16,
            17 => 17,
            18 => 18,
            19 => 19,
            20 => 20,
            21 => 21,
            22 => 22,
            23 => 23,
            24 => 24,
            25 => 25,
            26 => 26,
            27 => 27,
            28 => 28,
            29 => 29,
            30 => 30,
        ];
    public const VALID_NUMBER_RESPONSIBLE_PARTIES
        = [
            1,
            2,
            3,
            4,
            5,
            6,
            7,
            8,
            9,
            10,
            11,
            12,
            13,
            14,
            15,
            16,
            17,
            18,
            19,
            20,
            21,
            22,
            23,
            24,
            25,
            26,
            27,
            28,
            29,
            30,
        ];

    public const OPTIONS_US_CITIZEN
        = [
            'U.S. Citizen'      => true,
            'Other Citizenship' => false,
        ];

    public const VALID_US_CITIZEN
        = [
            true,
            false,
        ];
    public const OPTIONS_ASSESSMENT_USER_ROLE
        = [
            'I am an Individual.  I am not part of a Trust, Corporation nor any Other Legal Entity.'                                  => 'individual',
            'I am a Legal Representative, such as a Trustee in a Trust, Employee or Officer of a Corporation, or Other Legal Entity.' => 'representative',
        ];
    public const VALID_ASSESSMENT_USER_ROLE
        = [
            'individual',
            'representative',
        ];
    public const OPTIONS_ASSESSMENT_USER_ACTION_MAKE
        = [
            //  Make options:
            //  Make, using raw materials or by converting an existing firearm into, a:
            'Short Barrel Rifle'    => 'make-self-sbr',
            'Short Barrel Shotgun'  => 'make-self-sbs',
            'Suppressor (Silencer)' => 'make-self-sup',
            'Any other Weapon'      => 'make-self-aow',
            'Destructive Device'    => 'make-self-dd',
        ];

    public const OPTIONS_ASSESSMENT_USER_ACTION_PURCHASE_IND
        = [
            //  Purchase Options
            //  Purchase one of the following items that is currently in the possession of an individual,
            //      trust, corporation or other legal entity that does not hold a Federal Firearms License:
            'Short Barrel Rifle'    => 'purchase-ind-sbr',
            'Short Barrel Shotgun'  => 'purchase-ind-sbs',
            'Suppressor (Silencer)' => 'purchase-ind-sup',
            'Any other Weapon'      => 'purchase-ind-aow',
            'Destructive Device'    => 'purchase-ind-dd',
            'Machine Gun'           => 'purchase-ind-mg',
        ];
    public const OPTIONS_ASSESSMENT_USER_ACTION_PURCHASE_FFL
        = [
            //  Purchase Options
            //  Purchase one of the following items that is currently in the possession of an individual,
            //      trust, corporation or other legal entity that does not hold a Federal Firearms License:
            'Short Barrel Rifle'    => 'purchase-ffl-sbr',
            'Short Barrel Shotgun'  => 'purchase-ffl-sbs',
            'Suppressor (Silencer)' => 'purchase-ffl-sup',
            'Any other Weapon'      => 'purchase-ffl-aow',
            'Destructive Device'    => 'purchase-ffl-dd',
            'Machine Gun'           => 'purchase-ffl-mg',

        ];

    /**
     * @return array{
     *      userRole: string,
     *      userAction: string,
     *      method: string,
     *      source: string,
     *      propertyType: string,
     *      form_1: bool,
     *      form_4: bool,
     *      form_5: bool,
     *      form_rp: bool,
     *      transfereeIsFFL: bool,
     *      transferorIsFFL: bool
     * }
     */
    public const DEFAULT_ASSESSMENT_OPTIONS
        = [
            'userRole'        => '',
            'userAction'      => '',
            'method'          => '',
            'source'          => '',
            'propertyType'    => '',
            'form_1'          => false,
            'form_4'          => false,
            'form_5'          => false,
            'form_rp'         => false,
            'transfereeIsFFL' => false,
            'transferorIsFFL' => false,
        ];

    public const OPTIONS_ASSESSMENT_USER_ACTION
        = [

        ];
    public const VALID_ASSESSMENT_USER_ACTION
        = [
            //  Make options:
            'make-self-sbr',
            'make-self-sbs',
            'make-self-sup',
            'make-self-aow',
            'make-self-dd',

            //  Purchase Options
            //  Purchase one of the following items that is currently in the possession of an individual,
            //      trust, corporation or other legal entity that does not hold a Federal Firearms License:
            'purchase-ind-sbr',
            'purchase-ind-sbs',
            'purchase-ind-sup',
            'purchase-ind-aow',
            'purchase-ind-dd',
            'purchase-ind-mg',

            //  Purchase from a Seller that is a Federal Firearms Licensee, one of the following items that is
            //      currently in their possession:
            'purchase-ffl-sbr',
            'purchase-ffl-sbs',
            'purchase-ffl-sup',
            'purchase-ffl-aow',
            'purchase-ffl-dd',
            'purchase-ffl-mg',
        ];

    public const TRANSFEREE_MAKE_ACTION
        = [
            //  Make options:
            'make-self-sbr',
            'make-self-sbs',
            'make-self-sup',
            'make-self-aow',
            'make-self-dd',
        ];

    public const TRANSFEROR_MAKE_ACTION
        = [
            //  Make options:
            'make-self-sbr',
            'make-self-sbs',
            'make-self-sup',
            'make-self-aow',
            'make-self-dd',
        ];

    public const TRANSFEREE_INDIVIDUAL_ACTION
        = [

            //  Purchase Options
            //  Purchase one of the following items that is currently in the possession of an individual,
            //      trust, corporation or other legal entity that does not hold a Federal Firearms License:
            'purchase-ind-sbr',
            'purchase-ind-sbs',
            'purchase-ind-sup',
            'purchase-ind-aow',
            'purchase-ind-dd',
            'purchase-ind-mg',
        ];
    public const TRANSFEREE_FFL_ACTION
        = [
            'purchase-ffl-sbr',
            'purchase-ffl-sbs',
            'purchase-ffl-sup',
            'purchase-ffl-aow',
            'purchase-ffl-dd',
            'purchase-ffl-mg',
        ];

    public const TRANSFEROR_INDIVIDUAL_ACTION
        = [

            //  Purchase Options
            //  Purchase one of the following items that is currently in the possession of an individual,
            //      trust, corporation or other legal entity that does not hold a Federal Firearms License:
            'purchase-ind-sbr',
            'purchase-ind-sbs',
            'purchase-ind-sup',
            'purchase-ind-aow',
            'purchase-ind-dd',
            'purchase-ind-mg',
        ];
    public const TRANSFEROR_FFL_ACTION
        = [
            'purchase-ffl-sbr',
            'purchase-ffl-sbs',
            'purchase-ffl-sup',
            'purchase-ffl-aow',
            'purchase-ffl-dd',
            'purchase-ffl-mg',
        ];

    public const  OPTIONS_FORM_STATUS
        = [
            'Created'             => 100,
            'Draft Mode'          => 200,
            'Draft Validated'     => 300,
            'Revisions Submitted' => 400,
            'Revisions Approved'  => 500,
            'Revisions Validated' => 600,
            'Finalized'           => 700,
        ];
    public const  VALID_FORM_STATUS
        = [
            100,
            200,
            300,
            400,
            500,
            600,
            700,
        ];

    public const  OPTIONS_FORM_1_TYPE_OF_APPLICATION
        = [
            'Tax Paid. Submit your tax payment of $200 with the application. The tax may be paid by credit or debit card, check, or money order.  Please complete item 17. Upon approval of the application, we will affix and cancel the required National Firearms Act Stamp.  (See instruction 2c and 3)' => 'a',
            'Tax Exempt because firearm is being made on behalf of the United States, or any department, independent establishment, or agency thereof.'                                                                                                                                                      => 'b',
            'Tax Exempt because firearm is being made by or on behalf of any State or possession of the United States, or any political subdivision thereof, or any official police organization of such a government entity engaged in criminal investigations.'                                            => 'c',
        ];
    public const VALID_FORM_1_TYPE_OF_APPLICATION
        = [
            'a',
            'b',
            'c',
        ];

    public const PASSWORD_MESSAGE = 'Minimum eight characters, at least one letter and one number';
    public const PASSWORD_REGEX = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,32}$/';

    public function getPaymentMethods(): array
    {
        return self::OPTIONS_PAYMENT_METHODS;
    }

    public function getPaymentMonths(): array
    {
        return self::OPTIONS_MONTHS;
    }

    /**
     * @return array
     */
    public static function getPaymentYears(): array
    {
        $future = 10;
        $current_year = idate('Y');
        $range = range($current_year, $current_year + $future);

        return array_combine($range, $range);
    }


    /**
     * @return array
     */
    public static function getEighteenYearsAgoArray(): array
    {
        $pastEnd = 17;
        $pastStart = 100;
        $current_year = idate('Y');
        $range = range($current_year-$pastEnd, $current_year - $pastStart);
        return array_combine($range, $range);
    }



    public function getStates(): array
    {
        return self::OPTIONS_STATES;
    }

}