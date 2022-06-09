<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;

class SkillFixtures extends Fixture
{
    public const NBSKILLS=10;
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        //skill
        for($u = 0; $u < SkillFixtures::NBSKILLS; $u++){
            $skill = new Skill();
            $skill
                ->setSkName($faker->word)
                ->setSkCategory($this->getReference('skillCategory_' . $u));
            $manager->persist($skill);
            $this->addReference('skill_' . $u, $skill);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return [SkillCategoryFixtures::class];
    }
}
