<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 23/10/2018
 * Time: 15:26
 */

namespace App\UI\Action\Interfaces;


use App\Domain\Handler\Interfaces\RegisterFormHandlerInterface;
use App\UI\Responder\Interfaces\RegistrationResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface RegistrationActionInterface
{
    /**
     * RegistrationActionInterface constructor.
     *
     * @param FormFactoryInterface $formFactory
     * @param RegisterFormHandlerInterface $registrationFormHandler
     */
    public function __construct(FormFactoryInterface $formFactory, RegisterFormHandlerInterface $registrationFormHandler);

    /**
     * @param Request $request
     * @param RegistrationResponderInterface $responder
     * @return Response
     */
    public function register(Request $request, RegistrationResponderInterface $responder): Response;
}
