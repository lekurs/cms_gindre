<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 2019-03-12
 * Time: 10:14
 */

namespace App\UI\Action\Emailing;


use App\Services\Interfaces\MoveFileHelperInterface;
use App\UI\Action\Interfaces\UploadFileToSendActionInterface;
use App\UI\Responder\Emailing\UploadFileToSendResponder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UploadFileToSendAction implements UploadFileToSendActionInterface
{
    /**
     * @var MoveFileHelperInterface
     */
    private $moveFileHelper;

    /**
     * @var string
     */
    private $dirDocs;

    /**
     * UploadFileToSendAction constructor.
     * @param MoveFileHelperInterface $moveFileHelper
     */
    public function __construct(MoveFileHelperInterface $moveFileHelper, string $dirDocs)
    {
        $this->moveFileHelper = $moveFileHelper;
        $this->dirDocs = $dirDocs;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @Route(name="testajax", path="/admin/emailing/upload")
     *
     */
    public function show(UploadFileToSendResponder $responder)
    {
        $h = getallheaders();
        $source = file_get_contents('php://input');
        file_put_contents($this->dirDocs . $h['x-file-name'], $source);

        return $responder->response();
    }
}