<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 2019-02-28
 * Time: 22:52
 */

namespace App\Domain\Handler;


use App\Domain\Handler\Interfaces\SearchByContactHandlerInterface;
use App\Domain\Repository\Interfaces\ContactRepositoryInterface;
use App\Domain\Repository\Interfaces\ShopRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class SearchByContactHandler implements SearchByContactHandlerInterface
{
    /**
     * @var ShopRepositoryInterface
     */
    private $shopRepo;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * SearchByContactHandler constructor.
     * @param ContactRepositoryInterface $contactRepo
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(ShopRepositoryInterface $shopRepo, SessionInterface $session, ValidatorInterface $validator)
    {
        $this->shopRepo = $shopRepo;
        $this->session = $session;
        $this->validator = $validator;
    }

    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $shop = $this->shopRepo->searchBy($form->getData()->name, $form->getData()->lastname);

            dd($shop);

            return true;
        }

        return false;
    }
}