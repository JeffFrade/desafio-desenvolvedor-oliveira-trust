<?php

namespace App\Services;

use App\Exceptions\PaymentMethodNotFoundException;
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

    /**
     * @param int $id
     * @throws PaymentMethodNotFoundException
     * @return mixed
     */
    public function existsPaymentMethod(int $id): mixed
    {
        $paymentMethod = $this->paymentMethodRepository->findFirst('id', $id);

        if (empty($paymentMethod)) {
            throw new PaymentMethodNotFoundException('Método de pagamento inexistente');
        }

        return $paymentMethod;
    }
}
