<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    protected $products;

    public function __constructor(Product $products)
    {
        $this->products = $products;
    }

    public function index(Request $request)
    {
        // $products = $this->products->getProducts(
        //     $request->search ?? ''
        // );

        return view('products.index');        
    }
}
