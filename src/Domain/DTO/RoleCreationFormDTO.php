<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 12:24
 */

namespace App\Domain\DTO;


use App\Domain\DTO\Interfaces\RoleCreationFormDTOInterface;

class RoleCreationFormDTO implements RoleCreationFormDTOInterface
{
    /**
     * @var string
     */
    public $role;

    /**
     * RoleCreationFormDTO constructor.
     *
     * @param string $role
     */
    public function __construct(string $role)
    {
        $this->role = $role;
    }
}
