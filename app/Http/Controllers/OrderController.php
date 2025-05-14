<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\CreateOrderRequest;
use App\Http\Requests\Order\UpdateOrderRequest;
use App\Models\Order;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Symfony\Component\HttpFoundation\Response;
use App\Providers\AuthServiceProvider;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class OrderController extends Controller
{
    use AuthorizesRequests, DispatchesJobs;
    public function index(){
        $orders = Order::with('histories')->get();
        if($orders->isEmpty()){
            return response()->json(['message'=>'No orders found'],response::HTTP_NOT_FOUND);
        }
        return response()->json($orders);

    }

    public function store(CreateOrderRequest $request){
        $this->authorize('store', Order::class);
        $order = $request->validated();
        Order::create($order);
        return response()->json(['message'=>'Order created'],response::HTTP_CREATED);
    }

    public function update(UpdateOrderRequest $request, $id){
        $order = Order::where('id', $id)->first();
        $this->authorize('update', $order);
        if(!$order){
            return response()->json(['message'=>'No order found'],response::HTTP_NOT_FOUND);
        }
        $order->update($request->validated());
        return response()->json(['message'=>'Order updated'],response::HTTP_OK);
    }

    public function destroy($id){
        $order = Order::where('id', $id)->first();
        if(!$order){
            return response()->json(['message'=>'No order found'],response::HTTP_NOT_FOUND);
        }
        $order->delete();
        return response()->json(['message'=>'Order deleted'],response::HTTP_OK);
    }
}
