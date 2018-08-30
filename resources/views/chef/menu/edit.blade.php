@extends('layouts.chef')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/selectize.css') }}">
@endsection
@section('content')
<div class="container">
    <div class="col-md-12 mt-5">
        <div class="card">
            <div class="card-header">Edit Menu For Today</div>
            <div class="card-body">
                <a href="{{ route("menu.index") }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <br />
                <br />
                <form method="POST" action="{{ route('menu.update', $menu->id) }}" accept-charset="UTF-8" class="form-horizontal">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <h1 class="text-center">Edit Items</h1>
                    <select name="items[]" id="items" required="required" multiple="true">
                        @foreach($items as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-success">Edit Menu</button>
                </form>

            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/selectize.js') }}"></script>
<script>
    var $select = $("#items").selectize();
    var selectize = $select[0].selectize;
    var selectedOptions = {!! $menu_items->pluck('id') !!};
    selectize.setValue(selectedOptions);

</script>
@endsection
 