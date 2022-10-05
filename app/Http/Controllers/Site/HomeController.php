<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Interfaces\IProductRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $productRepo;

    public function __construct(IProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function index()
    {
        $data['latest_product'] = $this->productRepo->GetLatestProduct();
        $data['special_product'] = $this->productRepo->GetSpecialProduct();
        return view('site.welcome', $data);
    }
}