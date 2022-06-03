<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProfilCompetence
 *
 * @ORM\Table(name="profil_competence", indexes={@ORM\Index(name="fk_pc_collaborateur", columns={"pc_collaborateur"}), @ORM\Index(name="fk_pc_candidat", columns={"pc_candidat"})})
 * @ORM\Entity
 */
class ProfilCompetence
{
    /**
     * @var int
     *
     * @ORM\Column(name="pc_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pcId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pc_libelle", type="string", length=50, nullable=true)
     */
    private $pcLibelle;

    /**
     * @var \Candidat
     *
     * @ORM\ManyToOne(targetEntity="Candidat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pc_candidat", referencedColumnName="ca_id")
     * })
     */
    private $pcCandidat;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pc_collaborateur", referencedColumnName="ut_id")
     * })
     */
    private $pcCollaborateur;

    public function getPcId(): ?int
    {
        return $this->pcId;
    }

    public function getPcLibelle(): ?string
    {
        return $this->pcLibelle;
    }

    public function setPcLibelle(?string $pcLibelle): self
    {
        $this->pcLibelle = $pcLibelle;

        return $this;
    }

    public function getPcCandidat(): ?Candidat
    {
        return $this->pcCandidat;
    }

    public function setPcCandidat(?Candidat $pcCandidat): self
    {
        $this->pcCandidat = $pcCandidat;

        return $this;
    }

    public function getPcCollaborateur(): ?Utilisateur
    {
        return $this->pcCollaborateur;
    }

    public function setPcCollaborateur(?Utilisateur $pcCollaborateur): self
    {
        $this->pcCollaborateur = $pcCollaborateur;

        return $this;
    }


}
