@extends('layouts.chef')

@section('content')
<div class="container">
    <div class="col-md-12 mt-5">
        <div class="card">
            <div class="card-header">Edit Category</div>
            <div class="card-body">
                <a href="{{ route("category.index") }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Main Menu</button></a>
                <br />
                <br />
                <form method="POST" action="{{ route('category.update', $category->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    @include ('chef.category.form', ['formMode' => 'edit'])

                </form>

            </div>
        </div>
    </div>
</div>
</div>
@endsection
