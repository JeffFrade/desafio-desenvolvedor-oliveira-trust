<?php

namespace App\Services;

use App\Repositories\PriceRepository;
use App\Services\AwesomeApiService;
use App\Services\CurrencyService;
use App\Services\PaymentMethodService;

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
     * @var CurrencyService
     */
    private $currencyService;

    /**
     * @var PaymentMethodService
     */
    private $paymentMethodService;

    /**
     * Summary of __construct
     */
    public function __construct()
    {
        $this->priceRepository = new PriceRepository();
        $this->awesomeApiService = new AwesomeApiService();
        $this->currencyService = new CurrencyService();
        $this->paymentMethodService = new PaymentMethodService();
    }

    public function index()
    {
        // TODO: Implement index method
    }

    public function store(array $data)
    {
        $currency = $this->currencyService->existsCurrency($data['id_currency']);
        $paymentMethod = $this->paymentMethodService->existsPaymentMethod($data['id_payment_method']);

        $percentageConversionRate = $this->percentageConversionRate($data['original_value']);
        $percentagePaymentMethod = $paymentMethod->rate;

        $discounts = $this->calculatePercentage($data['original_value'], $percentageConversionRate);
        $discounts = $this->calculatePercentage($discounts, $percentagePaymentMethod);

        $price = $this->awesomeApiService->getPrice($currency->code);
        $conversion = $discounts * $price->ask;

        $data = [
            'original_value' => $data['original_value'],
            'discounts' => [
                'percentage_conversion_rate' => $percentageConversionRate * 100 . '%',
                'percentage_payment_method' => $percentagePaymentMethod * 100 . '%'
            ],
            'converted_value' => round($conversion, 2),
            'conversion_api_return' => $price,
            'id_currency_base' => 1,
            'id_currency_to' => $currency->id,
            'id_user' => 1,
            'id_payment_method' => $paymentMethod->id
        ];

        return $this->priceRepository->create($data);
    }

    /**
     * @param float $total
     * @return float
     */
    private function percentageConversionRate(float $total)
    {
        $conversionRate = 0.01;

        if ($total < 3000) {
            $conversionRate = 0.02;
        }

        return $conversionRate;
    }

    private function calculatePercentage(float $total, float $percentage)
    {
        return $total - ($total * $percentage);
    }
}
