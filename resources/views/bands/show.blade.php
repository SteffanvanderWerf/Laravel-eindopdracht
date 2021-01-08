@extends('layouts.app')
@section('content')

    <div class="row epk" >
        
        @if(session('success'))
            <div class="alert alert-success col-12 my-3">
                <p class=" my-auto">{{ session('success') }}</p>
            </div>
        @endif
        
        <div class="card col-12 mt-3" style="background-color:{{ $band->bg_color}};">
            <div class="card-body">
                <div class="col-sm-12">
                    <h1 class="display-3 mt-3 border-bottom" style="color:{{ $band->text_color }}">{{ $band->band_name }}</h1>

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

                

                    <div class="d-block text-right">
                        <a style="margin: 19px;" href="{{ route('bands.index')}}" class="btn btn-primary">Overzicht</a>

                        @if(auth()->user() !== null ? $band->users()->where('user_id', auth()->user()->getKey())->exists() : false)
                            <a href="{{ route('bands.edit',$band->id)}}" class="btn btn-primary">Aanpassen</a>
                        @endif
                    </div>

                    <div class="text-center">
                        <img class="img-fluid" src="/storage/{{ $band->band_image }}" alt="{{ $band->band_image }}" style="max-height: 600px;">
                        <p class="my-5" style="color:{{ $band->text_color }}" >{{ $band->description }}</p>
                    </div>

                    <table class="table">
                        <tbody>
                            <tr>
                                <td style="color:{{ $band->text_color }}">Band naam:</td>
                                <td style="color:{{ $band->text_color }}">{{ $band->band_name }}</td>
                            </tr>
                            <tr>
                                <td style="color:{{ $band->text_color }}">band genres:</td>
                                <td style="color:{{ $band->text_color }}">{{ $band->music_genres }}</td>
                            </tr>
                            <tr>
                                <td style="color:{{ $band->text_color }}">biografie:</td>
                                <td style="color:{{ $band->text_color }}">{{ $band->biography }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="card my-3 col-12" style="background-color:{{ $band->bg_color}};">
            <div class="card-body">
                <div class="text-center">
                    <iframe style="width:auto; margin:0 auto;" height="315" src="https://www.youtube.com/embed/{{$band->video_1}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <iframe style="width:auto; margin:0 auto;" height="315" src="https://www.youtube.com/embed/{{$band->video_2}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <iframe style="width:auto; margin:0 auto;" height="315" src="https://www.youtube.com/embed/{{$band->video_3}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection