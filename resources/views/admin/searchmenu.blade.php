@extends('layouts.admin')

@section('content')
	<div class="container pt-5">
		<div class="row">
			<h1 class="text">Check Previous day's Menu</h1>
        <input class="form-control" id="myInput" type="text" placeholder="Search Menu Items..">
        <br><br>
        <table class="table table-striped table-bordered mt-5">
        <thead>
          <tr>
            <th class="text-center">Item</th>
            <!-- <th class="text-center">Category</th> -->
            <th class="text-center">Date (M-D-Y)</th>
          </tr>
        </thead>
        <tbody id="myTable">
        	@foreach($menu as $men)
            <tr>
                <td class="text-center">
                @foreach($men->items as $item)
                    {{ $item->name }},
                @endforeach
                </td>
                <td class="text-center">
                {{ $men->created_at->toFormattedDateString() }}
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
		</div>
	</div>
@endsection



@section('scripts')
    <script>
        $(document).ready(function(){
		  $("#myInput").on("keyup", function() {
		    var value = $(this).val().toLowerCase();
		    $("#myTable tr").filter(function() {
		      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		    });
		  });
			});
    </script>
@endsection

