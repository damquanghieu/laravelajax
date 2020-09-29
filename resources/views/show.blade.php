<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script
	  src="https://code.jquery.com/jquery-3.4.1.min.js"
	  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	  crossorigin="anonymous"></script>

	<style >
		#content{
			width: 400px;
			height: 200px;
			margin-left: 400px;
			overflow: scroll;
			margin-top: 100px;
		}
		#comment{
			width: 300px;
			height: 200px;
			margin-left: 400px;
			margin-top: 20px;
		}

	</style>
	<script>
		$(document).ready(function() {

			$('#submit').click(function(event) {
				 event.preventDefault();
				$.ajax({
					url:"show",
					type: "post",
					data: $('form').serialize(),
					dataType:"json",
					success: function(data) {
						data.reverse(); 
						var contents = '';
						for (var i = 0; i < data.length; i++) {
							contents += "<p> Name : " + data[i].name + "</p>";
							contents += "<p> Content : " + data[i].content +"</p>";
						}	
						$('#content').html(contents);

					}
				});
			});
		});
	</script>
</head>

<body>
	<h1>Ajax Comment</h1>
	<div id="content">
		@foreach($data as $value)

			<p> Name :{{$value->name}}</p>
			<p> Content : {{$value->content}}</p>

		@endforeach
	</div>
	<div id="test">
		
	</div>
	<div id="comment">

		<form method="post" action="show">
		    @csrf
		    <input id="noidung" type="text" name="website">
		    <button id="submit" type="submit">Submit</button>
		</form>
	</div>
</body>
</html>

