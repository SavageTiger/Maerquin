<?php

namespace MaerquinBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends \FOS\UserBundle\Controller\SecurityController
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        return parent::loginAction($request);
    }

    protected function renderLogin(array $data)
    {
        return $this->render('@Maerquin/Security/login.html.twig', $data);
    }

}
