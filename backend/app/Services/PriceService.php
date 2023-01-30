<?php

namespace App\Services;

use App\Repositories\PriceRepository;
use App\Services\AwesomeApiService;

class PriceService
{
    /**
     * @var PriceRepository
     */
    private $priceRepository;

    /**
     * @var AwesomeApiService
     */
    private $awesomeApiService;

    /**
     * Summary of __construct
     */
    public function __construct()
    {
        $this->priceRepository = new PriceRepository();
        $this->awesomeApiService = new AwesomeApiService();
    }

    public function index()
    {
        // TODO: Implement index method
    }

    public function store(array $data)
    {
        return $data;
    }
}
