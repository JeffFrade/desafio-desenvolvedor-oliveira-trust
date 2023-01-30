<?php

namespace App\Repositories;

use App\Core\Support\AbstractRepository;
use App\Repositories\Models\PaymentMethod;

class PaymentMethodRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->model = new PaymentMethod();
    }
}
