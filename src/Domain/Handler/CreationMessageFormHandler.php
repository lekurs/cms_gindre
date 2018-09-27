<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 24/09/2018
 * Time: 17:58
 */

namespace App\Domain\Handler;


use App\Domain\Factory\Interfaces\MessageFactoryInterface;
use App\Domain\Handler\Interfaces\CreationMessageFormHandlerInterface;
use App\Domain\Models\Shop;
use App\Domain\Repository\Interfaces\MessageRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CreationMessageFormHandler implements CreationMessageFormHandlerInterface
{
    /**
     * @var MessageFactoryInterface
     */
    private $messageFactory;

    /**
     * @var MessageRepositoryInterface
     */
    private $messageRepo;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * CreationMessageFormHandler constructor.
     * @param MessageFactoryInterface $messageFactory
     * @param MessageRepositoryInterface $messageRepo
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(
        MessageFactoryInterface $messageFactory,
        MessageRepositoryInterface $messageRepo,
        SessionInterface $session,
        ValidatorInterface $validator
    ) {
        $this->messageFactory = $messageFactory;
        $this->messageRepo = $messageRepo;
        $this->session = $session;
        $this->validator = $validator;
    }

    /**
     * @param FormInterface $form
     * @param Shop $shop
     * @return bool
     */
    public function handle(FormInterface $form, Shop $shop): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $message = $this->messageFactory->create(
                $form->getData()->message,
                new \DateTime(),
                $form->getData()->contactType,
                $shop
            );

//            $this->validator->validate([]);

            $this->messageRepo->save($message);

            $this->session->getFlashBag("success", "Message Ajouté");

            return true;
        }

        return false;
    }

}