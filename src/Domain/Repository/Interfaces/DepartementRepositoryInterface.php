<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 16/10/2018
 * Time: 14:49
 */

namespace App\Domain\Repository\Interfaces;


use App\Domain\Models\Departement;

interface DepartementRepositoryInterface
{
    /**
     * @param $zip
     * @return Departement
     */
    public function getOne($zip): Departement;

    /**
     * @return array
     */
    public function getAllWithShop(): array;
}
