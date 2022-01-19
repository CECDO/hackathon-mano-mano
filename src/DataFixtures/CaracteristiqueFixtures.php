<?php

namespace App\DataFixtures;

use App\Entity\Caracteristique;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CaracteristiqueFixtures extends Fixture
{
    const FEATURES = [
        'Sans-Fil',
        'Filaire',
        'Normal',
        'Souple',
        'King-size',
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::FEATURES as $key => $value) {
            $Caracteristique = new Caracteristique();
            $Caracteristique->setName($value);
            $manager->persist($Caracteristique);
        }

        $manager->flush();
    }
}
