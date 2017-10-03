<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div class="container">
		<table class="table table-hover">
		<thead>
			<tr>
				<th>NAME</th>
				<th>DESCRIPTION</th>
				<th>PHOTO</th>
				<th>PRICE</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{$product->Name}}</td>
				<td>{{$product->Description}}</td>
				<td>{{$product->Photo}}</td>
				<td>{{$product->Price}}</td>
			</tr>
		</tbody>
	</table>
	</div>
	
</body>
</html>