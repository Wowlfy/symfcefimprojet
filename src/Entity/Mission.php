<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mission
 *
 * @ORM\Table(name="mission", indexes={@ORM\Index(name="fk_mi_collaborateur", columns={"mi_collaborateur"}), @ORM\Index(name="fk_mi_commercial", columns={"mi_commercial"}), @ORM\Index(name="fk_mi_entreprise", columns={"mi_entreprise"})})
 * @ORM\Entity
 */
class Mission
{
    /**
     * @var int
     *
     * @ORM\Column(name="mi_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $miId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="mi_date_debut", type="date", nullable=true)
     */
    private $miDateDebut;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="mi_date_fin", type="date", nullable=true)
     */
    private $miDateFin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mi_lieu", type="string", length=50, nullable=true)
     */
    private $miLieu;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mi_collaborateur", referencedColumnName="ut_id")
     * })
     */
    private $miCollaborateur;

    /**
     * @var \Entreprise
     *
     * @ORM\ManyToOne(targetEntity="Entreprise")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mi_entreprise", referencedColumnName="en_id")
     * })
     */
    private $miEntreprise;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mi_commercial", referencedColumnName="ut_id")
     * })
     */
    private $miCommercial;

    public function getMiId(): ?int
    {
        return $this->miId;
    }

    public function getMiDateDebut(): ?\DateTimeInterface
    {
        return $this->miDateDebut;
    }

    public function setMiDateDebut(?\DateTimeInterface $miDateDebut): self
    {
        $this->miDateDebut = $miDateDebut;

        return $this;
    }

    public function getMiDateFin(): ?\DateTimeInterface
    {
        return $this->miDateFin;
    }

    public function setMiDateFin(?\DateTimeInterface $miDateFin): self
    {
        $this->miDateFin = $miDateFin;

        return $this;
    }

    public function getMiLieu(): ?string
    {
        return $this->miLieu;
    }

    public function setMiLieu(?string $miLieu): self
    {
        $this->miLieu = $miLieu;

        return $this;
    }

    public function getMiCollaborateur(): ?Utilisateur
    {
        return $this->miCollaborateur;
    }

    public function setMiCollaborateur(?Utilisateur $miCollaborateur): self
    {
        $this->miCollaborateur = $miCollaborateur;

        return $this;
    }

    public function getMiEntreprise(): ?Entreprise
    {
        return $this->miEntreprise;
    }

    public function setMiEntreprise(?Entreprise $miEntreprise): self
    {
        $this->miEntreprise = $miEntreprise;

        return $this;
    }

    public function getMiCommercial(): ?Utilisateur
    {
        return $this->miCommercial;
    }

    public function setMiCommercial(?Utilisateur $miCommercial): self
    {
        $this->miCommercial = $miCommercial;

        return $this;
    }


}
