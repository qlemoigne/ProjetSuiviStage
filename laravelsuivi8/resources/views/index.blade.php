@extends('templateSuivi')


@section('content')

    <div class="row">
        <div class="col-xs-12 titre-page">
        page d'accueil du site web
        </div>
    </div>
    <div>
            @foreach($utilisateur->activites as $activite)
            <h2> {{$activite->types->libelle}} <br>
                 {{$activite->debut}} - 
                 {{$activite->fin}}
            </h2>
            @foreach($activite->utilisateurs as $u)
            @if($u->id != $utilisateur->id) 
            <h2>{{$u->prenom}}  {{$u->nom}}</h2>
            @endif 
            @endforeach

            @endforeach
    </div>
@endsection