<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 2019-03-12
 * Time: 10:07
 */

namespace App\Services;


use App\Services\Interfaces\MoveFileHelperInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class MoveFileHelper implements MoveFileHelperInterface
{
    /**
     * @var Filesystem
     */
    private $fileSystem;

    /**
     * @var string
     */
    private $dirDocs;

    /**
     * MoveFileHelper constructor.
     * @param Filesystem $fileSystem
     * @param string $dirDocs
     */
    public function __construct(Filesystem $fileSystem, string $dirDocs)
    {
        $this->fileSystem = $fileSystem;
        $this->dirDocs = $dirDocs;
    }

    public function move(UploadedFile $file): void
    {
//        if ($this->fileSystem->exists($this->dirDocs)) {
//            $this->fileSystem->mkdir($this->dirDocs, 0777);
//        }

        $file->move($this->dirDocs, $file->getClientOriginalName());
    }
}