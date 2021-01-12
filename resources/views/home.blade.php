@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3 mb-5">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }} 
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <br>
                    Fijne dag gewenst <span class="font-weight-bold"> {{Auth::user()->name}}</span>.

                     <a class="btn btn-primary float-right" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }} 
                    </a>
                </div>
            </div>
            @if(session('message'))
                <div class="alert alert-success my-3">
                   <p class="col-12 my-auto">{{ session('message') }}</p>
                </div>
			@endif
            @if ($errors->any())
            <div class="alert alert-danger my-3">
                <ul class="col-12 my-auto">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="card mt-3 mb-5">
                <div class="card-header"><h3>Gegevens aanpassen</h3></div>
                    <div class="card-body">            
                        <form action="{{route('home')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name"><strong>Name:</strong></label>
                                <input type="text" class="form-control" id ="name" name="name" value="{{Auth::user()->name}}">
                            </div>
                            <div class="form-group">
                                <label for="name"><strong>Username:</strong></label>
                                <input type="text" class="form-control" id ="name" name="username" value="{{Auth::user()->username}}">
                            </div>
                                <div class="form-group">
                                <label for="email"><strong>Email:</strong></label>
                                <input type="text" class="form-control" id ="email" name="email" value="{{Auth::user()->email}}" >
                            </div>
                                <button class="btn btn-primary" type="submit">Update Profile</button>
                        </form>
                   </div>
                </div>

                <div class="card mt-3 mb-5">
                    <div class="card-header"><h3>Gegevens aanpassen</h3></div>
                        <div class="card-body">  
                            <div class="table-responsive">
                                <table class="table table-sm table-striped text-nowrap">
                                    <thead>
                                        <tr>
                                            <td>ID</td>
                                            <td>Band naam</td>
                                            <td>Omschrijving</td>
                                            <td>biography:</td>
                                            <!-- hier stond meer -->
                                            <td>Band verwijderen van profiel</td>
                                            <td colspan = 2>Actions</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bands as $band)
                                        <tr>
                                            <td class="align-middle"><a href="{{ route('bands.show',$band->band_id)}}" class="btn btn-primary">{{$band->band_id}}</a></td>
                                            <td class="align-middle">{{$band->band_name}}</td>
                                            <td class="align-middle">{{$band->description}}</td>
                                            <td class="align-middle">{{$band->biography}}</td>
                                            @if(auth()->user() !== null ? $band->users()->where('user_id', auth()->user()->getKey())->exists() : false)
                                            <td class="align-middle text-center" title="Verwijder band van profiel">
                                                <form action="{{ route('removeUser', $band->band_id)}}"  method="post">
                                                    @csrf
                                                    <button class="btn btn-sm btn-danger" type="submit">x</button>
                                                </form>
                                            </td>
                                            @endif
                                            <td class="align-middle" title="Edit band"><a href="{{ route('bands.edit',$band->band_id)}}" class="btn btn-sm btn-primary">Aanpassen</a></td>
                                            <td class="align-middle" title="Verwijder band">
                                                <form action="{{ route('bands.destroy', $band->band_id)}}"  method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger" type="submit">Verwijderen</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table> 
                            </div>         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
