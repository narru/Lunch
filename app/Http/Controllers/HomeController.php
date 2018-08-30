<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Order;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->hasRole('admin')){
            return redirect()->route('admin.index');
        }
        elseif(auth()->user()->hasRole('chef')){
            return redirect()->route('chef.index');
        }
        return redirect()->route('employee.index');
    }

    // This is for SSE 
    public function test()
    {
        header('Cache-Control: no-cache');
        header("Content-Type: text/event-stream\n\n");
        // $data = Order::whereDate('created_at', date('Y-m-d'))->where('status', 0)->get()->toArray();
        $data = DB::select(DB::raw('Select o.id as order_id,o.user_id,u.name as user_name,i.name as item_name FROM `ORDERS` as o LEFT JOIN `users` as u ON u.id = o.user_id
            LEFT JOIN `orders_items` as oi ON oi.order_id = o.id LEFT JOIN `items` as i ON i.id = oi.item_id WHERE o.status = 0 '));
        echo "retry: 20000\n";
        echo "event: testevent\n";
        echo "data: " . json_encode($data) . "\n\n"; 
        flush();
        sleep(1); die; 
    }
    // end

    public function getData()
    {
        $order = DB::select(DB::raw('Select o.id as order_id,o.user_id,u.name as user_name,i.name as item_name FROM `ORDERS` as o LEFT JOIN `users` as u ON u.id = o.user_id
            LEFT JOIN `orders_items` as oi ON oi.order_id = o.id LEFT JOIN `items` as i ON i.id = oi.item_id WHERE o.status = 0 '));
        $test = self::objectToArray($order);
        $tmp = [];
        foreach($test as $arg)
        {
            $tmp[$arg['user_name']][] = $arg['order_id'] = $arg['item_name'];
        }
        $output = array();

        foreach($tmp as $type => $labels)
        {
            $output[] = array(
                'user_name' => $type,
                // 'order_id' => $labels,
                'item_name' => $labels
            );
        }
        $i= 0;
        // dd($output);
        return $output;
        }

    public function objectToArray($d) {
        if (is_object($d)) {
            // Gets the properties of the given object
            // with get_object_vars function
            $d = get_object_vars($d);
        }
        if (is_array($d)) {
            /*
            * Return array converted to object
            * Using __FUNCTION__ (Magic constant)
            * for recursive call
            */
            return array_map(array($this, 'objectToArray'), $d);
        //$this->d = get_object_vars($d);
        }
        else {
            // Return array
            return $d;
        }
    }
    public function getData1(Request $request)
    {
        $orders = Order::whereDate('created_at', date('Y-m-d'))->where('status', 0)->get();
        return $orders; 
    }
}
