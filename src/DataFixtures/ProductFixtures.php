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
    ];

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        foreach (self::OUTILLAGE as $key => $value) {
            $product = new Product();
            $product->setCategory($this->getReference('category_Outillage'));
            $product->setName($value);
            $product->setMarque('Bosh');
            $product->setUtilisation('Occasionel');
            $product->setPrice(126);
            $product->setImage('https://www.lidl.be/media/53a336b0b443b3893d4c6e5e0316deb7.jpeg');
            $product->setMaterial('béton');
            $product->addFeature($this->getReference('caracteristique_0'));
            $product->setMateriaux($this->getReference('materiaux_0'));
            $product->setReference(uniqid());
            $manager->persist($product);
            $this->addReference('product_outillage_' . $key, $product);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
            CaracteristiqueFixtures::class
        ];
    }
}
