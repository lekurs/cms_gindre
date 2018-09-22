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
        $this->id = Uuid::uuid4();
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
    public function getRegion(): string
    {
        return $this->region;
    }
}
