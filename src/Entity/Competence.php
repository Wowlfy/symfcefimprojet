<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Competence
 *
 * @ORM\Table(name="competence", indexes={@ORM\Index(name="fk_cm_categorie", columns={"cm_categorie"})})
 * @ORM\Entity
 */
class Competence
{
    /**
     * @var int
     *
     * @ORM\Column(name="cm_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cmId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cm_nom", type="string", length=50, nullable=true)
     */
    private $cmNom;

    /**
     * @var \CategorieCompetence
     *
     * @ORM\ManyToOne(targetEntity="CategorieCompetence")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cm_categorie", referencedColumnName="cc_id")
     * })
     */
    private $cmCategorie;


}
