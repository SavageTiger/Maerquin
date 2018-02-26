<?php

namespace MaerquinBundle\Controller;

use MaerquinBundle\Model\UserInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class SecurityController extends \FOS\UserBundle\Controller\SecurityController
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        return parent::loginAction($request);
    }

    /**
     * @Route("/reset", name="reset")
     */
    public function forgotLoginAction(Request $request)
    {
        $error   = '';
        $success = false;

        if ($request->getMethod() === 'POST') {
            $mailer         = $this->get('mailer');
            $tokenGenerator = $this->get('maerquin_token_generator');
            $manager        = $this->get('fos_user.user_manager');

            $user = $manager->findUserByEmail($request->get('_email'));

            if ($user === null) {
                $error = 'NO_USER';
            } else {
                $user->setConfirmationToken($tokenGenerator->generateToken());

                $mailer->send($this->getForgotMessage($user));
            }
        }

        return $this->render('@Maerquin/Security/reset.html.twig', [
            'error'   => $error,
            'success' => $success
        ]);
    }

    /**
     * @param UserInterface $user
     *
     * @return \Swift_Message
     * @throws \Twig\Error\Error
     */
    protected function getForgotMessage(UserInterface $user)
    {
        $body = $this->get('templating')->render('@Maerquin/Security/reset_email.html.twig', [
            'user' => $user,
            'url' => $this->get('router')->generate(
                'reset', [], UrlGeneratorInterface::ABSOLUTE_URL
            ),
        ]);

        $message = new \Swift_Message();
        $message->setTo($user->getEmailCanonical());
        $message->setSubject('_RESET_PASSWORD');
        $message->setFrom('plotteam@maerquin.nl');
        $message->setBody($body, 'text/html');

        return $message;
    }

    protected function renderLogin(array $data)
    {
        return $this->render('@Maerquin/Security/login.html.twig', $data);
    }
}
