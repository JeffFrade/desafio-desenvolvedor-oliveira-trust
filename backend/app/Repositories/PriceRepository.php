<?php

namespace App\Repositories;

use App\Core\Support\AbstractRepository;
use App\Repositories\Collections\Price;

class PriceRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->model = new Price();
    }
}
