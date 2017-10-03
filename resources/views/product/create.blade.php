<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- Latest compiled and minified CSS & JS -->
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<form action="{{Route('product.store')}}" method="POST" role="form" id="create" enctype='multipart/form-data'>
			<h2 style="text-align: center;">CREATE PRODUCT</h2>
			{{csrf_field()}}

			<div class="form-group">
				<label for="">Name</label>
				<input type="text" class="form-control" name="Name" id="" placeholder="Input Name" value="{{old('Name')}}">
			</div>
			@if ($errors->has('Name'))
			    <div class="alert alert-danger">
			    	<strong>{{$errors->first('Name')}}</strong>
			    </div>
			@endif
			<div class="form-group">
				<label for="">Price</label>
				<input type="text" class="form-control" name="Price" id="" placeholder="Input price" value="{{old('Price')}}">
			</div>
			@if ($errors->has('Price'))
			    <div class="alert alert-danger">
			    	<strong>{{$errors->first('Price')}}</strong>
			    </div>
			@endif
			<div class="form-group">
				<label for="">Photo</label>
				<input type="file" class="form-control" name="Photo" id="" placeholder="Input photo">
			</div>
			@if ($errors->has('Photo'))
			    <div class="alert alert-danger">
			    	<strong>{{$errors->first('Photo')}}</strong>
			    </div>
			@endif

			<div class="form-group">
				<label for="">Description</label>
				<textarea id="Description" name="Description" value="{{old('Description')}}"></textarea>
			</div>
			@if ($errors->has('Description'))
			    <div class="alert alert-danger">
			    	<strong>{{$errors->first('Description')}}</strong>
			    </div>
			@endif

			<script type="text/javascript">
				CKEDITOR.replace('Description');	
			</script>
		
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>	
	</div>
	
</body>
</html>