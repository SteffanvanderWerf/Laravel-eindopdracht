@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
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
        <form method="post" action="{{ route('bands.update', $band->id) }}">
            @method('PATCH')
            @csrf
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
            <button type="submit" class="btn btn-primary">Aanpassen</button>
        </form>
    </div>
</div>
@endsection