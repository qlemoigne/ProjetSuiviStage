@extends('templateSuivi')


@section('content')

    <div class="row">
        <div class="col-xs-12 titre-page">
        page d'accueil du site web
        </div>
    </div>


       @foreach($utilisateurs as $u )
            @foreach($u->activites as $activite)
            <h2> {{$activite->adresse}}</h2>
            @endforeach
        @endforeach
@endsection