<?php

namespace MaerquinBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AppController extends Controller
{
    /**
     * @Route("/", name="app")
     */
    public function indexAction()
    {
        return $this->render('@Maerquin/App/app.html.twig');
    }
}
