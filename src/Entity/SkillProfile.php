<?php

namespace App\Entity;

use App\Repository\SkillProfileRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SkillProfileRepository::class)
 */
class SkillProfile
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $spDescription;

    /**
     * @ORM\OneToOne(targetEntity=Applicant::class, inversedBy="apSkillProfile", cascade={"persist", "remove"})
     */
    private $spApplicant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSpDescription(): ?string
    {
        return $this->spDescription;
    }

    public function setSpDescription(string $spDescription): self
    {
        $this->spDescription = $spDescription;

        return $this;
    }

    public function getSpApplicant(): ?Applicant
    {
        return $this->spApplicant;
    }

    public function setSpApplicant(?Applicant $spApplicant): self
    {
        $this->spApplicant = $spApplicant;

        return $this;
    }
}
