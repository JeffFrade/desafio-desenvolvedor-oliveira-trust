<?php

namespace App\Repositories;

use App\Core\Support\AbstractRepository;
use App\Repositories\Models\Currency;

class CurrencyRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->model = new Currency();
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $this->model->where('show', 1)->get();
    }
}
