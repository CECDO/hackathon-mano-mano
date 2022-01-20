<?php

namespace App\DataFixtures;

use App\Entity\Caracteristique;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CaracteristiqueFixtures extends Fixture
{
    const FEATURES = [
        'Sans-Fil',
        'Filaire'
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::FEATURES as $key => $value) {
            $caracteristique = new Caracteristique();
            $caracteristique->setName($value);
            $this->addReference('caracteristique_' . $key, $caracteristique);

            $manager->persist($caracteristique);
        }

        $manager->flush();
    }
}
