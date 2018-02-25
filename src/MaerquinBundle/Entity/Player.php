<?php


namespace MaerquinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="maerquin_player")
 */
class Player
{
    /**
     * @ORM\Id
     * @ORM\Column(type="guid")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=128, nullable=false)
     */
    protected $name;

    /**
     * @ORM\ManyToOne(targetEntity="Character", inversedBy="player")
     * @ORM\JoinColumn(name="character_id", referencedColumnName="id", nullable=true)
     */
    protected $characters;
}