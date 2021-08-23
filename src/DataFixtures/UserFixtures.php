<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\DataFixtures\Data\UserData;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager)
    {
        foreach (UserData::$userData as $data) {
            $user = new User();

            $user->setEmail($data['email']);
            $user->setRoles([$data['roles']]);
            $user->setPassword($this->passwordHasher->hashPassword($user, $data['password']));

            $manager->persist($user);
        };

        $manager->flush();
    }
}