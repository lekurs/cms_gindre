<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 22/09/2018
 * Time: 11:35
 */

namespace App\Domain\Models;


use Ramsey\Uuid\Uuid;

class Departement
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $zip;

    /**
     * @var string
     */
    private $departement;

    /**
     * @var Region
     */
    private $region;

    /**
     * @var \ArrayAccess
     */
    private $shops;

    /**
     * Departement constructor.
     *
     * @param string $zip
     * @param string $departement
     * @param Region $region
     * @throws \Exception
     */
    public function __construct(string $zip, string $departement, Region $region)
    {
        $this->zip = $zip;
        $this->departement = $departement;
        $this->region = $region;
    }


    /**
     * @return Uuid
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDepartement(): string
    {
        return $this->departement;
    }

    /**
     * @return Region
     */
    public function getRegion(): Region
    {
        return $this->region;
    }

    /**
     * @return string
     */
    public function getZip(): string
    {
        return $this->zip;
    }

    /**
     * @return \ArrayAccess
     */
    public function getShops(): \ArrayAccess
    {
        return $this->shops;
    }
}
