<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 28/10/2018
 * Time: 10:35
 */

namespace App\Domain\Handler;


use App\Domain\Handler\Interfaces\ShopEditFormHandlerInterface;
use App\Domain\Models\Shop;
use App\Domain\Repository\Interfaces\DepartementRepositoryInterface;
use App\Domain\Repository\Interfaces\ShopRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ShopEditFormHandler implements ShopEditFormHandlerInterface
{
    /**
     * @var ShopRepositoryInterface
     */
    private $shopRepo;

    /**
     * @var DepartementRepositoryInterface
     */
    private $departementRepo;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * ShopEditFormHandler constructor.
     *
     * @param ShopRepositoryInterface $shopRepo
     * @param DepartementRepositoryInterface $departementRepo
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(
        ShopRepositoryInterface $shopRepo,
        DepartementRepositoryInterface $departementRepo,
        SessionInterface $session,
        ValidatorInterface $validator
    ) {
        $this->shopRepo = $shopRepo;
        $this->departementRepo = $departementRepo;
        $this->session = $session;
        $this->validator = $validator;
    }

    /**
     * @param FormInterface $form
     * @param Shop $shop
     * @return bool
     */
    public function handle(FormInterface $form, Shop $shop): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $shop->editShop($form->getData());

            $this->shopRepo->edit();

            $this->session->getFlashBag()->add('success', 'Magasin mis à jour');

            return true;
        }

        return false;
    }
}
