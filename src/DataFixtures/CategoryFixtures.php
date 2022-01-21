<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{

    const CATEGORIES = [
        'Maison' => 'https://i.ibb.co/BLDRmD7/maison-copie-2.png',
        'Outillage' => 'https://i.ibb.co/8BcHbps/marteau2.png',
        'Jardinage' => 'https://i.ibb.co/cv0qqdN/gardening-copie-2.png',
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
