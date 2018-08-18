@extends('layouts.chef')

@section('content')
<div class="container">
    <div class="col-md-12 mt-5">
        <div class="card">
            <div class="card-header">Create New Item</div>
            @if($categories->count() <= 0)
            <div class="alert alert-danger">Please make some category before creating an item</div>
            @endif
            <div class="card-body">
                <a href="{{ route("item.index") }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <br />
                <br />
                <form method="POST" action="{{ route('item.store') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @include ('chef.item.form', ['formMode' => 'create'])

                </form>

            </div>
        </div>
    </div>
</div>
</div>
@endsection
