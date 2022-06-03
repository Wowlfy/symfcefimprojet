<?php

namespace App\Entity;

use App\Repository\SkillCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SkillCategoryRepository::class)
 */
class SkillCategory
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
    private $scName;

    /**
     * @ORM\OneToMany(targetEntity=Skill::class, mappedBy="skCategory")
     */
    private $scSkills;

    public function __construct()
    {
        $this->scSkills = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScName(): ?string
    {
        return $this->scName;
    }

    public function setScName(string $scName): self
    {
        $this->scName = $scName;

        return $this;
    }

    /**
     * @return Collection<int, Skill>
     */
    public function getSkills(): Collection
    {
        return $this->scSkills;
    }

    public function addSkill(Skill $skill): self
    {
        if (!$this->scSkills->contains($skill)) {
            $this->scSkills[] = $skill;
            $skill->setSkCategory($this);
        }

        return $this;
    }

    public function removeSkill(Skill $skill): self
    {
        if ($this->scSkill->removeElement($skill)) {
            // set the owning side to null (unless already changed)
            if ($skill->getSkCategory() === $this) {
                $skill->setSkCategory(null);
            }
        }

        return $this;
    }
}
