<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 2019-03-11
 * Time: 12:57
 */

namespace App\UI\Action\Emailing;


use App\Domain\Form\SendEmailFormCreation;
use App\Domain\Handler\Interfaces\SendEmailCreationFormHandlerInterface;
use App\UI\Action\Interfaces\SendEmailActionInterface;
use App\UI\Responder\Interfaces\SendEmailResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class SendEmailAction
 * @package App\UI\Action\Emailing
 *
 * @Route(name="SendEmail", path="/admin/emailing")
 *
 */
class SendEmailAction implements SendEmailActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var SendEmailCreationFormHandlerInterface
     */
    private $sendEmailHandler;

    /**
     * SendEmailAction constructor.
     * @param FormFactoryInterface $formFactory
     * @param SendEmailCreationFormHandlerInterface $sendEmailHandler
     */
    public function __construct(FormFactoryInterface $formFactory, SendEmailCreationFormHandlerInterface $sendEmailHandler)
    {
        $this->formFactory = $formFactory;
        $this->sendEmailHandler = $sendEmailHandler;
    }


    public function __invoke(Request $request, SendEmailResponderInterface $responder): Response
    {
        $form = $this->formFactory->create(SendEmailFormCreation::class)->handleRequest($request);

        if ($this->sendEmailHandler->handle($form)) {

            return $responder->response(true, null);
        }

        return $responder->response(false, $form);
    }
}