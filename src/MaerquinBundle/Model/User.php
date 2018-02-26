<?php

namespace MaerquinBundle\Model;

use FOS\UserBundle\Model\User as BaseUser;

class User extends BaseUser implements UserInterface
{
    /**
     * {@inheritdoc}
     */
    public function setRealName($realName)
    {
        $this->realName = $realName;
    }

    /**
     * {@inheritdoc}
     */
    public function getRealName()
    {
        return $this->realName;
    }

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