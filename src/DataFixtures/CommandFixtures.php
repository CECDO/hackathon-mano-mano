<?php

namespace App\DataFixtures;

use App\Entity\Command;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CommandFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $command = new Command();
        $command->setReference(uniqid());
        $command->setDeliveryDate($faker->dateTimeBetween('+ 2 weeks', '+ 4 weeks'));
        $command->setOrderDate($faker->dateTimeBetween('- 1 day'));
        $manager->persist($command);
        $manager->flush();
    }


    public function getDependencies()
    {
        return [
            ProductFixtures::class,
        ];
    }
}
