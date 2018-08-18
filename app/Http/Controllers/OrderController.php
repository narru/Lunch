<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $this->validate($request, [
            'orders' => 'required'
        ]);

        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->save();

        $order->items()->sync($request->orders);

        return redirect()->route('employee.index')->withOrder($order);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function complete($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 1;
        $order->save();

        $orders = Order::whereDate('created_at', date('Y-m-d'))->where('status', 0)->paginate(15);
        return view('chef.index', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $menu = Menu::whereDate('created_at', date('Y-m-d'))->with(['items' => function($item){
            $item->orderBy('category_id', 'desc');
        }])->first();
        return view('employee.editOrder', compact('order', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'orders' => 'required'
        ]);
        $order = Order::findOrFail($id);
        $order->items()->sync($request->orders);

        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
