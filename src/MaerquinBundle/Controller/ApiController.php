<?php

namespace MaerquinBundle\Controller;

use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiController extends Controller
{
    /**
     * @Route("/api", name="api_base_url")
     */
    public function apiAction()
    {
        return new JsonResponse();
    }

    /**
     * @Route("/api/{modelName}/list", name="api_list")
     */
    public function listAction($modelName)
    {
        $manager = $this->get('maerquin.' . $modelName . '.manager');

        $serializer = SerializerBuilder::create()->build();
        $context    = SerializationContext::create()->setGroups(array('list'));

        return new JsonResponse(
            json_decode($serializer->serialize($manager->getAll(), 'json', $context))
        );
    }
}
