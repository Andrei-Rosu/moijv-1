<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < 60; $i++ ){
            $user = new User();
            $user->setUsername('user_'.$i);
            $user->setPassword(password_hash('user', PASSWORD_BCRYPT));
            $user->setEmail('user'.$i.'@fake.fr');
            $user->setRegisterDate(new \DateTime('-'.$i.' days'));
            // $manager persist demande à doctrine de préparer l'insertion de 
            // l'entité en base de données -> INSERT INTO
            $manager->persist($user);
        } 
        // flush() valide les requêtes SQL et les execute
        $manager->flush();
    }
}
