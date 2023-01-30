<?php

namespace App\Repositories;

use App\Core\Support\AbstractRepository;
use App\Repositories\Collections\Price;

class PriceRepository extends AbstractRepository
{
    /**
     * Summary of __construct
     */
    public function __construct()
    {
        $this->model = new Price();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function index(int $id): mixed
    {
        return $this->model->where('id_user', $id)->get();
    }
}
