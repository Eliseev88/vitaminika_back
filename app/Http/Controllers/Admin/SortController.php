<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class SortController extends Controller
{
    public function fetch_data(Request $request)
    {
        if($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $table = $request->get('table');

            if ($table == 'products') {
                $data = Product::query()->orderBy($sort_by, $sort_type)->paginate(10);
                return view('vendor.pagination.data-products', [
                    'products' => $data,
                ])->render();
            } else if ($table == 'orders') {
                $data = Order::query()->orderBy($sort_by, $sort_type)->paginate(10);
                return view('vendor.pagination.data-orders', [
                    'orders' => $data,
                ])->render();
            }

        }
    }
}
