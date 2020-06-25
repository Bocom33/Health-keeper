<?php


namespace App\DataFixtures;

use App\Entity\AnnoyanceZone;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AnnoyanceZoneFixtures extends Fixture
{
    const ANNOYANCESZONES = [
        'Tête',
        'Bras',
        'Jambes',
        'Mains',
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::ANNOYANCESZONES as $key => $annoyanceZoneName) {
            $annoyanceZone = new AnnoyanceZone();
            $annoyanceZone->setName($annoyanceZoneName);

            $manager->persist($annoyanceZone);
        }
        $manager->flush();
    }
}
