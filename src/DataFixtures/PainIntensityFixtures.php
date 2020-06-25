<?php


namespace App\DataFixtures;

use App\Entity\PainIntensity;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PainIntensityFixtures extends Fixture
{
    const LEVELS = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10,];
    
    public function load(ObjectManager $manager)
    {
        foreach (self::LEVELS as $key => $painintensitylevel) {
            $painIntensity = new PainIntensity();
            $painIntensity->setLevel($painintensitylevel);
            
            $manager->persist($painIntensity);
        }
        $manager->flush();
        // TODO: Implement load() method.
    }
}
