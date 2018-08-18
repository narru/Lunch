@extends('layouts.chef')

@section('content')
<div class="container pt-5">
    <div class="container">
        <h1 class="text-center">Orders Table</h1>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Items</th>
                <th>Employee</th>
                <th>Action</th>
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
                <td>
                    <form action="{{ route('order.complete', $order->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-outline-success">Complete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    @if(isset($flash_message))
    <div class="alert alert-primary" role="alert">
        {{ $flash_message }}
    </div>
    @endif

</div>

@endsection
