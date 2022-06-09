<?php

namespace App\Entity;

use App\Repository\ExperienceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExperienceRepository::class)
 */
class Experience
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
    private $exJobTitle;

    /**
     * @ORM\Column(type="date")
     */
    private $exStartDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $exEndDate;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $exDescription;

    /**
     * @ORM\ManyToOne(targetEntity=SkillProfile::class, inversedBy="spExperiences")
     */
    private $exSkillProfile;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="coExperiences")
     * @ORM\JoinColumn(nullable=false)
     */
    private $exCompany;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExJobTitle(): ?string
    {
        return $this->exJobTitle;
    }

    public function setExJobTitle(string $exJobTitle): self
    {
        $this->exJobTitle = $exJobTitle;

        return $this;
    }

    public function getExStartDate(): ?\DateTimeInterface
    {
        return $this->exStartDate;
    }

    public function setExStartDate(\DateTimeInterface $exStartDate): self
    {
        $this->exStartDate = $exStartDate;

        return $this;
    }

    public function getExEndDate(): ?\DateTimeInterface
    {
        return $this->exEndDate;
    }

    public function setExEndDate(?\DateTimeInterface $exEndDate): self
    {
        $this->exEndDate = $exEndDate;

        return $this;
    }

    public function getExDescription(): ?string
    {
        return $this->exDescription;
    }

    public function setExDescription(?string $exDescription): self
    {
        $this->exDescription = $exDescription;

        return $this;
    }

    public function getExSkillProfile(): ?SkillProfile
    {
        return $this->exSkillProfile;
    }

    public function setExSkillProfile(?SkillProfile $exSkillProfile): self
    {
        $this->exSkillProfile = $exSkillProfile;

        return $this;
    }

    public function getExCompany(): ?Company
    {
        return $this->exCompany;
    }

    public function setExCompany(?Company $exCompany): self
    {
        $this->exCompany = $exCompany;

        return $this;
    }
}
