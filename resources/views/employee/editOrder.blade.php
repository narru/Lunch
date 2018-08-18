@extends('layouts.employee')


@section('content')
<div class="container pt-5">
    @if(isset($flash_message))
    <div class="alert alert-primary" role="alert">
        {{ $flash_message }}
    </div>
    @endif

    <div class="container">
        <h1 class="text-center">Menu Of The Day</h1>
    </div>
    <form action="{{ route('order.update', $order->id) }}" method="POST" class="my-2">
        @csrf
        {{ method_field('put') }}
        <div class="row">
            <select name="orders[]" id="orders" multiple="multiple" class="col-md-11 {{ $errors->has('orders') ? ' is-invalid' : '' }}" placeholder="Select item here....">
                @foreach($menu->items as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            <button class="btn btn-outline-success col-md-1" style="height: 40px;">Order</button>
        </div>
        @if($errors->has('orders'))
        <div class="alert alert-danger">{{ $errors->first('orders') }}</div>
        @endif
    </form>
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
</div>

@endsection
@section('scripts')
<script>
    var $select = $("#orders").selectize();
    var selectize = $select[0].selectize;
    var selectedOptions = [
    @foreach($order->items as $item)
    {{ $item->id }},
    @endforeach
    ];
    selectize.setValue(selectedOptions);

</script>
@endsection
