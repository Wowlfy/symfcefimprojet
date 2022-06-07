<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Faker\Factory;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager): void
    {
        // $faker = Factory::create('fr_FR');
        // //user
        // for($u = 0, $uMax =10; $u<$uMax; $u++){
        //     $user = new User();
        //     $user
        //         ->setFirstname($faker->firstName)
        //         ->setLastname($faker->lastName)
        //         ->setEmail($faker->email)
        //         ->setPassword($this->passwordHasher->hashPassword($user, '3366'));
        //         $manager->persist($user);
        // }
        //  //admin
        //  $admin = new User();
        //  $admin
        //      ->setFirstname('dorine')
        //      ->setLastname('giustina')
        //      ->setEmail('dodox@gmail.com')
        //      ->setRoles(['ROLE_ADMIN'])
        //      ->setPassword($this->passwordHasher->hashPassword($user, '3366'));
        //      $manager->persist($admin);
        //  $manager->flush();
    }
}
