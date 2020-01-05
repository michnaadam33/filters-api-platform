<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public const USER_1 = 'user1';
    public const USER_2 = 'user2';
    public const USER_3 = 'user3';

    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setFirstName('Frank');
        $user1->setLastName('Darabont');
        $manager->persist($user1);

        $user2 = new User();
        $user2->setFirstName('Luc');
        $user2->setLastName('Besson');
        $manager->persist($user2);

        $user3 = new User();
        $user3->setFirstName('Robert');
        $user3->setLastName('Zemeckis');
        $manager->persist($user3);

        $manager->flush();

        $this->addReference(self::USER_1, $user1);
        $this->addReference(self::USER_2, $user2);
        $this->addReference(self::USER_3, $user3);
    }
}
