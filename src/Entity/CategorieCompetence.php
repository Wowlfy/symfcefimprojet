<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategorieCompetence
 *
 * @ORM\Table(name="categorie_competence")
 * @ORM\Entity
 */
class CategorieCompetence
{
    /**
     * @var int
     *
     * @ORM\Column(name="cc_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ccId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cc_nom", type="string", length=50, nullable=true)
     */
    private $ccNom;


}
