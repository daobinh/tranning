@extends('layouts.app')

@section('content')
<div class="container" style="background-color: white">
	<h2 style="text-align: center;">List Post Product</h2>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>NAME</th>
					<th>DESCRIPTION</th>
					<th>PHOTO</th>
					<th>PRICE</th>
					<th>ACTION</th>
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
							<td>
								<a href="{{ route('post.show',$product->id) }}"><button type="button" class="btn btn-info">READ</button></a>
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