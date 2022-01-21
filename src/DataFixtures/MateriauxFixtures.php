<?php

namespace App\DataFixtures;

use App\Entity\Materiaux;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MateriauxFixtures extends Fixture
{

    const CATEGORIES = [
        'dur',
        'souple',
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::CATEGORIES as $key => $value) {
            $materiaux = new Materiaux();
            $materiaux->setName($value);
            $manager->persist($materiaux);
            $this->addReference('materiaux_' . $key, $materiaux);
        }
        $manager->flush();
    }
}
