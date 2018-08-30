@extends('layouts.employee')

@section('content')
<div class="container">
	<div class="card amd-profile mt-5">
		<div class="card-body">
			<div class="row">
				<div class="col-md-12">
					<h3 class="text text-center"><b>Profile Edit</b></h3>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card mt-5">
				<div class="card-body">
				    <form method="post" action="{{ route('empprofile.update', $employee->id) }}">
				    	@csrf
				        {{ method_field('put') }}
				    	<div class="form-group">
					    	<label for="name"><b>Name</b></label>
					      	<input type="name" value="{{ $employee->name }}" class="form-control" id="name" name="name">
				    	</div>
				    <div class="form-group">
					    <label for="email"><b>Email</b></label>
					      <input type="email" value="{{ $employee->email }}" class="form-control" id="email" name="email">
				    </div>
				    <div class="row">
				    	<div class="col-md-6 offset-md-3">
				    		<button type="submit" class="btn btn-block btn-outline-success">Update Profile</button>
				    	</div>
				    </div>
				    </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

