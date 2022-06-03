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


}
