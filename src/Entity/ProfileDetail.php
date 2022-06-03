<?php

namespace App\Entity;

use App\Repository\ProfileDetailRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfileDetailRepository::class)
 */
class ProfileDetail
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="smallint")
     */
    private $pdLevel;

    /**
     * @ORM\Column(type="smallint")
     */
    private $pdAppeal;

    /**
     * @ORM\ManyToOne(targetEntity=Skill::class, inversedBy="profileDetails")
     */
    private $pdSkill;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPdLevel(): ?int
    {
        return $this->pdLevel;
    }

    public function setPdLevel(int $pdLevel): self
    {
        $this->pdLevel = $pdLevel;

        return $this;
    }

    public function getPdAppeal(): ?int
    {
        return $this->pdAppeal;
    }

    public function setPdAppeal(int $pdAppeal): self
    {
        $this->pdAppeal = $pdAppeal;

        return $this;
    }

    public function getPdSkill(): ?Skill
    {
        return $this->pdSkill;
    }

    public function setPdSkill(?Skill $pdSkill): self
    {
        $this->pdSkill = $pdSkill;

        return $this;
    }
}
