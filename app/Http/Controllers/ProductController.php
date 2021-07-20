<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return response()->json([
            'data' => $products
        ], 200);
    }
    public function show($productId){
        $product = Product::where('id', $productId)->first();
        return response()->json([
            'data' => $product
        ], 200);
    }
}
