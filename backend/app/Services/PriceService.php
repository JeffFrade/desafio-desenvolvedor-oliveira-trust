<?php

namespace App\Services;

use App\Mail\NewPrice;
use App\Repositories\PriceRepository;
use App\Services\AwesomeApiService;
use App\Services\CurrencyService;
use App\Services\PaymentMethodService;
use Illuminate\Support\Facades\Mail;

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

    /**
     * @param int $id
     * @return mixed
     */
    public function index(int $id)
    {
        return $this->priceRepository->index($id);
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
        $priceConversion = $price->ask;
        $conversion = $discounts * $priceConversion;

        $data = [
            'original_value' => $data['original_value'],
            'discounts' => [
                'percentage_conversion_rate' => $percentageConversionRate * 100 . '%',
                'percentage_payment_method' => $percentagePaymentMethod * 100 . '%'
            ],
            'converted_value' => round($conversion, 2),
            'conversion_api_return' => $price,
            'conversion_price' => substr($priceConversion, 0, 4),
            'id_currency_base' => 1,
            'id_currency_to' => $currency->id,
            'id_user' => 1,
            'id_payment_method' => $paymentMethod->id,
            'email' => $data['email']
        ];

        $this->priceRepository->create($data);

        $data['payment_method'] = $this->paymentMethodService->existsPaymentMethod($data['id_payment_method']);
        $data['currency'] = $this->currencyService->existsCurrency($data['id_currency_to']);

        Mail::to($data['email'])->send(new NewPrice($data));

        return $data;
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
