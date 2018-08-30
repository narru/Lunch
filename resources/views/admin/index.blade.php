@extends('layouts.admin')

@section('content')
<div class="container pt-5">
    <div class="row">
        <h1>Current Orders</h1>
        <table class="table table-striped text-center">
            <tr>
                <th>ID</th>
                <th>Ordered Items</th>
                <th>Employee</th>
            </tr>
             @foreach($orders as $order)
            <tr> 
                <td>{{ $order->id }}</td>
                <td>
                    @foreach($order->items as $item)
                    {{ $item->name }},
                    @endforeach
                </td>
                <td>{{ $order->user->name }}</td>
                
            </tr>

            @endforeach
        </table>
        <div class="row">
            <div class="col-md-12 ">
                {{ $orders->links() }}
            </div>
        </div>
    </div>

    <div class="row pt-5">
    <h1 class="text">Todays Menu</h1>
        <table class="table table-striped text-center">
            <tr>
                <th>Item</th>
                <th>Category</th>
                <th>Date</th>
            </tr>
             @foreach($menu as $m)
             @foreach($m->items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>
                    {{ $item->category->name }}
                </td>
                <td>{{ $item->created_at }}</td>
            </tr>
            @endforeach
            @endforeach
        </table>
    </div>

           




</div>
@endsection


