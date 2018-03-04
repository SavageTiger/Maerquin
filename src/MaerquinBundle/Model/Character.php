<?php

namespace MaerquinBundle\Model;

class Character
{
    protected $id;
    protected $name;
    protected $title;
    protected $race;
    protected $deity;
    protected $occupation;
    protected $guild;
    protected $birthplace;
    protected $player;
    protected $notes;

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

}