<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 12:24
 */

namespace App\Domain\DTO\Interfaces;


interface CreationRoleFormDTOInterface
{
    /**
     * CreationRoleFormDTOInterface constructor.
     *
     * @param string $role
     */
    public function __construct(string $role);
}
