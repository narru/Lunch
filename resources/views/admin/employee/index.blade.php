@extends('layouts.admin')

@section('content')
<div class="container pt-5">
    <a href="{{ route('admin.employees.create') }}" class="btn btn-outline-info add-button">Add Employee</a>
    <div class="container">
        <h1 class="text-center">Employee Table</h1>
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
        @foreach($employees as $employee)
        <tr>
            <td>{{ $employee->id }}</td>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->email }}</td>
            <td>
                <form id="submitForm-{{ $employee->id }}" method="post" action="{{ url('admin/employee/destroy/'.$employee->id) }}" >
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
