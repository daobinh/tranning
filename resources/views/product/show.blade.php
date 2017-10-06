<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<h2 style="text-align: center;">Detail Product</h2>
		<div class="row"> 
			<div class="col-lg-3" >
				<img src="{{ asset($product->Photo) }}" class="img-responsive" alt="Image">
			</div>
			<div class="col-lg-9">
				<ul>
					<li>Name:{{$product->Name}}</li>
					<li>Description: {!!$product->Description!!}</li>
					<li>Price: {{$product->Price}}</li>
				</ul>
			</div>
		</div>
		<a href="{{route('product.index')}}"><button class="btn btn-primary">BACK</button></a>
	</div>
</body>
</html>