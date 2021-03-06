<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 11:59
 */

namespace App\UI\Action\Back;


use App\Domain\Form\ProductTypeCreationForm;
use App\Domain\Handler\Interfaces\CreationContactTypeFormHandlerInterface;
use App\Domain\Handler\Interfaces\CreationProductTypeFormHandlerInterface;
use App\UI\Action\Interfaces\ProductTypeCreationActionInterface;
use App\UI\Responder\Interfaces\ProductTypeCreationResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductTypeCreationAction implements ProductTypeCreationActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var CreationProductTypeFormHandlerInterface
     */
    private $creationProductTypeFormHandler;

    /**
     * ProductTypeCreationAction constructor.
     *
     * @param FormFactoryInterface $formFactory
     * @param CreationProductTypeFormHandlerInterface $creationProductTypeFormHandler
     */
    public function __construct(FormFactoryInterface $formFactory, CreationProductTypeFormHandlerInterface $creationProductTypeFormHandler)
    {
        $this->formFactory = $formFactory;
        $this->creationProductTypeFormHandler = $creationProductTypeFormHandler;
    }

    /**
     * @Route(name="creationProductType", path="admin/product/type/add")
     *
     * @IsGranted("ROLE_ADMIN")
     *
     * @param Request $request
     * @param ProductTypeCreationResponderInterface $responder
     * @return Response
     */
    public function show(Request $request, ProductTypeCreationResponderInterface $responder): Response
    {
        $form = $this->formFactory->create(ProductTypeCreationForm::class)->handleRequest($request);

        if ($this->creationProductTypeFormHandler->handle($form)) {

            return $responder->response(true, null);
        }

        return $responder->response(false, $form);
    }
}
