@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="col-md-12 mt-5">
        <div class="card">
            <div class="card-header">Create New Employee</div>
            <div class="card-body">
                <a href="{{ url('/admin/employee/') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <br />
                <br />
                <form method="POST" action="{{ url('/admin/employee/store') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @include ('admin.employee.form', ['formMode' => 'create'])

                </form>

            </div>
        </div>
    </div>
</div>
</div>
@endsection
