<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Events\OrderNotification;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $orders=Order::orderBy('id','DESC')->with(['user','products'])->paginate(10);
        return view('orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function acceptOrders($id){
        try{
        DB::beginTransaction();    
        $order= Order::findOrFail($id);
        $order->update([
         'status'=>2
        ]);
        // update product quantity after order is accepted
        foreach($order->products as $product){
            $updated_quantity= $product->quantity - $product->pivot->quantity;
            $product->update([
             'quantity'=>$updated_quantity
            ]);
         } 
         
         DB::commit();
        $data=[
        'admin'=>auth()->user()->name,
        'user_id'=>$order->user_id,
        'status'=>$order->status
        ];
        event(new OrderNotification($data));
        return response()->json([
        'data'=>$order,
        'status'=>1,
        'message'=>'order is accepted successfully'
        ]);
    }catch (\Exception $e) {
    DB::rollBack();
    return response()->json([
        'status'=>0,
        'message'=>$e->getMessage()
        ]);        
    }
     }

     public function rejectOrders($id){
        
        $order= Order::findOrFail($id);
        $order->update([
         'status'=>0
        ]);

        $data=[
            'admin'=>auth()->user()->name,
            'user_id'=>$order->user_id,
            'status'=>$order->status
            ];
            event(new OrderNotification($data));    

       return response()->json([
       'data'=>$order,
       'status'=>1,
       'message'=>'order is rejected successfully'
       ]);
    //  flash(' Order is rejected')->success();
    //  return redirect()->back();
 
     }
    /**
     * Store a newly created resource in storage.
     */
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
