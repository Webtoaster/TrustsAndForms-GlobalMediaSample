<?php

namespace App\DataFixtures;

use App\Factory\UserFactory;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        UserFactory::createOne([
            'first'           => 'Joseph',
            'middle'          => 'Robinette',
            'last'            => 'Biden',
            'suffix'          => null,
            'physicalLine1'   => '1600 Pennsylvania Avenue',
            'physicalLine2'   => null,
            'physicalCity'    => 'Washington',
            'physicalState'   => 'DC',
            'physicalZipCode' => '20500',
            'mailLine1'       => '1600 Pennsylvania Avenue',
            'mailLine2'       => null,
            'mailCity'        => 'Washington',
            'mailState'       => 'DC',
            'mailZipCode'     => '20500',
            'dateOfBirth'     => new DateTime('1942-11-20'),
            'dateOfDeath'     => null,
            'phoneMain'       => '202-456-1111',
            'phoneAlternate'  => '202-456-1414',
            // 'url'             => 'https://www.facebook.com/webtoaster',
            'email'           => 'joe@whitehouse.gov',
            'createdAt'       => new DateTime('now'),
            'updatedAt'       => new DateTime('now'),
            'plainPassword'   => 'FakePassword',

        ]);

        UserFactory::createMany(20);
        $manager->flush();
    }

}