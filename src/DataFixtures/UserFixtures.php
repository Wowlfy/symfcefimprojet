<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Faker\Factory;

class UserFixtures extends Fixture
{
    public const NBUSERS = 10;
    private UserPasswordHasherInterface $passwordHasher;
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        //user
        for($u = 0; $u < UserFixtures::NBUSERS; $u++){
            $user= new User();
            $user
                ->setUsFirstname($faker->firstName)
                ->setUsLastname($faker->lastName)
                ->setUsEmail($faker->email)
                ->setPassword($this->passwordHasher->hashPassword($user, '3366'))
                ->setUsAvailable($faker->boolean);
                $manager->persist($user);
        }
         //admin
         $admin = new User();
         $admin
             ->setUsFirstname('Jojo')
             ->setUsLastname('Jojo')
             ->setUsEmail('admin@gmail.com')
             ->setUsRoles(['ROLE_ADMIN'])
             ->setPassword($this->passwordHasher->hashPassword($user, 'admin'))
             ->setUsAvailable(true);
             $manager->persist($admin);
          //commercial
          $commercial = new User();
          $commercial
              ->setUsFirstname('Toto')
              ->setUsLastname('Toto')
              ->setUsEmail('commercial@gmail.com')
              ->setUsRoles(['ROLE_COMMERCIAL'])
              ->setPassword($this->passwordHasher->hashPassword($user, 'commercial'))
              ->setUsAvailable(true);
              $manager->persist($commercial);
           //employee - collaborateur
           $employee = new User();
           $employee
               ->setUsFirstname('Nono')
               ->setUsLastname('Nono')
               ->setUsEmail('employee@gmail.com')
               ->setUsRoles(['ROLE_USER'])
               ->setPassword($this->passwordHasher->hashPassword($user, 'employee'))
               ->setUsAvailable(true);
               $manager->persist($employee);
          $manager->flush();
          //run symfony console d:f:l
    }
}
