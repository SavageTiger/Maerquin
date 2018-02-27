<?php

namespace MaerquinBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpFoundation\Response;

class ExceptionListener
{
    /**
     * @var string
     */
    protected $enviroment;

    public function __construct($environment)
    {
        $this->enviroment = $environment;
    }

    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        if ($this->enviroment !== 'dev' && $this->enviroment !== 'test') {
            $exception = $event->getException();

            $event->setResponse(
                new Response('Unexpected exception: ' . $exception->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR)
            );
        }
    }
}