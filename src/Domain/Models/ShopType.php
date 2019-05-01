<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 29/10/2018
 * Time: 16:16
 */

namespace App\Domain\Models;


use Ramsey\Uuid\Uuid;

class ShopType
{
    /**
     * @var Uuid
     */
    private $id;

    /**
     * @var string
     */
    private $shopType;

<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> dev(shopType): add mapping & factory
=======
<<<<<<< HEAD
=======

>>>>>>> shopType
=======
>>>>>>> be8c29691595077cfdb595f061ffd2bedc0802c1
>>>>>>> e6858e0693be3c654611e26af382b13dbf7d9b09
    /**
     * ShopType constructor.
     *
     * @param string $shopType
     * @throws \Exception
     */
    public function __construct(string $shopType)
    {
        $this->id = Uuid::uuid4();
        $this->shopType = $shopType;
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
    public function getShopType(): string
    {
        return $this->shopType;
    }
}
