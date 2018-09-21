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
     * @var Uuid
     */
    private $id;

    /**
     * @var string
     */
    private $dept;

    /**
     * @var string
     */
    private $region;

    /**
     * @var integer
     */
    private $zip;

    /**
     * @var \ArrayAccess
     */
    private $shops;

    /**
     * Region constructor.
     *
     * @param string $dept
     * @param string $region
     * @param int $zip
     * @throws \Exception
     */
    public function __construct(string $dept, string $region, int $zip)
    {
        $this->id = Uuid::uuid4();
        $this->dept = $dept;
        $this->region = $region;
        $this->zip = $zip;
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
    public function getDept(): string
    {
        return $this->dept;
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * @return int
     */
    public function getZip(): int
    {
        return $this->zip;
    }
}
