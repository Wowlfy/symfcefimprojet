<?php

namespace App\Entity;

use App\Repository\ApplicantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApplicantRepository::class)
 */
class Applicant
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
    private $apLastname;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $apFirstname;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $apMail;

    /**
     * @ORM\Column(type="datetime")
     */
    private $apApplicationDate;

    /**
     * @ORM\OneToOne(targetEntity=SkillProfile::class, mappedBy="spApplicant", cascade={"persist", "remove"})
     */
    private $apSkillProfile;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getApLastname(): ?string
    {
        return $this->apLastname;
    }

    public function setApLastname(string $apLastname): self
    {
        $this->apLastname = $apLastname;

        return $this;
    }

    public function getApFirstname(): ?string
    {
        return $this->apFirstname;
    }

    public function setApFirstname(string $apFirstname): self
    {
        $this->apFirstname = $apFirstname;

        return $this;
    }

    public function getApMail(): ?string
    {
        return $this->apMail;
    }

    public function setApMail(string $apMail): self
    {
        $this->apMail = $apMail;

        return $this;
    }

    public function getApApplicationDate(): ?\DateTimeInterface
    {
        return $this->apApplicationDate;
    }

    public function setApApplicationDate(\DateTimeInterface $apApplicationDate): self
    {
        $this->apApplicationDate = $apApplicationDate;

        return $this;
    }

    public function getApSkillProfile(): ?SkillProfile
    {
        return $this->apSkillProfile;
    }

    public function setApSkillProfile(?SkillProfile $apSkillProfile): self
    {
        // unset the owning side of the relation if necessary
        if ($apSkillProfile === null && $this->apSkillProfile !== null) {
            $this->apSkillProfile->setSpApplicant(null);
        }

        // set the owning side of the relation if necessary
        if ($apSkillProfile !== null && $apSkillProfile->getSpApplicant() !== $this) {
            $apSkillProfile->setSpApplicant($this);
        }

        $this->apSkillProfile = $apSkillProfile;

        return $this;
    }
}
