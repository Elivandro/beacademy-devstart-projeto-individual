<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $products;

    public function __constructor(Product $products)
    {
        $this->products = $products;
    }

    public function index(Request $request)
    {
        $products = $this->products->getProducts(
            $request->search ?? ''
        );

        return view('products.index');        
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $data   = $request->all();
        dd($data);
        $this->products->create($data);


        return redirect()->route("products.index")->with('create', "produto cadastrado com sucesso!");    }
}
