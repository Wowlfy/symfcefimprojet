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


}
