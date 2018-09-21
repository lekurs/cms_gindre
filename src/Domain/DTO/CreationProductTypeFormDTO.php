<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 11:48
 */

namespace App\Domain\DTO;


use App\Domain\DTO\Interfaces\CreationProductTypeFormDTOInterface;

class CreationProductTypeFormDTO implements CreationProductTypeFormDTOInterface
{
    /**
     * @var string
     */
    public $type;

    /**
     * CreationProductTypeFormDTO constructor.
     *
     * @param string $type
     */
    public function __construct(string $type)
    {
        $this->type = $type;
    }
}
