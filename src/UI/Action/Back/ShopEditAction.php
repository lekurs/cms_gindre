<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 28/10/2018
 * Time: 10:59
 */

namespace App\UI\Action\Back;


use App\Domain\DTO\ShopEditFormDTO;
use App\Domain\Form\ShopEditForm;
use App\Domain\Handler\Interfaces\ShopEditFormHandlerInterface;
use App\Domain\Repository\Interfaces\ShopRepositoryInterface;
use App\UI\Action\Interfaces\ShopEditActionInterface;
use App\UI\Responder\Interfaces\ShopEditResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ShopEditAction implements ShopEditActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var ShopRepositoryInterface
     */
    private $shopRepo;

    /**
     * @var ShopEditFormHandlerInterface
     */
    private $shopEditFormHandler;

    /**
     * ShopEditAction constructor.
     *
     * @param FormFactoryInterface $formFactory
     * @param ShopRepositoryInterface $shopRepo
     * @param ShopEditFormHandlerInterface $shopEditFormHandler
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        ShopRepositoryInterface $shopRepo,
        ShopEditFormHandlerInterface $shopEditFormHandler
    ) {
        $this->formFactory = $formFactory;
        $this->shopRepo = $shopRepo;
        $this->shopEditFormHandler = $shopEditFormHandler;
    }

    /**
     * @Route(name="editShop", path="admin/shop/edit/{slug}")
     *
     * @IsGranted("ROLE_ADMIN")
     *
     * @param Request $request
     * @param ShopEditResponderInterface $responder
     * @return Response
     */
    public function edit(Request $request, ShopEditResponderInterface $responder): Response
    {
        $shop = $this->shopRepo->getOne($request->attributes->get('slug'));

        $shopEdit = new ShopEditFormDTO(
            $shop->getName(),
            $shop->getAddress(),
            $shop->getZip(),
            $shop->getCity(),
            $shop->getNumber(),
            $shop->isProspect(),
            $shop->getStatus(),
            $shop->getSlug()
        );

        $form = $this->formFactory->create(ShopEditForm::class, $shopEdit)->handleRequest($request);

        if ($this->shopEditFormHandler->handle($form, $shop)) {

            return $responder->response(true, null, $shop);
        }

        return $responder->response(false, $form, $shop);
    }
}
