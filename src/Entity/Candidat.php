<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Candidat
 *
 * @ORM\Table(name="candidat")
 * @ORM\Entity
 */
class Candidat
{
    /**
     * @var int
     *
     * @ORM\Column(name="ca_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $caId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ca_nom", type="string", length=50, nullable=true)
     */
    private $caNom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ca_prenom", type="string", length=50, nullable=true)
     */
    private $caPrenom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ca_email", type="string", length=200, nullable=true)
     */
    private $caEmail;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="ca_date_candidature", type="date", nullable=true)
     */
    private $caDateCandidature;

    public function getCaId(): ?int
    {
        return $this->caId;
    }

    public function getCaNom(): ?string
    {
        return $this->caNom;
    }

    public function setCaNom(?string $caNom): self
    {
        $this->caNom = $caNom;

        return $this;
    }

    public function getCaPrenom(): ?string
    {
        return $this->caPrenom;
    }

    public function setCaPrenom(?string $caPrenom): self
    {
        $this->caPrenom = $caPrenom;

        return $this;
    }

    public function getCaEmail(): ?string
    {
        return $this->caEmail;
    }

    public function setCaEmail(?string $caEmail): self
    {
        $this->caEmail = $caEmail;

        return $this;
    }

    public function getCaDateCandidature(): ?\DateTimeInterface
    {
        return $this->caDateCandidature;
    }

    public function setCaDateCandidature(?\DateTimeInterface $caDateCandidature): self
    {
        $this->caDateCandidature = $caDateCandidature;

        return $this;
    }


}
