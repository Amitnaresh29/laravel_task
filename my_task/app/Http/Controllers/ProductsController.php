<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::query();

        if ($request->has('category')) {
            $products->where('category', $request->category);
        }

        if ($request->has('brand')) {
            $products->where('brand', $request->brand);
        }

        if ($request->has('price_min')) {
            $products->where('price', '>=', $request->price_min);
        }

        if ($request->has('price_max')) {
            $products->where('price', '<=', $request->price_max);
        }

        return $products->get();
    }
}
