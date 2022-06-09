<?php

namespace App\Entity;

use App\Repository\SkillRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\ManyToOne(targetEntity=SkillCategory::class, inversedBy="scSkill")
     */
    private $skCategory;

    /**
     * @ORM\OneToMany(targetEntity=ProfileDetail::class, mappedBy="pdSkill")
     */
    private $skProfileDetails;

    public function __construct()
    {
        $this->skProfileDetails = new ArrayCollection();
    }

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

    public function getSkCategory(): ?SkillCategory
    {
        return $this->skCategory;
    }

    public function setSkCategory(?SkillCategory $skCategory): self
    {
        $this->skCategory = $skCategory;

        return $this;
    }

    /**
     * @return Collection<int, ProfileDetail>
     */
    public function getSkProfileDetails(): Collection
    {
        return $this->skProfileDetails;
    }

    public function addSkProfileDetail(ProfileDetail $profileDetail): self
    {
        if (!$this->skProfileDetails->contains($profileDetail)) {
            $this->skProfileDetails[] = $profileDetail;
            $profileDetail->setPdSkill($this);
        }

        return $this;
    }

    public function removeSkProfileDetail(ProfileDetail $profileDetail): self
    {
        if ($this->skProfileDetails->removeElement($profileDetail)) {
            // set the owning side to null (unless already changed)
            if ($profileDetail->getPdSkill() === $this) {
                $profileDetail->setPdSkill(null);
            }
        }

        return $this;
    }
}
