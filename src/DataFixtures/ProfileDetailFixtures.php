<?php

namespace App\DataFixtures;

use App\Entity\ProfileDetail;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProfileDetailFixtures extends Fixture
{
    public const NBDETAILS= 10;
    public function load(ObjectManager $manager): void
    {
        //ProfileDetails
        for($u = 0; $u < ProfileDetailFixtures::NBDETAILS; $u++){
            $profileDetail= new ProfileDetail();
            $profileDetail
                ->setPdLevel(rand(0,5))
                ->setPdAppeal(rand(0,2))
                ->setPdSkill($this->getReference('skill_' . $u));
            $manager->persist($profileDetail);
            $this->addReference('profileDetail_' . $u, $profileDetail);
        }

        $manager->flush();
    }
    public function getDependencies()
    {
        return [SkillFixtures::class];
    }
}
