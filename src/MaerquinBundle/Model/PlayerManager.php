<?php

namespace MaerquinBundle\Model;

use Doctrine\ORM\EntityManagerInterface;

class PlayerManager
{
    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * Get a list of all players
     *
     * @return Player[]
     */
    public function getAll()
    {
        return $this->em->getRepository('MaerquinBundle:Player')->findBy([], ['name' => 'asc']);
    }

}