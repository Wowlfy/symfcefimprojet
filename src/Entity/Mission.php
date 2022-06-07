<?php

namespace App\Entity;

use App\Repository\MissionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MissionRepository::class)
 */
class Mission
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $miStartDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $miEndDate;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $miAddress;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="coMissions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $miCompany;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="usMissions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $miEmployee;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="cmMissions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $miCommercial;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMiStartDate(): ?\DateTimeInterface
    {
        return $this->miStartDate;
    }

    public function setMiStartDate(\DateTimeInterface $miStartDate): self
    {
        $this->miStartDate = $miStartDate;

        return $this;
    }

    public function getMiEndDate(): ?\DateTimeInterface
    {
        return $this->miEndDate;
    }

    public function setMiEndDate(?\DateTimeInterface $miEndDate): self
    {
        $this->miEndDate = $miEndDate;

        return $this;
    }

    public function getMiAddress(): ?string
    {
        return $this->miAddress;
    }

    public function setMiAddress(string $miAddress): self
    {
        $this->miAddress = $miAddress;

        return $this;
    }

    public function getMiCompany(): ?Company
    {
        return $this->miCompany;
    }

    public function setMiCompany(?Company $miCompany): self
    {
        $this->miCompany = $miCompany;

        return $this;
    }

    public function getMiEmployee(): ?User
    {
        return $this->miEmployee;
    }

    public function setMiEmployee(?User $miEmployee): self
    {
        $this->miEmployee = $miEmployee;

        return $this;
    }

    public function getMiCommercial(): ?User
    {
        return $this->miCommercial;
    }

    public function setMiCommercial(?User $miCommercial): self
    {
        $this->miCommercial = $miCommercial;

        return $this;
    }
}
