<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Experience
 *
 * @ORM\Table(name="experience", indexes={@ORM\Index(name="fk_ex_entreprise", columns={"ex_entreprise"}), @ORM\Index(name="fk_ex_profil_competence", columns={"ex_profil_competence"})})
 * @ORM\Entity
 */
class Experience
{
    /**
     * @var int
     *
     * @ORM\Column(name="ex_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $exId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ex_nom_poste", type="string", length=50, nullable=true)
     */
    private $exNomPoste;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="ex_date_debut", type="date", nullable=true)
     */
    private $exDateDebut;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="ex_date_fin", type="date", nullable=true)
     */
    private $exDateFin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ex_description", type="text", length=65535, nullable=true)
     */
    private $exDescription;

    /**
     * @var \Entreprise
     *
     * @ORM\ManyToOne(targetEntity="Entreprise")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ex_entreprise", referencedColumnName="en_id")
     * })
     */
    private $exEntreprise;

    /**
     * @var \ProfilCompetence
     *
     * @ORM\ManyToOne(targetEntity="ProfilCompetence")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ex_profil_competence", referencedColumnName="pc_id")
     * })
     */
    private $exProfilCompetence;


}
