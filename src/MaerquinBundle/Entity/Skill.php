<?php


namespace MaerquinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="maerquin_skill")
 */
class Skill
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
     * @ORM\Column(type="integer", nullable=false)
     */
    protected $points;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    protected $timesPerDay;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    protected $description;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    protected $remarks;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    protected $distance;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    protected $duration;

    /**
     * @ORM\ManyToOne(targetEntity="Skill")
     * @ORM\JoinColumn(name="prerequisite_skill_id", referencedColumnName="id")
     */
    protected $prerequisiteSkill;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $hidden;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $spell;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $innatePossible;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $availableAsComponents;

    /**
     * @ORM\Column(type="integer")
     */
    protected $level;

    /**
     * @ORM\ManyToOne(targetEntity="ComponentSchool")
     * @ORM\JoinColumn(name="school_id", referencedColumnName="id")
     */
    protected $school;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    protected $scrollText;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $componentPage;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $nonFree;
}
