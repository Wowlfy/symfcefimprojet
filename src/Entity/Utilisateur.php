<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity
 */
class Utilisateur
{
    /**
     * @var int
     *
     * @ORM\Column(name="ut_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $utId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ut_nom", type="string", length=50, nullable=true)
     */
    private $utNom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ut_prenom", type="string", length=50, nullable=true)
     */
    private $utPrenom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ut_email", type="string", length=200, nullable=true)
     */
    private $utEmail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ut_login", type="string", length=50, nullable=true)
     */
    private $utLogin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ut_password", type="string", length=100, nullable=true)
     */
    private $utPassword;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="ut_sous_contrat", type="boolean", nullable=true)
     */
    private $utSousContrat;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="ut_en_mission", type="boolean", nullable=true)
     */
    private $utEnMission;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="ut_date_fin_mission", type="date", nullable=true)
     */
    private $utDateFinMission;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ut_role", type="smallint", nullable=true)
     */
    private $utRole;

    public function getUtId(): ?int
    {
        return $this->utId;
    }

    public function getUtNom(): ?string
    {
        return $this->utNom;
    }

    public function setUtNom(?string $utNom): self
    {
        $this->utNom = $utNom;

        return $this;
    }

    public function getUtPrenom(): ?string
    {
        return $this->utPrenom;
    }

    public function setUtPrenom(?string $utPrenom): self
    {
        $this->utPrenom = $utPrenom;

        return $this;
    }

    public function getUtEmail(): ?string
    {
        return $this->utEmail;
    }

    public function setUtEmail(?string $utEmail): self
    {
        $this->utEmail = $utEmail;

        return $this;
    }

    public function getUtLogin(): ?string
    {
        return $this->utLogin;
    }

    public function setUtLogin(?string $utLogin): self
    {
        $this->utLogin = $utLogin;

        return $this;
    }

    public function getUtPassword(): ?string
    {
        return $this->utPassword;
    }

    public function setUtPassword(?string $utPassword): self
    {
        $this->utPassword = $utPassword;

        return $this;
    }

    public function isUtSousContrat(): ?bool
    {
        return $this->utSousContrat;
    }

    public function setUtSousContrat(?bool $utSousContrat): self
    {
        $this->utSousContrat = $utSousContrat;

        return $this;
    }

    public function isUtEnMission(): ?bool
    {
        return $this->utEnMission;
    }

    public function setUtEnMission(?bool $utEnMission): self
    {
        $this->utEnMission = $utEnMission;

        return $this;
    }

    public function getUtDateFinMission(): ?\DateTimeInterface
    {
        return $this->utDateFinMission;
    }

    public function setUtDateFinMission(?\DateTimeInterface $utDateFinMission): self
    {
        $this->utDateFinMission = $utDateFinMission;

        return $this;
    }

    public function getUtRole(): ?int
    {
        return $this->utRole;
    }

    public function setUtRole(?int $utRole): self
    {
        $this->utRole = $utRole;

        return $this;
    }


}
