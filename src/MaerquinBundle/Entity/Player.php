<?php

namespace MaerquinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use MaerquinBundle\Model\Player as BasePlayer;

/**
 * @ORM\Entity()
 * @ORM\Table(name="maerquin_player")
 */
class Player extends BasePlayer
{
    /**
     * @ORM\Id
     * @ORM\Column(type="guid")
     *
     * @Serializer\Groups({"list"})
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=128, nullable=false)
     *
     * @Serializer\Groups({"list"})
     */
    protected $name;

    /**
     * @ORM\OneToMany(targetEntity="Character", mappedBy="player")
     */
    protected $characters;
}