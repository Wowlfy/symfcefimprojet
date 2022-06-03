<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entreprise
 *
 * @ORM\Table(name="entreprise")
 * @ORM\Entity
 */
class Entreprise
{
    /**
     * @var int
     *
     * @ORM\Column(name="en_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $enId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="en_nom", type="string", length=50, nullable=true)
     */
    private $enNom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="en_adresse", type="string", length=200, nullable=true)
     */
    private $enAdresse;

    public function getEnId(): ?int
    {
        return $this->enId;
    }

    public function getEnNom(): ?string
    {
        return $this->enNom;
    }

    public function setEnNom(?string $enNom): self
    {
        $this->enNom = $enNom;

        return $this;
    }

    public function getEnAdresse(): ?string
    {
        return $this->enAdresse;
    }

    public function setEnAdresse(?string $enAdresse): self
    {
        $this->enAdresse = $enAdresse;

        return $this;
    }


}
