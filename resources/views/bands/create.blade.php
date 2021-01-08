@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Band toevoegen</h1>
            
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <br>
            @endif

            <form method="post" action="{{ route('bands.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="band_image">Band imgage:</label>
                    <input type="file" class="form-control" name="band_image"/>
                </div>
                <div class="form-group">
                    <label for="band_name">Band naam:</label>
                    <input type="text" class="form-control" name="band_name"/>
                </div>

                <div class="form-group">
                    <label for="music_genres">Muziek genres:</label>
                    <input type="text" class="form-control" name="music_genres"/>
                </div>

                <div class="form-group">
                    <label for="description">Omschrijving:</label>
                    <input type="text" class="form-control" name="description"/>
                </div>
                <div class="form-group">
                    <label for="biography">biografie:</label>
                    <input type="text" class="form-control" name="biography"/>
                </div>
                <div class="form-group">
                    <label for="video_1">Video 1:</label>
                    <input type="text" class="form-control" name="video_1"/>
                </div>
                <div class="form-group">
                    <label for="video_2">Video 2:</label>
                    <input type="text" class="form-control" name="video_2"/>
                </div>
                <div class="form-group">
                    <label for="video_2">Video 3:</label>
                    <input type="text" class="form-control" name="video_3"/>
                </div>
                <div class="form-group">
                    <label for="Bg_color">Achtergrond kleur:</label>
                    <input type="color" class="form-control" name="bg_color" value="#ffffff"/>
                </div>
                <div class="form-group">
                    <label for="text_color">Tekst kleur:</label>
                    <input type="color" class="form-control" name="text_color"/>
                </div>
                        
                <button type="submit" class="btn btn-primary">Toevoegen</button>
            </form>
        </div>
    </div>
@endsection