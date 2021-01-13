<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 22/09/2018
 * Time: 15:08
 */

namespace App\UI\Action\Back;


use App\Domain\Form\StatusShopCreationForm;
use App\Domain\Handler\Interfaces\CreationStatusShopHandlerInterface;
use App\UI\Action\Interfaces\StatusShopCreationActionInterface;
use App\UI\Responder\Interfaces\StatutShopCreationResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StatusShopCreationAction implements StatusShopCreationActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var CreationStatusShopHandlerInterface
     */
    private $creationStatusShopHandler;

    /**
     * StatusShopCreationAction constructor.
     *
     * @param FormFactoryInterface $formFactory
     * @param CreationStatusShopHandlerInterface $creationStatusShopHandler
     */
    public function __construct(FormFactoryInterface $formFactory, CreationStatusShopHandlerInterface $creationStatusShopHandler)
    {
        $this->formFactory = $formFactory;
        $this->creationStatusShopHandler = $creationStatusShopHandler;
    }

    /**
     * @Route(name="creationStatusShop", path="admin/shop/status/add")
     *
     * @IsGranted("ROLE_ADMIN")
     *
     * @param Request $request
     * @param StatutShopCreationResponderInterface $responder
     * @return Response
     */
    public function show(Request $request, StatutShopCreationResponderInterface $responder): Response
    {
        $form = $this->formFactory->create(StatusShopCreationForm::class)->handleRequest($request);

        if ($this->creationStatusShopHandler->handle($form)) {
            return $responder->response(true, null);
        }

        return $responder->response(false, $form);
    }
}
