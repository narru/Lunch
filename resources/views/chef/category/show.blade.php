@extends('layouts.chef')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Category</div>
                <div class="card-body">

                    <a href="{{ route('category.index') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ route('category.edit', $category->id)}}" title="Edit User"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                    <form method="POST" action="{{ route('category.destroy', $category->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete User" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                    <br/>
                    <br/>

                    <div>
                        <table class="table table-striped text-center">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $category->id }}</td>
                                </tr>
                                <tr><th> Name </th><td> {{ $category->name }} </td></tr>
                                <tr><th> Description </th><td> {{ $category->description }} </td></tr>
                                <tr><th colspan="2" class="text-white h3 bg-info">Items</th></tr>
                                @foreach($category->items as $item)
                                <tr><td colspan="2">{{ $item->name }}</td></tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
