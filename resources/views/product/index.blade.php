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
	<a href="{{Route('product.create')}}"><button type="button" class="btn btn-primary">Create</button></a>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>NAME</th>
					<th>DESCRIPTION</th>
					<th>PRICE</th>
					<th>PHOTO</th>
					<th>action</th>
				</tr>
			</thead>
			<tbody>
				@if(count($products))
					@foreach ($products as $product)
						<tr>
							<td>{{$product->id}}</td>
							<td>{{$product->Name}}</td>					
							<td>{!!$product->Description!!}</td>
							<td>{{$product->Price}}</td>
							<td><img src="{{$product->Photo}}" class="img-responsive" alt="Image"></td>
							<td>
								<a href="{{Route('product.show',$product->id)}}"><button type="button" class="btn btn-info">Xem</button></a>
								
								<a href="{{Route('product.edit',$product->id)}}"><button type="button" class="btn btn-warning">Update</button></a>
								
								<form style="display: inline-block;" onsubmit="return confirm('Bạn có chắc muốn xóa không')" action="{{route('product.destroy', $product->id)}}" method="POST" role="form">
									{{csrf_field()}}
									{{method_field('DELETE')}}

									<button type="submit" class="btn btn-danger">Xóa</button>
								</form>
							</td>
						</tr>
					@endforeach
				@endif
			</tbody>
		</table>
	</div>
	
</body>
</html>