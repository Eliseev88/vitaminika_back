<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SortController extends Controller
{
    public function fetch_data(Request $request)
    {
        if($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');

            $data = Product::query()->orderBy($sort_by, $sort_type)->paginate(10);

            return view('vendor.pagination.data-products', [
                'products' => $data,
            ])->render();
        }
    }
}
