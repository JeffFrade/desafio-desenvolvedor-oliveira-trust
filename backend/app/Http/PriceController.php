<?php

namespace App\Http;

use App\Core\Support\Controller;
use App\Services\PriceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PriceController extends Controller
{
    /**
     * @var PriceService
     */
    private $priceService;

    /**
     * @param PriceService $priceService
     */
    public function __construct(PriceService $priceService)
    {
        $this->priceService = $priceService;
    }

    public function index()
    {
        // TODO: Implement Price Index
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $params = $this->toValidate($request);

        return $this->successResponse($this->priceService->store($params));
    }

     /**
     * @param Request $request
     * @return array
     * @throws ValidationException
     */
    protected function toValidate(Request $request)
    {
        $toValidateArr = [
            'original_value' => 'required|numeric|min:1000|max:100000',
            'id_currency' => 'required|numeric',
            'id_payment_method' => 'required|numeric'
        ];

        return $this->validate($request, $toValidateArr);
    }
}
