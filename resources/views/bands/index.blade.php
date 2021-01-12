@extends('layouts.app') 
@section('content')
	<div class="row">
		<div class="col-sm-12">
			<h1 class="display-3">Bands</h1>
			
			@if(auth()->user())
			<a class="btn btn-success" href="{{ route('bands.create')}}">Toevoegen</a>
			@endif

			<div class="row float-right">
				{!! Form::open(['method'=>'GET','url'=>'/bands/','class'=>'navbar-form navbar-left','role'=>'search']) !!}
					<div class="input-group custom-search-form">
						<input type="text" class="form-control" name="keyword"	placeholder="Zoek...">
						<span class="input-group-btn"><button class="btn btn-success btn-default-sm" type="submit"><span class="material-icons align-middle">search</span></button></span>
					</div>
				{!! Form::close() !!}
			</div>
			
			@if(session('message'))
                <div class="alert alert-success my-3">
                   <p class="col-12 my-auto">{{ session('message') }}</p>
                </div>
			@endif
			
			<table class="table table-striped text-nowrap">
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
							<td><a href="{{ route('bands.show',$band->id)}}" class="btn btn-primary">{{$band->id}}</a></td>
							<td>{{$band->band_name}} </td>
							<td>{{$band->music_genres}}</td>
							<td class="text-truncate" style="max-width:200px">{{$band->description}}</td>
							<td>{{$band->biography}}</td>
							@if(auth()->user() !== null ? $band->users()->where('user_id', auth()->user()->getKey())->exists() : false)
							<td title="Edit band"><a href="{{ route('bands.edit',$band->id)}}" class="btn btn-primary">Aanpassen</a></td>
							<td title="Verwijder band">
								<form action="{{ route('bands.destroy', $band->id)}}"  method="post">
									@csrf
									@method('DELETE')
									<button class="btn btn-danger" type="submit">Verwijderen</button>
								</form>
							</td>
							@endif
							<td>
							
							@if(auth()->user() !== null ? !$band->users()->where('user_id', auth()->user()->getKey())->exists() : false)
								<form action="{{ route('addUser', $band->id)}}"  method="post">
									@csrf
									<button title="Voeg band toe aan profiel" class="btn btn-success" type="submit">+</button>
								</form>
							@endif
							@if(auth()->user() !== null ? $band->users()->where('user_id', auth()->user()->getKey())->exists() : false)
								<form action="{{ route('removeUser', $band->id)}}"  method="post">
									@csrf
									<button title="Verwijder band van profiel" class="btn btn-danger" type="submit">x</button>
								</form>
							@endif
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		<div>
	</div>
@endsection