<?php


namespace MaerquinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="maerquin_component_ingredient")
 */
class ComponentIngredient
{
    /**
     * @ORM\Id
     * @ORM\Column(type="guid")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Component")
     * @ORM\JoinColumn(name="component_id", referencedColumnName="id")
     */
    protected $character;

    /**
     * @ORM\ManyToOne(targetEntity="Component")
     * @ORM\JoinColumn(name="ingredient_id", referencedColumnName="id")
     */
    protected $ingredient;

    /**
     * @ORM\Column(type="integer")
     */
    protected $amount;
}