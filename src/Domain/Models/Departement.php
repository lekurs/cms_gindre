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
     * @var Uuid
     */
    private $id;

    /**
     * @var string
     */
    private $departement;

    /**
     * @var Region
     */
    private $region;

    /**
     * Departement constructor.
     *
     * @param string $departement
     * @param Region $region
     * @throws \Exception
     */
    public function __construct(string $departement, Region $region)
    {
        $this->id = Uuid::uuid4();
        $this->departement = $departement;
        $this->region = $region;
    }

    /**
     * @return Uuid
     */
    public function getId(): Uuid
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
}