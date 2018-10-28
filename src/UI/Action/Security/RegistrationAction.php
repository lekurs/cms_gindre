<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 23/10/2018
 * Time: 15:26
 */

namespace App\UI\Action\Security;


use App\Domain\Form\RegistrationForm;
use App\Domain\Handler\Interfaces\RegisterFormHandlerInterface;
use App\UI\Action\Interfaces\RegistrationActionInterface;
use App\UI\Responder\Interfaces\RegistrationResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationAction implements RegistrationActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var RegisterFormHandlerInterface
     */
    private $registrationFormHandler;

    /**
     * RegistrationAction constructor.
     *
     * @param FormFactoryInterface $formFactory
     * @param RegisterFormHandlerInterface $registrationFormHandler
     */
    public function __construct(FormFactoryInterface $formFactory, RegisterFormHandlerInterface $registrationFormHandler)
    {
        $this->formFactory = $formFactory;
        $this->registrationFormHandler = $registrationFormHandler;
    }

    /**
     * @Route(name="registration", path="admin/registration")
     *
     * @Security("is_granted('ROLE_ADMIN')")
     *
     * @param Request $request
     * @param RegistrationResponderInterface $responder
     * @return Response
     */
    public function register(Request $request, RegistrationResponderInterface $responder): Response
    {
        $form = $this->formFactory->create(RegistrationForm::class)->handleRequest($request);

        if ($this->registrationFormHandler->handle($form)) {

            return $responder->response(true, null);
        }

        return $responder->response(false, $form);
    }
}
