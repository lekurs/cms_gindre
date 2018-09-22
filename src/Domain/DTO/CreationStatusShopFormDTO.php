<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 22/09/2018
 * Time: 14:54
 */

namespace App\Domain\DTO;


use App\Domain\DTO\Interfaces\CreationStatusShopFormDTOInterface;

class CreationStatusShopFormDTO implements CreationStatusShopFormDTOInterface
{
    /**
     * @var string
     */
    public $status;

    /**
     * CreationStatusShopFormDTO constructor.
     *
     * @param string $status
     */
    public function __construct(string $status)
    {
        $this->status = $status;
    }
}
