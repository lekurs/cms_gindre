<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 16:18
 */

namespace App\UI\Action\Back;


use App\Domain\Form\TestRegionForm;
use App\Domain\Repository\Interfaces\RegionRepositoryInterface;
use App\UI\Responder\Back\TestRegionResponder;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestRegionAction
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var RegionRepositoryInterface
     */
    private $regionRepo;

    /**
     * TestRegionAction constructor.
     * @param FormFactoryInterface $formFactory
     * @param RegionRepositoryInterface $regionRepo
     */
    public function __construct(FormFactoryInterface $formFactory, RegionRepositoryInterface $regionRepo)
    {
        $this->formFactory = $formFactory;
        $this->regionRepo = $regionRepo;
    }

    /**
     * @Route(name="testRegion", path="test/region")
     * @param Request $request
     * @param TestRegionResponder $responder
     * @return Response
     */
    public function show(Request $request, TestRegionResponder $responder): Response
    {
        $form = $this->formFactory->create(TestRegionForm::class);

        return $responder->response($form);

    }
}
