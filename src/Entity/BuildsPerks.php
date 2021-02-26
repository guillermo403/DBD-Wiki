<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BuildsPerks
 *
 * @ORM\Table(name="Builds_Perks", indexes={@ORM\Index(name="id_build", columns={"id_build"}), @ORM\Index(name="id_perk", columns={"id_perk"})})
 * @ORM\Entity
 */
class BuildsPerks
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Builds
     *
     * @ORM\ManyToOne(targetEntity="Builds")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_build", referencedColumnName="id")
     * })
     */
    private $idBuild;

    /**
     * @var \Perks
     *
     * @ORM\ManyToOne(targetEntity="Perks")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_perk", referencedColumnName="id")
     * })
     */
    private $idPerk;


}
