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

                $this->moveFileHelper->move($form->getData()->file);

                $this->mailerHelper->sendEmailAllContacts($form->getData()->title, $contactEmail, $form->getData()->message, $form->getData()->file->getClientOriginalName());

            } else {
                $this->mailerHelper->sendEmailOneContact($form->getData()->title, $form->to, $form->getData()->message, $form->getData()->file->getClientOriginalName());
            }

            return true;
        }

        return false;
    }
}