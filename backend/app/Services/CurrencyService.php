<?php

namespace App\Services;
use App\Repositories\CurrencyRepository;

class CurrencyService
{
    /**
     * @var CurrencyRepository
     */
    private $currencyRepository;

    public function __construct()
    {
        $this->currencyRepository = new CurrencyRepository();
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $this->currencyRepository->index();
    }
}
