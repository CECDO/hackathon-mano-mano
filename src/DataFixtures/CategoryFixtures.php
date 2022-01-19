<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{

    const CATEGORIES = [
        'Maison' => '🏠',
        'Outillage' => '🔧',
        'Jardinage' => '🪴',
    ];


    public function load(ObjectManager $manager): void
    {
        foreach (self::CATEGORIES as $key => $value) {
            $category = new Category();
            $category->setAlt($key);
            $category->setIcon($value);
            $manager->persist($category);
            $this->addReference('category_' . $key, $category);
        }
        $manager->flush();
    }
}
