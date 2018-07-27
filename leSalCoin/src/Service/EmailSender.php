<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 27/07/2018
 * Time: 10:59
 */

namespace App\Service;


use App\Entity\User;

/**
 * @property \Twig_Environment templating
 */
class EmailSender
{
    private $mailer;
    private $templating;

    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $templating)
    {
        $this->mailer     = $mailer;
        $this->templating = $templating;
    }
    public function sendWelcomeMail(User $user)
    {

            $message = (new \Swift_Message('Welcome Email'))
                ->setFrom('computing.bs@gmail.com')
                ->setTo($user->getEmail())
                ->setBody(
                    $this->templating->render(
                    // templates/emails/registration.html.twig
                        'send_email/index.html.twig',
                        array('user' => $user)
                    ),
                    'text/html'
                );


        $this->mailer->send($message);
    }
}