<?php

namespace App\Http;

use App\Core\Support\Controller;
use App\Exceptions\CurrencyNotFoundException;
use App\Exceptions\PaymentMethodNotFoundException;
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

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function index(int $id)
    {
        // TODO: Implement user verification
        return $this->successResponse($this->priceService->index($id));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $params = $this->toValidate($request);
            $message = 'Cotação cadastrada com sucesso!';

            return $this->successResponse($this->priceService->store($params), $message);
        } catch (CurrencyNotFoundException | PaymentMethodNotFoundException $e) {
            return $this->errorResponse($e, 404);
        }
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
