<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 2019-03-11
 * Time: 11:58
 */

namespace App\Services;


use App\Services\Interfaces\MailerHelperInterface;
use Twig\Environment;

class MailerHelper implements MailerHelperInterface
{
    /**
     * @var string
     */
    private $mailerAdminEmail;

    /**
     * @var \Swift_Mailer
     */
    private $swiftMailer;

    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var string
     */
    private $dirDocs;

    /**
     * MailerHelper constructor.
     * @param string $mailerAdminEmail
     * @param \Swift_Mailer $swiftMailer
     * @param Environment $twig
     * @param string $dirDocs
     */
    public function __construct(
        string $mailerAdminEmail,
        \Swift_Mailer $swiftMailer,
        Environment $twig,
        string $dirDocs
    ) {
        $this->mailerAdminEmail = $mailerAdminEmail;
        $this->swiftMailer = $swiftMailer;
        $this->twig = $twig;
        $this->dirDocs = $dirDocs;
    }


    public function sendEmailAllContacts(string $subject,  $to, string $message, $file = null)
    {
        $mail = (new \Swift_Message());

        if(!is_null($file)) {
            $attachement = \Swift_Attachment::fromPath($this->dirDocs . $file);
        } else {
            $attachement = null;
        }

        $signature = $mail->attach(\Swift_Attachment::fromPath($this->dirDocs . 'signature_patrick_gindre.gif'));

        $mail
            ->setSubject($subject)
            ->setFrom($this->mailerAdminEmail)
            ;
        if (count($to) > 0) {
            foreach ($to as $bbc) {
                $mail->addBcc($bbc);
            }
        } else {
            $mail->setBcc($to);
        }
        if (!is_null($attachement)) {
            $mail->attach($attachement);
        } else {

            $mail->
            setBody(
                $this->twig->render(
                    'Emailing/message.html.twig', [
                    'message' => $message,
                    'signature' => $signature
                ]
                ), 'text/html'
            );
        }

        $this->swiftMailer->send($mail);
    }

    public function sendEmailOneContact(string $subject, $to, string $message, $file = null)
    {
        $mail = (new \Swift_Message());
        $signature = $mail->attach(\Swift_Attachment::fromPath($this->dirDocs . 'signature_patrick_gindre.gif'));

        if(!is_null($file)) {
            $attachement = \Swift_Attachment::fromPath($this->dirDocs . $file);
        } else {
            $attachement = null;
        }

        $mail
            ->setSubject($subject)
            ->setFrom($this->mailerAdminEmail)
            ->setTo($to);
            if (!is_null($attachement)) {
                $mail->attach($attachement);
            } else {
                $mail->
                setBody($this->twig->render('Emailing/message.html.twig', [
                    'message' => $message,
                    'signature' => $signature,
                ]), 'text/html');
            }

        $this->swiftMailer->send($mail);
    }
}
