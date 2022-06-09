<?php

namespace App\Entity;

use App\Repository\SkillProfileRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity=Experience::class, mappedBy="exSkillProfile")
     */
    private $spExperiences;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="usSkillProfile", cascade={"persist", "remove"})
     */
    private $spEmployee;

    public function __construct()
    {
        $this->spExperiences = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Experience>
     */
    public function getSpExperiences(): Collection
    {
        return $this->spExperiences;
    }

    public function addSpExperience(Experience $spExperience): self
    {
        if (!$this->spExperiences->contains($spExperience)) {
            $this->spExperiences[] = $spExperience;
            $spExperience->setExSkillProfile($this);
        }

        return $this;
    }

    public function removeSpExperience(Experience $spExperience): self
    {
        if ($this->spExperiences->removeElement($spExperience)) {
            // set the owning side to null (unless already changed)
            if ($spExperience->getExSkillProfile() === $this) {
                $spExperience->setExSkillProfile(null);
            }
        }

        return $this;
    }

    public function getSpEmployee(): ?User
    {
        return $this->spEmployee;
    }

    public function setSpEmployee(?User $spEmployee): self
    {
        $this->spEmployee = $spEmployee;

        return $this;
    }
}
