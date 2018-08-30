@extends('layouts.chef')

@section('content')
	<div class="container pt-5">
		<div class="row">
			<div class="col-md-12">
				<div class="card amd-profile">
					<div class="card-body">
						<div class="row">
							<div class="col-md-10">
								<h3 class="text text-center"><b>Profile Details</b></h3>
							</div>
							<div class="col-md-2">
								<a href="{{ route('profile.edit',$chef->id) }}" class="btn btn-info pull-right">Edit</a>
							</div>
						</div>
					</div>
				</div>
				<div class="card mt-5">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<!-- <form method="POST" action=""> -->
									<div class="form-group">
									    <label for="id"><b>ID</b></label>
								        <input type="text" value="{{ $chef->id }}" class="form-control" id='id' name="id" readonly>
								    </div>
								    <div class="form-group">
									    <label for="name"><b>Name</b></label>
									      <input type="name" value="{{ $chef->name }}" class="form-control" id="name" name="name" readonly>
								    </div>
								    <div class="form-group">
									    <label for="email"><b>Email</b></label>
									    
									      <input type="email" value="{{ $chef->email }}" class="form-control" id="email" name="email" readonly>
								    </div>
								<!-- </form> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection