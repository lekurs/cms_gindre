<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 22/09/2018
 * Time: 14:54
 */

namespace App\Domain\DTO\Interfaces;


interface StatusShopCreationFormDTOInterface
{
    /**
     * StatusShopCreationFormDTOInterface constructor.
     *
     * @param string $status
     */
    public function __construct(string $status);
}