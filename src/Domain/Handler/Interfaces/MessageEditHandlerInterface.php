<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 18/10/2018
 * Time: 20:33
 */

namespace App\Domain\Handler\Interfaces;


use App\Domain\Models\Message;
use App\Domain\Repository\Interfaces\MessageRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

interface MessageEditHandlerInterface
{
    /**
     * MessageEditHandlerInterface constructor.
     *
     * @param MessageRepositoryInterface $messageRepo
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(
        MessageRepositoryInterface $messageRepo,
        SessionInterface $session,
        ValidatorInterface $validator
    );

    /**
     * @param FormInterface $form
     * @param Message $message
     * @return bool
     */
    public function handle(FormInterface $form, Message $message): bool;
}
