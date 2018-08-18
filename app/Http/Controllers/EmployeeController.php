<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Order;
use App\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $menu = Menu::whereDate('created_at', date('Y-m-d'))->with(['items' => function($item){
            $item->orderBy('category_id', 'desc');
        }])->first();
        $order = Order::whereDate('created_at', date('Y-m-d'))->where('user_id', auth()->user()->id)->first();
        return view('employee.index', compact('menu', 'order'));
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
        public function create()
        {
            return view('admin.employee.create');
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
            $employee = new User();
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->password = bcrypt($request->password);
            $employee->save();
            $employee->attachRole('employee');


            return back()->with('flash_message', 'Employee added!');
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
            return back()->with('flash_message', 'User deleted!');
        }
    }
