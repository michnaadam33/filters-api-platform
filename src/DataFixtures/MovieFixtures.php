<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class MovieFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $movie1 = new Movie();
        $movie1->setCreatedAt(new DateTime("1999-01-01"));
        $movie1->setTitle("The Green Mile");
        $movie1->setDirector($this->getReference(UserFixtures::USER_1));
        $manager->persist($movie1);

        $movie2 = new Movie();
        $movie2->setCreatedAt(new DateTime("1994-01-01"));
        $movie2->setTitle("The Shawshank Redemption");
        $movie2->setDirector($this->getReference(UserFixtures::USER_1));
        $manager->persist($movie2);

        $movie3 = new Movie();
        $movie3->setCreatedAt(new DateTime("1994-02-01"));
        $movie3->setTitle("Forrest Gump");
        $movie3->setDirector($this->getReference(UserFixtures::USER_2));
        $manager->persist($movie3);

        $movie4 = new Movie();
        $movie4->setCreatedAt(new DateTime("1994-01-01"));
        $movie4->setTitle("Léon");
        $movie4->setDirector($this->getReference(UserFixtures::USER_3));
        $manager->persist($movie4);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            UserFixtures::class
        ];
    }
}
