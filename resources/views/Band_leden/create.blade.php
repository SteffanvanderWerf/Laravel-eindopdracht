@extends('layouts.app')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Band toevoegen</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('bands.store') }}">
          @csrf
          <div class="form-group">
              <label for="first_name">Band naam:</label>
              <input type="text" class="form-control" name="band_name"/>
          </div>

          <div class="form-group">
              <label for="last_name">Muziek genres:</label>
              <input type="text" class="form-control" name="music_genres"/>
          </div>

          <div class="form-group">
              <label for="email">Omschrijving:</label>
              <input type="text" class="form-control" name="description"/>
          </div>
          <div class="form-group">
              <label for="job_title">biografie:</label>
              <input type="text" class="form-control" name="biography"/>
          </div>
                 
          <button type="submit" class="btn btn-primary">Toevoegen</button>
      </form>
  </div>
</div>
</div>
@endsection