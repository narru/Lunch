<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Order;
use App\User;
use App\Chef;
use Notification;
use App\Notifications\OrderCompleted;
use App\Notifications\OrderFullyCompleted;
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

        $user = new Order();
        $user->user_id = auth()->user()->id;
        $user->save();

        $user->items()->sync($request->orders);

        // Now this is for sending the notification
        // $orderitem = Order::all();

        // Notification::send($orderitem, new MakeOrder($order));
        Notification::route('mail', 'masternullisbackagain@gmail.com')->notify(new OrderCompleted($user));
        // $user = User::find();
        // User::find()->notify(new MakeOrder);

        $notification = array('message'=>'Order Made Successfully Edited!', 'alert-type'=>'info');   

        return redirect()->route('employee.index')->withOrder($user)->with($notification);
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

        Notification::route('mail', 'masternullisbackagain@gmail.com')->notify(new OrderFullyCompleted($order));
        $notification = array('message'=>'Order Completed Successfully!', 'alert-type'=>'success');


        return view('chef.index', compact('orders'))->with($notification);
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
