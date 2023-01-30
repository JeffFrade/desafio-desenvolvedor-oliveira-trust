<?php

namespace App\Services;
use App\Exceptions\CurrencyNotFoundException;
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

    /**
     * @param int $id
     * @throws CurrencyNotFoundException
     * @return mixed
     */
    public function existsCurrency(int $id): mixed
    {
        $currency = $this->currencyRepository->findFirst('id', $id);

        if (empty($currency)) {
            throw new CurrencyNotFoundException('Moeda inválida');
        }

        return $currency;
    }
}
