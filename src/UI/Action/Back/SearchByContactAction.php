<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 2019-02-28
 * Time: 23:22
 */

namespace App\UI\Action\Back;


use App\Domain\Form\SearchByContactForm;
use App\Domain\Handler\Interfaces\SearchByContactHandlerInterface;
use App\UI\Action\Interfaces\SearchByContactActionInterface;
use App\UI\Responder\Interfaces\SearchByContactResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class SearchByContactAction
 * @package App\UI\Action\Back
 * @Route(name="searchBy", path="admin/search")
 */
class SearchByContactAction implements SearchByContactActionInterface
{
    /**
     * @var SearchByContactHandlerInterface
     */
    private $searchByContactHandler;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * SearchByContactAction constructor.
     * @param SearchByContactHandlerInterface $searchByContactHandler
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(SearchByContactHandlerInterface $searchByContactHandler, FormFactoryInterface $formFactory)
    {
        $this->searchByContactHandler = $searchByContactHandler;
        $this->formFactory = $formFactory;
    }

    /**
     * @param Request $request
     * @param SearchByContactResponderInterface $responder
     * @return Response
     * @Security("is_granted('ROLE_ADMIN')")
     */
    public function __invoke(Request $request, SearchByContactResponderInterface $responder): Response
    {
        $form = $this->formFactory->create(SearchByContactForm::class)->handleRequest($request);

        if ($this->searchByContactHandler->handle($form)) {

            return $responder->response(true, null, $shop);
        }

        return $responder->response(false, $form);
    }
}