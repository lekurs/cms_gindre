<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 27/10/2018
 * Time: 18:25
 */

namespace App\UI\Action\Interfaces;


use App\Domain\Handler\Interfaces\EditContactFormHandlerInterface;
use App\Domain\Repository\Interfaces\ContactRepositoryInterface;
use App\UI\Responder\Interfaces\EditContactResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface ContactEditActionInterface
{
    /**
     * ContactEditActionInterface constructor.
     *
     * @param FormFactoryInterface $formFactory
     * @param ContactRepositoryInterface $contactRepo
     * @param EditContactFormHandlerInterface $contactEditHandlerForm
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        ContactRepositoryInterface $contactRepo,
        EditContactFormHandlerInterface $contactEditHandlerForm
    );

    /**
     * @param Request $request
     * @param EditContactResponderInterface $responder
     * @return Response
     */
    public function editContact(Request $request, EditContactResponderInterface $responder): Response;
}
