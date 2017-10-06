@extends('layouts.app')

@section('content')
<div class="container" style="background-color: white">
	<h2 style="text-align: center;">List Product</h2>
	<a href="{{Route('product.create')}}"><button type="button" class="btn btn-primary">CREATE</button></a>
	@if (session()->has('notification'))
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{session()->get('notification')}}
		</div>
	@endif
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
							<td style="width: 5%">{{$product->id}}</td>
							<td style="width: 20%">{{$product->Name}}</td>					
							<td style="width: 50%">{!!$product->Description!!}</td>
							<td style="width: 5%">{{$product->Price}}</td>
							<td style="width: 20%"><img src="{{$product->Photo}}" style="width: 100%" class="img-responsive" alt="Image"></td>
							<td style="width: 10%">
								<a href="{{Route('product.show',$product->id)}}"><button type="button" class="btn btn-info">READ</button></a>
								
								<a href="{{Route('product.edit',$product->id)}}"><button type="button" class="btn btn-warning">UPDATE</button></a>
								
								<form style="display: inline-block;" onsubmit="return confirm('Bạn có chắc muốn xóa không')" action="{{route('product.destroy', $product->id)}}" method="POST" role="form">
									{{csrf_field()}}
									{{method_field('DELETE')}}

									<button type="submit" class="btn btn-danger">DELETE</button>
								</form>
							</td>
						</tr>
					@endforeach
				@endif
			</tbody>
		</table>
	</div>
	@if (!empty($products))
		{{$products->links()}}
	@endif
</div>
@endsection