<?php

namespace MaerquinBundle\Model;

use MaerquinBundle\Entity\User as EntityUser;

class User extends EntityUser implements UserInterface
{
    /**
     * {@inheritdoc}
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * {@inheritdoc}
     */
    public function setPlayer(Player $player)
    {
        $this->player = $player;
    }
}