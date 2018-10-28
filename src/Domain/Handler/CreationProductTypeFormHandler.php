<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 11:53
 */

namespace App\Domain\Handler;


use App\Domain\Factory\Interfaces\ProductTypeFactoryInterface;
use App\Domain\Handler\Interfaces\CreationProductTypeFormHandlerInterface;
use App\Domain\Repository\Interfaces\ProductTypeRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CreationProductTypeFormHandler implements CreationProductTypeFormHandlerInterface
{
    /**
     * @var ProductTypeFactoryInterface
     */
    private $productTypeFactory;

    /**
     * @var ProductTypeRepositoryInterface
     */
    private $productTypeRepo;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * CreationProductTypeFormHandler constructor.
     *
     * @param ProductTypeFactoryInterface $productTypeFactory
     * @param ProductTypeRepositoryInterface $productTypeRepo
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(
        ProductTypeFactoryInterface $productTypeFactory,
        ProductTypeRepositoryInterface $productTypeRepo,
        SessionInterface $session,
        ValidatorInterface $validator
    ) {
        $this->productTypeFactory = $productTypeFactory;
        $this->productTypeRepo = $productTypeRepo;
        $this->session = $session;
        $this->validator = $validator;
    }

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form): bool
    {
        if($form->isSubmitted() && $form->isValid()) {
            $productType = $this->productTypeFactory->create($form->getData()->type);

            $this->productTypeRepo->save($productType);

//            $this->validator->validate([]);

            $this->session->getFlashBag()->add("success", "Le produit à été ajouté");

            return true;
        }

        return false;
    }
}
