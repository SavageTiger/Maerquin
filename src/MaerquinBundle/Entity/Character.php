<?php

namespace MaerquinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="maerquin_character")
 */
class Character
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
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    protected $title;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    protected $race;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    protected $deity;

    /**
     * @ORM\Column(type="string", length=256, nullable=true)
     */
    protected $occupation;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    protected $guild;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    protected $birthplace;

    /**
     * @ORM\ManyToOne(targetEntity="Player", inversedBy="character")
     * @ORM\JoinColumn(name="player_id", referencedColumnName="id", nullable=true)
     */
    protected $player;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $notes;
}