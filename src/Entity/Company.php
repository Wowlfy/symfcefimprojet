<?php

namespace App\Entity;

use App\Repository\CompanyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompanyRepository::class)
 */
class Company
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
    private $coName;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $coAddress;

    /**
     * @ORM\OneToMany(targetEntity=Experience::class, mappedBy="exCompany")
     */
    private $coExperiences;

    public function __construct()
    {
        $this->coExperiences = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCoName(): ?string
    {
        return $this->coName;
    }

    public function setCoName(string $coName): self
    {
        $this->coName = $coName;

        return $this;
    }

    public function getCoAddress(): ?string
    {
        return $this->coAddress;
    }

    public function setCoAddress(string $coAddress): self
    {
        $this->coAddress = $coAddress;

        return $this;
    }

    /**
     * @return Collection<int, Experience>
     */
    public function getCoExperiences(): Collection
    {
        return $this->coExperiences;
    }

    public function addCoExperience(Experience $coExperience): self
    {
        if (!$this->coExperiences->contains($coExperience)) {
            $this->coExperiences[] = $coExperience;
            $coExperience->setExCompany($this);
        }

        return $this;
    }

    public function removeCoExperience(Experience $coExperience): self
    {
        if ($this->coExperiences->removeElement($coExperience)) {
            // set the owning side to null (unless already changed)
            if ($coExperience->getExCompany() === $this) {
                $coExperience->setExCompany(null);
            }
        }

        return $this;
    }
}
