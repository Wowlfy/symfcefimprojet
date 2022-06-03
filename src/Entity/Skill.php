<?php

namespace App\Entity;

use App\Repository\SkillRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SkillRepository::class)
 */
class Skill
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
    private $skName;

    /**
     * @ORM\ManyToOne(targetEntity=skillCategory::class, inversedBy="scSkill")
     */
    private $skCategory;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSkName(): ?string
    {
        return $this->skName;
    }

    public function setSkName(string $skName): self
    {
        $this->skName = $skName;

        return $this;
    }

    public function getSkCategory(): ?skillCategory
    {
        return $this->skCategory;
    }

    public function setSkCategory(?skillCategory $skCategory): self
    {
        $this->skCategory = $skCategory;

        return $this;
    }
}
