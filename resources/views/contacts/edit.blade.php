@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Contact aanpassen</h1>

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
        <form method="post" action="{{ route('contacts.update', $contact->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">

                <label for="first_name">Voornaam:</label>
                <input type="text" class="form-control" name="first_name" value="{{ $contact->first_name }}" />
            </div>

            <div class="form-group">
                <label for="last_name">Achternaam:</label>
                <input type="text" class="form-control" name="last_name" value="{{ $contact->last_name }}" />
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" value="{{ $contact->email }}" />
            </div>
            <div class="form-group">
                <label for="job_title">Telefoon nummer:</label>
                <input type="text" class="form-control" name="phonenumber" value="{{ $contact->phonenumber }}" />
            </div>
            <div class="form-group">
          <label for="band">Band</label>
            {!! Form::select('band_id', $bands, $contact->band_id,
            ['placeholder' => 'Kies een Band...',
            'class' => 'form-control']) !!}
          </div>
            <div class="form-group">
                <label for="city">Woonplaats:</label>
                <input type="text" class="form-control" name="city" value="{{ $contact->city }}" />
            </div>
            <div class="form-group">
                <label for="country">Land:</label>
                <input type="text" class="form-control" name="country" value="{{ $contact->country }}" />
            </div>
            
            <button type="submit" class="btn btn-primary">Aanpassen</button>
        </form>
    </div>
</div>
@endsection