<?php

namespace App\Http\Controllers;

use App\Item;
use App\Menu;
use Carbon\Carbon;
use Illuminate\Http\Request;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::whereDate('created_at', date('Y-m-d'))->with('items')->first();
        return view('chef.menu.index')->withMenu($menu);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = Menu::whereDate('created_at', date('Y-m-d'))->first();
        if(!empty($menu)){
            return back()->with('message', 'You have already Created todays menu');
        }
        $items = Item::all();
        return view('chef.menu.create', compact('items'));
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
            'items' => 'required'
        ]);

        $menu = Menu::whereDate('created_at', '=', date('Y-m-d'))->first();
        if(!empty($menu)){
            return redirect()->route('menu.index');
        }
        $menu = new Menu();
        $menu->save();
        $menu->items()->sync($request->items);

        return redirect()->route('menu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $menu_items = $menu->items->keyBy('id');
        $items = Item::all();
        return view('chef.menu.edit', compact('menu', 'items', 'menu_items'));
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
            'items' => 'required'
        ]);

        $menu = Menu::whereDate('created_at', '=', date('Y-m-d'))->first();
        $menu->items()->sync($request->items);
        $menu->save();

        return redirect()->route('menu.index');
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
