<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 23/10/2018
 * Time: 15:02
 */

namespace App\UI\Action\Security;


use App\Domain\Form\LoginForm;
use App\UI\Action\Interfaces\AdministratorActionInterface;
use App\UI\Responder\Interfaces\AdministratorResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdministratorAction implements AdministratorActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * AdministratorAction constructor.
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(FormFactoryInterface $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    /**
     * @Route(name="administrator", path="/")
     * @param Request $request
     * @param AdministratorResponderInterface $responder
     * @return Response
     */
    public function login(Request $request, AdministratorResponderInterface $responder): Response
    {
        $form = $this->formFactory->create(LoginForm::class)->handleRequest($request);

        return $responder->response($form);
    }
}
