<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 2019-03-11
 * Time: 13:57
 */

namespace App\Domain\Handler;


use App\Domain\Handler\Interfaces\SendEmailCreationFormHandlerInterface;
use App\Domain\Repository\Interfaces\ContactRepositoryInterface;
use App\Services\Interfaces\MailerHelperInterface;
use App\Services\Interfaces\MoveFileHelperInterface;
use Symfony\Component\Form\FormInterface;

class SendEmailCreationFormHandler implements SendEmailCreationFormHandlerInterface
{
    /**
     * @var ContactRepositoryInterface
     */
    private $contactRepo;

    /**
     * @var MailerHelperInterface
     */
    private $mailerHelper;

    /**
     * @var MoveFileHelperInterface
     */
    private $moveFileHelper;

    /**
     * @var string
     */
    private $dirDocs;

    /**
     * SendEmailCreationFormHandler constructor.
     *
     * @param ContactRepositoryInterface $contactRepo
     * @param MailerHelperInterface $mailerHelper
     * @param MoveFileHelperInterface $moveFileHelper
     * @param string $dirDocs
     */
    public function __construct(
        ContactRepositoryInterface $contactRepo,
        MailerHelperInterface $mailerHelper,
        MoveFileHelperInterface $moveFileHelper,
        string $dirDocs
    ) {
        $this->contactRepo = $contactRepo;
        $this->mailerHelper = $mailerHelper;
        $this->moveFileHelper = $moveFileHelper;
        $this->dirDocs = $dirDocs;
    }


    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            if (empty($form->getData()->to)) {
                $contacts = $this->contactRepo->getAllContactsClients();

                $contactEmail =[];

                foreach ($contacts as $email) {
                    $contactEmail[] = $email->getEmail();
                }

                if (!is_null($form->getData()->file)) {
                    $this->moveFileHelper->move($form->getData()->file);
                    $file = $form->getData()->file;
                    //SI le fichier est sur le serveur alors on envoie le mail

                    //On delete
                    if (file_exists($this->dirDocs . $file->getClientOriginalName())) {
                        $this->mailerHelper->sendEmailAllContacts($form->getData()->title, $contactEmail, $form->getData()->message, $form->getData()->file->getClientOriginalName());
                    }
                    sleep(30);
                    $this->mailerHelper->sendEmailAllContacts($form->getData()->title, $contactEmail, $form->getData()->message, $form->getData()->file->getClientOriginalName());
                }
                $this->mailerHelper->sendEmailAllContacts($form->getData()->title, $contactEmail, $form->getData()->message);
                // /delete
                //On envoie plus l'email mais on créé le tableau qui contient les informations de l'email a envoyer

            } else {
                if (!is_null($form->getData()->file)) {
                    $this->moveFileHelper->move($form->getData()->file);
                    $file = $form->getData()->file;
                    //SI le fichier est sur le serveur alors on envoie le mail

                    //Idem plus haut
                    if (file_exists($this->dirDocs . $file->getClientOriginalName())) {

                        $this->mailerHelper->sendEmailOneContact($form->getData()->title, $form->getData()->to, $form->getData()->message, $form->getData()->file->getClientOriginalName());
                    }
                    sleep(30);
                    $this->mailerHelper->sendEmailOneContact($form->getData()->title, $form->getData()->to, $form->getData()->message, $form->getData()->file->getClientOriginalName());
                }
                $this->mailerHelper->sendEmailOneContact($form->getData()->title, $form->getData()->to, $form->getData()->message);
            }

            return true;
        }

        return false;
    }
}