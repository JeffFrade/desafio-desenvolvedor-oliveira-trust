<?php

namespace App\Http;

use App\Core\Support\Controller;
use App\Services\PaymentMethodService;
use Illuminate\Http\JsonResponse;

class PaymentMethodController extends Controller
{
    /**
     * @var PaymentMethodService
     */
    private $paymentMethodService;

    /**
     * @param PaymentMethodService $paymentMethodService
     */
    public function __construct(PaymentMethodService $paymentMethodService)
    {
        $this->paymentMethodService = $paymentMethodService;
    }

    /**
     * @return JsonResponse
     */
    public function index()
    {
        return $this->successResponse($this->paymentMethodService->index());

    }
}
