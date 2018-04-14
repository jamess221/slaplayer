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
$(function() {
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


	var tag = document.createElement('script');

	tag.src = "https://www.youtube.com/iframe_api";
	var firstScriptTag = document.getElementsByTagName('script')[0];
	firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

	var player;
	function onYouTubeIframeAPIReady() 
	{
		console.log("api ready");
		player = new YT.Player('player', {
		  height: '390',
		  width: '640',
		  videoId: 'M7lc1UVf-VE',
		  events: {
		    'onReady': onPlayerReady,
		    'onStateChange': onPlayerStateChange
		  }
		});
	}

	function onPlayerReady(event)
	{
		console.log(event);
		event.target.playVideo();
	}

	var done = false;
	function onPlayerStateChange(event) 
	{
		if (event.data == YT.PlayerState.PLAYING && !done) 
		{
		  setTimeout(stopVideo, 6000);
		  done = true;
		}
	}

	function stopVideo()
	{
		player.stopVideo();
	}

});
</script>
@endsection