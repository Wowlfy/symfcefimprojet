<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetailProfil
 *
 * @ORM\Table(name="detail_profil", indexes={@ORM\Index(name="fk_dp_competence", columns={"dp_competence"}), @ORM\Index(name="fk_dp_profil_competence", columns={"dp_profil_competence"})})
 * @ORM\Entity
 */
class DetailProfil
{
    /**
     * @var int
     *
     * @ORM\Column(name="dp_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dpId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="dp_niveau", type="smallint", nullable=true)
     */
    private $dpNiveau;

    /**
     * @var int|null
     *
     * @ORM\Column(name="dp_attrait", type="smallint", nullable=true)
     */
    private $dpAttrait;

    /**
     * @var \Competence
     *
     * @ORM\ManyToOne(targetEntity="Competence")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dp_competence", referencedColumnName="cm_id")
     * })
     */
    private $dpCompetence;

    /**
     * @var \ProfilCompetence
     *
     * @ORM\ManyToOne(targetEntity="ProfilCompetence")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dp_profil_competence", referencedColumnName="pc_id")
     * })
     */
    private $dpProfilCompetence;

    public function getDpId(): ?int
    {
        return $this->dpId;
    }

    public function getDpNiveau(): ?int
    {
        return $this->dpNiveau;
    }

    public function setDpNiveau(?int $dpNiveau): self
    {
        $this->dpNiveau = $dpNiveau;

        return $this;
    }

    public function getDpAttrait(): ?int
    {
        return $this->dpAttrait;
    }

    public function setDpAttrait(?int $dpAttrait): self
    {
        $this->dpAttrait = $dpAttrait;

        return $this;
    }

    public function getDpCompetence(): ?Competence
    {
        return $this->dpCompetence;
    }

    public function setDpCompetence(?Competence $dpCompetence): self
    {
        $this->dpCompetence = $dpCompetence;

        return $this;
    }

    public function getDpProfilCompetence(): ?ProfilCompetence
    {
        return $this->dpProfilCompetence;
    }

    public function setDpProfilCompetence(?ProfilCompetence $dpProfilCompetence): self
    {
        $this->dpProfilCompetence = $dpProfilCompetence;

        return $this;
    }


}
