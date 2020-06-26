<?php


namespace App\DataFixtures;

use App\Entity\Annoyance;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AnnoyanceFixtures extends Fixture
{
    const ANNOYANCES = [
        'Chocs électriques',
        'Engourdissements',
        'Lanciements',
        'Fourmillements',
        'Migraine',
        'Brûlure',
        'Coupure',
        'Piqûre',
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::ANNOYANCES as $key => $annoyanceName) {
            $annoyance = new Annoyance();
            $annoyance->setName($annoyanceName);

            $manager->persist($annoyance);
        }
        $manager->flush();
    }
}
