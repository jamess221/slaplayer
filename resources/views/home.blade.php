@extends('layouts.app')

@section('content')
 <div class="container">
 	<div id="chat--box" style="background-color:red; height:500px">
 	</div>

	<input id="chat--message" type="text">
	<a href="#" id="chat--send" class="btn btn-primary">Send</a>

	<div id="player"></div>

</div>
@endsection

@section('scripts')
<script src="js/app.js"></script>
<script>

$('#chat--send').click(function(e) {
	e.preventDefault();

	var message = $("#chat--message")[0].value;

	$("#chat--message").val("");

	axios.post('/chat/send', {
	    room_id: "1", text: message
	  })
	  .then(function (response) {
	    console.log(response);
	  })
	  .catch(function (error) {
	    console.log(error);
	  });
});


Echo.join(`room.1`)
.listen('.message.sent', (e) => {
	console.log(e);
	$("#chat--box").append('<p>'+e.message.user +': ' + e.message.text+'</p>');
});


$(function() {
	console.log("doc ready");
});
</script>
@endsection