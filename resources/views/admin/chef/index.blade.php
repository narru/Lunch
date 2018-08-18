@extends('layouts.admin')

@section('content')
<div class="container pt-5">
    <a href="{{ route('admin.chefs.create') }}" class="btn btn-outline-info add-button">Add Chef</a>
    <div class="container">
        <h1 class="text-center">Chefs Table</h1>
    </div>
    @if(isset($flash_message))
    <div class="alert alert-primary" role="alert">
        {{ $flash_message }}
    </div>
    @endif
    <table class="table text-center table-striped">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        @foreach($chefs as $chef)
        <tr>
            <td>{{ $chef->id }}</td>
            <td>{{ $chef->name }}</td>
            <td>{{ $chef->email }}</td>
            <td>
                <form id="submitForm-{{ $chef->id }}" method="post" action="{{ url('admin/chef/destroy/'.$chef->id) }}" >
                    @csrf
                    {{ method_field('DELETE') }}
                    <button  class="btn btn-outline-danger btn-sm">Delete</button>
                </form>
            </td>

        </tr>
        @endforeach
    </table>
</div>

@endsection
