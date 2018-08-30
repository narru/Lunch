// var URl = '{{ route('chef/index') }}';

// var evtSource = new EventSource("//api.example.com/ssedemo.php", { withCredentials: true } );


$.ajax({
		type : "GET",
		url	 : "/car/list",
		data : { any },
		cache: false,	
		success	: function(html) {					
						$("#carlistdiv").html(html).show('slow');
					} //end function
});//close ajax