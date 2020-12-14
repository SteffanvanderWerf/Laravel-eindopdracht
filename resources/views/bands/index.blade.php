@extends('layouts.app') @section('content')
<div class="row">
	<div class="col-sm-12">
		<h1 class="display-3">Bands</h1>
		<a class="btn btn-success" href="{{ route('bands.create')}}">Toevoegen</a>
		<table class="table table-striped">
	<thead>
		<tr>
			<td>ID</td>
			<td>Band naam</td>
			<td>Muziek genres:</td>
			<td>Omschrijving</td>
			<td>biography:</td>
			<!-- hier stond meer -->
			<td colspan = 2>Actions</td>
		</tr>
	</thead>
	<tbody>
		@foreach($bands as $band)
		<tr>
			<td>{{$band->id}}</td>
			<td>{{$band->band_name}} </td>
			<td>{{$band->music_genres}}</td>
			<td>{{$band->description}}</td>
			<td>{{$band->biography}}</td>
		
		
					<td><a href="{{ route('bands.edit',$band->id)}}" class="btn btn-primary">Aanpassen</a></td>
					<td>
						<form action="{{ route('bands.destroy', $band->id)}}"  method="post">
							@csrf
							@method('DELETE')
							<button class="btn btn-danger" type="submit">Verwijderen</button>
						</form>
					</td>
		
		</tr>
		@endforeach
	</tbody>
</table>
<div></div>
@endsection