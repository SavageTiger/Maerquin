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
        return $this->em->getRepository('MaerquinBundle:Player')->findBy([], [ 'name' => 'asc' ]);
    }

    /**
     * Get the specified player
     *
     * @param string $itemId
     * @return Player
     */
    public function getItem($itemId)
    {
        return $this->em->getRepository('MaerquinBundle:Player')->findOneBy([ 'id' => $itemId ]);
    }

    /**
     * @return string
     */
    public function getViewTemplate()
    {
        return '@Maerquin/Players/view.html.twig';
    }
}