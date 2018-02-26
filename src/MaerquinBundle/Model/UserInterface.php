<?php

namespace MaerquinBundle\Model;

use FOS\UserBundle\Model\UserInterface as BaseUserInterface;

interface UserInterface extends BaseUserInterface
{
    /**
     * Return a persons actual name
     */
    public function getRealName();

    /**
     * Set a persons actual name
     *
     * @param string $realName
     */
    public function setRealName($realName);

    /**
     * Get the player
     */
    public function getPlayer();

    /**
     * Set the player
     *
     * @param Player $player
     */
    public function setPlayer(Player $player);
}