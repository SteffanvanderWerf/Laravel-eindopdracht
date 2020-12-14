@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Bands bekijken</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif

        <div>
           <a style="margin: 19px;" href="{{ route('bands.index')}}" class="btn btn-primary">Overzicht</a>
        </div>

        <table class="table table-striped">
        <tbody>
            <tr>
                <td>Voornaam:</td>
                <td>{{ $band->band_name }}</td>
            </tr>
            <tr>
                <td>Achternaam:</td>
                <td>{{ $band->music_genres }}</td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>{{ $band->description }}</td>
            </tr>
            <tr>
                <td>biografie:</td>
                <td>{{ $band->biography }}</td>
            </tr>
          </tbody>
        </table>
    </div>
</div>