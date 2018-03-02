<?php

namespace MaerquinBundle\Controller;

use MaerquinBundle\Model\UserInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use FOS\UserBundle\Controller\SecurityController as BaseSecurityController;

class SecurityController extends BaseSecurityController
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        return parent::loginAction($request);
    }

    /**
     * @Route("/reset_password/{token}", name="reset_token")
     *
     * @throws \Exception
     */
    public function resetPasswordAction(Request $request, $token)
    {
        $manager = $this->get('fos_user.user_manager');
        $user    = $manager->findUserByConfirmationToken($token);
        $error   = '';
        $success = false;

        if ($user === null) {
            throw new \Exception('Invalid token');
        }

        // Reset token is valid for 24 hours
        if ($user->isPasswordRequestNonExpired(86400) === false) {
            throw new \Exception('Password reset token has expired');
        }

        if ($request->getMethod() === 'POST') {
            if ($request->get('_password_primary') === $request->get('_password_secondary')) {
                $user->setPlainPassword($request->get('_password_primary'));
                $user->setConfirmationToken(null);

                $manager->updateUser($user);

                $success = true;
            } else {
                $error = 'PASSWORD_MISMATCH';
            }
        }

        return $this->render('@Maerquin/Security/reset_password.html.twig', [
            'error'   => $error,
            'success' => $success
        ]);
    }

    /**
     * @Route("/reset", name="reset")
     */
    public function forgotLoginAction(Request $request)
    {
        $user    = null;
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
                $user->setPasswordRequestedAt(new \DateTime());

                $manager->updateUser($user);

                $mailer->send($this->getForgotMessage($user));

                $success = true;
            }
        }

        return $this->render('@Maerquin/Security/reset.html.twig', [
            'user'    => $user,
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
                'reset_token', ['token' => $user->getConfirmationToken()], UrlGeneratorInterface::ABSOLUTE_URL
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
