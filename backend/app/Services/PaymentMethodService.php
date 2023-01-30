<?php

namespace App\Services;

use App\Repositories\PaymentMethodRepository;

class PaymentMethodService
{
    /**
     * @var
     */
    private $paymentMethodRepository;

    public function __construct()
    {
        $this->paymentMethodRepository = new PaymentMethodRepository();
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $this->paymentMethodRepository->allNoTrashed();
    }
}
