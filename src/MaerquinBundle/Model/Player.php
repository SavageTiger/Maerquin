<?php

namespace MaerquinBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;

class Player
{
    protected $name;
    protected $characters;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return ArrayCollection
     */
    public function getCharacters()
    {
        return $this->characters;
    }
}