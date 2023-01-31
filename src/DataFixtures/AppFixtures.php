<?php

namespace App\DataFixtures;

use App\Entity\Ingredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class AppFixtures extends Fixture
{
    /**
     * @var Generator
     */
        private Generator $faker;

        public function __construct()
    {
        $this-> faker = Factory::create('fr_FR');
    }
    public function load(ObjectManager $manager): void
    {

        // Crée une liste de 50 ingrédients avec des prix random. On l'injecte dans la base de donnée avec php bin/console doctrine:fixtures:load
        for ($i= 1; $i < 50; $i++) {
            $ingredient = new Ingredient();
            $ingredient->setName($this->faker->word()) // Faker va générer des mots aléatoirement
                       ->setPrice(mt_rand(0, 100));
            $manager->persist($ingredient);
        }


        $manager->flush();
    }
}
