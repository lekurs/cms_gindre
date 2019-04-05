<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 11:48
 */

namespace App\Domain\DTO;


use App\Domain\DTO\Interfaces\ProductTypeFormCreationDTOInterface;

class ProductTypeFormCreationDTO implements ProductTypeFormCreationDTOInterface
{
    /**
     * @var string
     */
    public $type;

    /**
     * ProductTypeFormCreationDTO constructor.
     *
     * @param string $type
     */
    public function __construct(string $type)
    {
        $this->type = $type;
    }
}
