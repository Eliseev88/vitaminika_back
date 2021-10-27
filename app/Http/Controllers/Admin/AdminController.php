<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $reviewsCount = Review::all()->count();
        $completedOrders = Order::query()->where('status', 2)->count();
        $inProgressOrders = Order::query()->where('status', 1)->count();
        $newOrders = Order::query()->where('status', 0)->count();

        $lastOrders = Order::latest()->take(10)->get();

        return view('admin/index', [
            'reviewsCount' => $reviewsCount,
            'completedOrders' => $completedOrders,
            'inProgressOrders' => $inProgressOrders,
            'newOrders' => $newOrders,
            'lastOrders' => $lastOrders,
        ]);
    }
}
