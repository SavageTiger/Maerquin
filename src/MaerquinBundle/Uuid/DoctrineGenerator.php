<?php

namespace MaerquinBundle\Uuid;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Id\AbstractIdGenerator;

class DoctrineGenerator extends AbstractIdGenerator
{
    public function generate(EntityManager $em, $entity)
    {
        $generator = new Generator();

        return $generator->generateToken();
    }
}