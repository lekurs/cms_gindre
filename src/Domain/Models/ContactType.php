<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 20/09/2018
 * Time: 09:37
 */

namespace App\Domain\Models;
use Ramsey\Uuid\Uuid;

/**
 * Class ContactType
 * @package App\Domain\Models
 */
class ContactType
{
    /**
     * @var Uuid
     */
    private $id;

    /**
     * @var string
     */
    private $type;

    /**
     * @var
     */
    private $messages;

    /**
     * ContactType constructor.
     *
     * @param string $type
     * @throws \Exception
     */
    public function __construct(string $type)
    {
        $this->id = Uuid::uuid4();
        $this->type = $type;
    }

    /**
     * @return Uuid
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}
