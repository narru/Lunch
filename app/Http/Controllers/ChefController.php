<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $orders = Order::whereDate('created_at', date('Y-m-d'))->where('status', 0)->paginate(15);
        return view('chef.index', compact('orders'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.chef.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|min:3|max:256',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|confirmed',
        ]);
        $chef = new User();
        $chef->name = $request->name;
        $chef->email = $request->email;
        $chef->password = bcrypt($request->password);
        $chef->save();
        $chef->attachRole('chef');


        return redirect()->route('admin.chefs.index')->with('flash_message', 'Chef added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $user = User::findOrFail($id);
        $user->update($requestData);

        return redirect('admin/users')->with('flash_message', 'User updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect('admin/chef')->with('flash_message', 'Chef deleted!');
    }
}
