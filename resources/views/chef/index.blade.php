@extends('layouts.chef')

@section('content')

<div class="container pt-5" id="content" style="">
    <div class="container">
	    <h1 class="text-center">Orders Table</h1>
	    <div class="demo"  id="demo">
			<table class="table table-striped" id="mytable" >
			    <thead>
			    	<tr>
				        <th>ID</th>
				        <th>Employee</th>
				        <th>Items</th> 
				        <th>Action</th>
				    </tr>
			    </thead>
			  	<tbody class="order-list-container">
			  		{{ csrf_field() }}
			  		<?php $number = 1; ?>
			  		@foreach($orders as $order)
				    <tr>
				        <td>{{ $number++ }}</td>
				        <td>
				            @foreach($order->items as $item)
				            {{ $item->name }},
				            @endforeach
				        </td>
				        <td>{{ $order->user->name }}</td>
				        <td>
				            <form action="{{ route('order.complete', $order->id) }}" method="POST">
				                @csrf
				                <button class="btn btn-outline-success">Complete</button>
				            </form>
				        </td>			    
				    </tr>
				    @endforeach
			  	</tbody>

			</table>
		</div>
	
    </div>
    @if(isset($flash_message))
    <div class="alert alert-primary" role="alert">
        {{ $flash_message }}
    </div>
    @endif

</div>

@endsection

@section('scripts')
<!-- this script is for sse -->
<script type="text/javascript">
	var orders = '<?php $output;?>';	
	var content = '<table class="table table-striped">';
				$.each( orders, function( key, value ) {
	content +=	'<tr><td>'+ i+'</td><td>';
					
	content +='</td><td>'+orders.item_name+'</td><td><form action="" method="POST">';
	content +='<meta name="_token" content="{!! csrf_token() !!}" />';
	// content +='<td>'+data.output.user_name+'</td></td></br></tr>';
	content +='<button class="btn btn-outline-success">Complete</button></form></td></br></tr>';
				});

	content +='<table>';


    if (typeof(EventSource) !== 'undefined') {
    	var url = "{{ route('test') }}";
    	var testEvent = new EventSource(url); 

		testEvent.addEventListener("testevent", function(event) {
			
			var data = $.parseJSON(event.data); 
			if (data != null) {
				// var id = 'order_id';
				// var u = "{{ route('order-comp', ':id') }}" + '/'+ id;

				// var urli = "{{ route('order.complete', ':id') }}";
				// urli = urli.replace(':id', o.id);

				var content = '';
				var count = data.length - 1;
				var SN = 1;
				var token = document.querySelector('input[name="_token"]').value;
				$.each(data, function (index, value) { console.log(value);

					content += '<tr>';
					content += '<td>' + SN++ + '</td>';
					content += '<td>' + value.user_name + '</td>';
					content += '<td>' + value.item_name + '</td>';

					content += '<td><form action="order/complete/'+ value.order_id +'" method="POST"><input name="_token" value="' + token + '" type="hidden"/><button class="btn btn-outline-success">Complete</button></form></td>';
// '+u+'
					content += '</tr>';

					if (count == index) {
						$('.order-list-container').html(content);

					}
				})
			}
			
		});

	}
	else {
		console.log('browser not supported');
	}
</script>
@endsection


