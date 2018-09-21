<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 11:13
 */

namespace App\Domain\DTO;


use App\Domain\DTO\Interfaces\ContactTypeFormDTOInterface;

class CreationContactTypeFormDTO implements ContactTypeFormDTOInterface
{
    /**
     * @var string
     */
    public $type;

    /**
     * CreationContactTypeFormDTO constructor.
     * @param string $type
     */
    public function __construct(string $type)
    {
        $this->type = $type;
    }
}
