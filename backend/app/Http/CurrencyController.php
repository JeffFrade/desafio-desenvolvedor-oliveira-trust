<?php

namespace App\Http;

use App\Core\Support\Controller;
use App\Services\CurrencyService;
use Illuminate\Http\JsonResponse;

class CurrencyController extends Controller
{
    /**
     * @var CurrencyService
     */
    private $currencyService;

    /**
     * @param CurrencyService $currencyService
     */
    public function __construct(CurrencyService $currencyService)
    {
        $this->currencyService = $currencyService;
    }

    /**
     * @return JsonResponse
     */
    public function index()
    {
        return $this->successResponse($this->currencyService->index());
    }
}
