<?php


namespace MaerquinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="maerquin_component")
 */
class Component
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
     * @ORM\Column(type="string", length=16, nullable=false)
     */
    protected $loreCode;

    /**
     * @ORM\Column(type="float")
     */
    protected $costs;

    /**
     * @ORM\Column(type="integer")
     */
    protected $loreLevel;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    protected $description;

    /**
     * @ORM\ManyToOne(targetEntity="ComponentType")
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id")
     */
    protected $type;

    /**
     * @ORM\ManyToOne(targetEntity="ComponentSchool")
     * @ORM\JoinColumn(name="school_id", referencedColumnName="id")
     */
    protected $school;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    protected $recipe;

    /**
     * @ORM\ManyToOne(targetEntity="ExpirationType")
     * @ORM\JoinColumn(name="expiration_type_id", referencedColumnName="id")
     */
    protected $expirationType;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $uniqueItem;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $magical;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $removed;
}
