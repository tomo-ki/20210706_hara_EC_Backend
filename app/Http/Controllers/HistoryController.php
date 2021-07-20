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
            $order =  Order::where('id', $history->order_id)->first();
            $history->user_id = $order->user_id;
        }
        return response()->json([
            'data' => $histories
        ], 200);
    }
    public function show($userId)
    {
        $histories = History::all();
        foreach ($histories as $history) {
            $order =  Order::where('id', $history->order_id)->first();
            $product = Product::where('id', $history->product_id)->first();
            $history->user_id = $order->user_id;
            $history->uuid = $order->uuid;
            $history->name = $product->name;
            $history->created_at = $product->created_at;
            $history->image_path = $product->image_path;
            $history->price = $product->price;
        }
        $histories = $histories->where('user_id', $userId);
        return response()->json([
            'data' => $histories
        ], 200);
    }
}
