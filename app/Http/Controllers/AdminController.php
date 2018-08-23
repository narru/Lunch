<?php

namespace App\Http\Controllers;

use App\Role;
use App\Order;
use App\Menu;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Employees
    public function getEmployees()
    {
        $role = Role::where('name', 'employee')->with('users')->first();
        $employees = $role->users;
        return view('admin.employee.index', compact('employees'));
    }

        //Chefs
    public function getChefs()
    {
        $role = Role::where('name', 'chef')->with('users')->first();
        $chefs = $role->users;
        return view('admin.chef.index', compact('chefs'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(5);
        $menu = Menu::with('items')->get();
        return view('admin.index', compact('orders','menu'));
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = User::findOrFail($id);
        return view('admin.show',compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit', compact('user'));
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
            'name' => 'required|min:3|max:256',
            'email' => 'required|email|unique:users' 
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        $notification = array('message'=>'Profile Updated Successfully!', 'alert-type'=>'success');

        return back()->with($notification);
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
