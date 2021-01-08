@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2 mt-3">
            <h1 class="display-3">Band aanpassen</h1>

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

            <form method="post" action="{{ route('bands.update', $band->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="first_name">Band Image:</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="band_image" id="band_image" value="/storage/{{ $band->band_image }}">
                        <label class="custom-file-label" for="band_image">{{ $band->band_image }}</label>
                    </div>
                    <img src="/storage/{{ $band->band_image }}" alt="{{ $band->band_image }}" class="img-fluid">
                </div>
                <div class="form-group">
                    <label for="first_name">Band naam:</label>
                    <input type="text" class="form-control" name="band_name" value="{{ $band->band_name }}"/>
                </div>
                <div class="form-group">
                    <label for="last_name">Muziek genres:</label>
                    <input type="text" class="form-control" name="music_genres" value="{{ $band->music_genres }}"/>
                </div>
                <div class="form-group">
                    <label for="email">Omschrijving:</label>
                    <input type="text" class="form-control" name="description" value="{{ $band->description }}"/>
                </div>
                <div class="form-group">
                    <label for="job_title">biografie:</label>
                    <input type="text" class="form-control" name="biography" value="{{ $band->biography }}"/>
                </div>
                <div class="form-group">
                    <label for="video_1">Video 1:</label>
                    <input type="text" class="form-control" name="video_1" value="{{ $band->video_1 }}"/>
                </div>
                <div class="form-group">
                    <label for="video_2">Video 2:</label>
                    <input type="text" class="form-control" name="video_2" value="{{ $band->video_2 }}"/>
                </div>
                <div class="form-group">
                    <label for="video_2">Video 3:</label>
                    <input type="text" class="form-control" name="video_3" value="{{ $band->video_3 }}"/>
                </div>
                <div class="form-group">
                    <label for="job_title">Bg_color:</label>
                    <input type="color" class="form-control" name="bg_color" value="{{ $band->bg_color }}"/>
                </div>
                <div class="form-group">
                    <label for="job_title">text_color:</label>
                    <input type="color" class="form-control" name="text_color" value="{{ $band->text_color }}"/>
                </div>
                <button type="submit" class="btn btn-primary">Aanpassen</button>
            </form>
        </div>
    </div>
    <script>
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    </script>
@endsection