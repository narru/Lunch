@extends('layouts.employee')


@section('content')
<div class="container pt-5" id="opt">
    @if(isset($flash_message))
    <div class="alert alert-primary" role="alert">
        {{ $flash_message }}
    </div>
    @endif

    @if(empty($order) && !isset($order) && !empty($menu))
    <div class="container">
        <h1 class="text-center">Menu Of The Day</h1>
    </div>

<!-- formaking order -->
    <form action="{{ route('order.store') }}" method="POST" class="my-2">
        @csrf 
        <div class="row">
            <select name="orders[]" id="orders" multiple="true" class="col-md-11 {{ $errors->has('orders') ? ' is-invalid' : '' }}" placeholder="please select the Item.....">
                @foreach($menu->items as $item)
                <option  value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            <button id="order" class="btn btn-outline-success col-md-1" style="height: 40px;">Order</button>
        </div>
        @if($errors->has('orders'))
        <div class="alert alert-danger">{{ $errors->first('orders') }}</div>
        @endif
    </form>
<!-- end making order -->

    <table class="table table-striped">
        <tr class="bg-info text-white">
            <th>Item</th>
            <th>Category</th>
        </tr>
        @foreach($menu->items as $item)
        <tr>
            <td>{{ $item->name }}</td><td>{{ $item->category->name }}</td>
        </tr>
        @endforeach
    </table>
    @elseif(isset($order) && !empty($order))
    <h1 class="text-center">Your Orders</h1>
    <div class="col-md-12 d-flex justify-content-end m-0 p-0">
        @if($order->status == 0)
        <a href="{{ route('order.edit', $order->id) }}" class="btn btn-info rounded-0">Edit Order</a>
        @elseif($order->status == 1)
        <a class="btn btn-info rounded-0">Order has been packed you can't Edit</a>
        @endif
    </div>

    <table class="table table-striped text-center">
        <tr class="text-white h3 {{ ($order->status == 0)? 'bg-warning':'bg-success' }}">
            <td colspan="2">{{ ($order->status == 0)? 'Your Order is being processed':'Your order is ready!' }}</td>
        </tr>
        <tr>
            <th><h2>Items</h2></th>
        </tr>
        @foreach($order->items as $item)
        <tr>
            <td>{{ $item->name }}</td>
        </tr>
        @endforeach
    </table>
    @else
    <div class="alert alert-danger text-center">There is no menu item to select today. Please contact your chef.</div>
    @endif



</div>



@endsection
@section('scripts')
<script src="{{ asset('js/selectize.js') }}"></script>
<script>
    $("#orders").selectize();


</script>


@endsection
