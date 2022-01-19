<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;


class ProductFixtures extends Fixture
{

    const OUTILLAGE = [
        'Perceuse',
        'Meuleuse',
        'Ponceuse',
        'Défonceuse',
    ];

    const HOME = [
        'Lit',
        'Table de chevet',
        'Chaise',
        'Canapé',
    ];

    const JARDINAGE = [
        'Brouette',
        'Secateur',
        'Débroussailleuse',
        'Tondeuse',
    ];

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        foreach (self::OUTILLAGE as $key => $value) {
            $product = new Product();
            $product->setCategory($this->getReference('category_Outillage'));
            $product->setName($value);
            $product->setMarque('Bosh');
            $product->setUtilisation('Intensif');
            $product->setPrice($faker->randomNumber(3, false));
            $product->setImage('test.jpg');
            $product->setMaterial('béton');
            $manager->persist($product);
            $this->addReference('product_outillage_' . $key, $product);
        }

        foreach (self::HOME as $key => $value) {
            $product = new Product();
            $product->setCategory($this->getReference('category_Maison'));
            $product->setName($value);
            $product->setMarque('Ikea');
            $product->setPrice($faker->randomNumber(3, false));
            $product->setImage('testhome.jpg');
            $manager->persist($product);
            $this->addReference('product_home' . $key, $product);
        }

        foreach (self::JARDINAGE as $key => $value) {
            $product = new Product();
            $product->setCategory($this->getReference('category_Jardinage'));
            $product->setName($value);
            $product->setMarque('Huskvarna');
            $product->setPrice($faker->randomNumber(4, false));
            $product->setImage('testhome.jpg');
            $manager->persist($product);
            $this->addReference('product_jardinage' . $key, $product);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
