<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 11:19
 */

namespace App\Domain\Repository\Interfaces;


use App\Domain\Models\Region;

interface RegionRepositoryInterface
{
    /**
     * @param $zip
     * @return Region
     */
    public function getOne($zip): Region;

    /**
     * @return array
     */
    public function getAll(): array;
}
