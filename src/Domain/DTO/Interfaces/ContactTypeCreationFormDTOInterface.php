<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 11:13
 */

namespace App\Domain\DTO\Interfaces;


interface ContactTypeCreationFormDTOInterface
{
    /**
     * ContactTypeCreationFormDTOInterface constructor.
     *
     * @param string $type
     */
    public function __construct(string $type);
}
