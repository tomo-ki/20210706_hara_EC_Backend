<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use App\Models\Order;
use App\Models\Product;

class HistoryController extends Controller
{
    public function index()
    {
        $histories = History::all();
        foreach ($histories as $history) {
            $order =  Order::where('uuid', $history->order_uuid)->first();
            $product = Product::where('id', $history->product_id)->first();
            $history->user_id = $order->user_id;
            $history->name = $product->name;
            $history->image_path = $product->image_path;
            $history->price = $product->price;
        }
        return response()->json([
            'data' => $histories
        ], 200);
    }
    public function store(Request $request)
    {
        $history = History::create($request->all());
        return response()->json([
            'data' => $history
        ], 201);
    }
}
