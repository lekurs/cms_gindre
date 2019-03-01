<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 2019-02-28
 * Time: 22:38
 */

namespace App\Domain\DTO;


use App\Domain\DTO\Interfaces\SearchByContactDTOInterface;

class SearchByContactDTO implements SearchByContactDTOInterface
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $lastname;

    /**
     * @var string
     */
    public $email;

    /**
     * SearchByContactDTO constructor.
     * @param string $name
     * @param string $lastname
     * @param string $email
     */
    public function __construct(
        string $name,
        string $lastname = null
    ) {
        $this->name = $name;
        $this->lastname = $lastname;
    }
}
