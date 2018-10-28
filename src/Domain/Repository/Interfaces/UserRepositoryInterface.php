<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 23/10/2018
 * Time: 14:29
 */

namespace App\Domain\Repository\Interfaces;


use App\Domain\Models\User;

interface UserRepositoryInterface
{
    /**
     * @param User $user
     */
    public function save(User $user): void;
}
