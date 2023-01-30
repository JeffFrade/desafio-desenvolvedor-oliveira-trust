<?php

namespace App\Http;

use App\Core\Support\Controller;
use App\Services\PriceService;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    private $priceService;

    public function __construct(PriceService $priceService)
    {
        $this->priceService = $priceService;
    }

    public function getPrice(Request $request)
    {

    }
}
