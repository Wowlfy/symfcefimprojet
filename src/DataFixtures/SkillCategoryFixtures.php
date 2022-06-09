<?php

namespace App\DataFixtures;

use App\Entity\SkillCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;

class SkillCategoryFixtures extends Fixture
{
    public const NBCATEGORIES = 10;
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        //skillCategory
        for($u = 0; $u < SkillCategoryFixtures::NBCATEGORIES ; $u++){
            $skillCat = new SkillCategory();
            $skillCat
                ->setScName($faker->word);
            $manager->persist($skillCat);
            $this->addReference('skillCategory_' . $u, $skillCat);
        }
        $manager->flush();
    }
}
