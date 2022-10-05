<?php

namespace App\Interfaces;

use App\Http\Requests\ProductRequest;

interface IProductRepository extends IBaseRepository
{
    public function CreateProduct($request);

    public function GetLatestProduct();

    public function GetSpecialProduct();

    public function GetRandomProduct();
}