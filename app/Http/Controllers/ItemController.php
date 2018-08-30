<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::paginate(15);
        return view('chef.item.index')->withItems($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('chef.item.create')->withCategories($categories);
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
            'name' => 'required|unique:items',
            'category' => 'required',
        ]);

        $item  = new Item();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->category_id = $request->category;
        $item->save();
           
        $notification = array('message'=>'Item added Successfully!', 'alert-type'=>'success');

        return redirect()->route('item.show', $item->id)->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::findOrFail($id);
        return view('chef.item.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $categories = Category::all();
        return view('chef.item.edit',compact('item', 'categories'));
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
            'name' => 'required',
            'category' => 'required',
        ]);

        $item  = Item::findOrFail($id);
        $item->name = $request->name;
        if($item->description){
            $item->description = $request->description;
        }
        $item->category_id = $request->category;
        $item->save();

        $notification = array('message'=>'Item updated Successfully!', 'alert-type'=>'info');
        return redirect()->route('item.show', $item->id)->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        $notification = array('message'=>'Opps Item Deleted!', 'alert-type'=>'error');
        return redirect()->route("item.index")->with($notification);
    }
}
