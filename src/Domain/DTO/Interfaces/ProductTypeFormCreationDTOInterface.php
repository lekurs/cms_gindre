<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 11:49
 */

namespace App\Domain\DTO\Interfaces;


interface ProductTypeFormCreationDTOInterface
{
    /**
     * ProductTypeFormCreationDTOInterface constructor.
     *
     * @param string $type
     */
    public function __construct(string $type);
}
