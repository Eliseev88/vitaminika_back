<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function MongoDB\BSON\toJSON;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('updated_at')->paginate(10);

        return view('admin/orders', [
            'orders' => $orders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function show(Order $order)
    {
        $arr = [];
        foreach ($order->products as $product){
            $arr[] = $product->id;
        }

        $products = Product::all()->except($arr);

        return view('admin/orderDetails', [
            'order' => $order,
            'products' => $products,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(Request $request, Order $order)
    {
        $fields = $request->only('address', 'comment', 'delivery', 'status',);
        $fields['updated_at'] = Carbon::now();
        $order = $order->fill($fields)->save();

        if ($order) {
            return redirect()->route('admin.orders')
                ->with('success', 'Заказ успешно обновлен');
        }

        return back();
    }

    public function updateProduct(Request $request)
    {
        $order = Order::find($request->orderId);

        if ($order) {
            $order->products()->updateExistingPivot($request->productId, [
                'count' => $request->productCount
            ]);

            $order->sum = 0;

            foreach($order->products as $el) {
                $order->sum += $el->price * $order->products()->where('product_id', $el->id)->first()->pivot->count;
            }

            $order->save();

            return $order->sum;
        }

        return false;
    }

    public function addProduct(Request $request)
    {
        $order = Order::find($request->orderId);
        $product = Product::find($request->productId);

        if ($order && $product) {

            $order->sum = 0;
            $productAlreadyExist = false;

            foreach($order->products as $el) {
                if ($el->id == $product->id) {
                    $productAlreadyExist = true;
                }
            }

            if ($productAlreadyExist) {
                $order->products()->updateExistingPivot($product->id, [
                    'count' => $request->productCount,
                ]);
            } else $order->products()->attach($product->id, ['count' => $request->productCount]);

            $order->save();

            $order = Order::find($request->orderId);
            if ($order) {
                foreach($order->products as $el) {
                    $order->sum += $el->price * $order->products()->where('product_id', $el->id)->first()->pivot->count;
                }

                $order->save();

                return [
                    'product' => $product,
                    'count' => $order->products()->where('product_id', $request->productId)->first()->pivot->count,
                    'sum' => $order->sum,
                    'quantity' => $order->products()->count(),
                ];
            }
            return false;
        }
        return false;
    }

    public function searchOrder(Request $request) 
    {
      $input = $request->all();

      $data = Order::where("id", "LIKE", "%{$input['query']}%")
               ->get();

               

      return ($data);
    }

    public function destroy(Request $request)
    {
        $order = Order::find($request->orderId);
        $product = Product::find($request->productId);
        $order->sum = $order->sum - $product->price
            * $order->products()->where('product_id', $request->productId)->first()->pivot->count;
        $order->products()->detach($request->productId);
        $order->save();

        return $order->sum;

    }
}
