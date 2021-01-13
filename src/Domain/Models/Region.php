<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 20/09/2018
 * Time: 09:51
 */

namespace App\Domain\Models;

use Ramsey\Uuid\Uuid;

class Region
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $region;

    /**
     * @var \ArrayAccess
     */
    private $shops;

    /**
     * @var \ArrayAccess
     */
    private $departements;

    /**
     * Region constructor.
     *
     * @param string $region
     * @throws \Exception
     */
    public function __construct(string $region)
    {
        $this->region = $region;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * @return \ArrayAccess
     */
    public function getShops(): \ArrayAccess
    {
        return $this->shops;
    }

    /**
     * @return \ArrayAccess
     */
    public function getDepartements(): \ArrayAccess
    {
        return $this->departements;
    }
}
