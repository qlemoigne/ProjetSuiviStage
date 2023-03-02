@extends('templateSuivi')


@section('content')

    <div class="row">
        <div class="col-xs-12 titre-page">
        Liste des activités
        </div>
    </div>
    <table id="table_accueil">
        <thead>
        <tr>
            <th scope="col">Type d'activité</th>
            <th scope="col">Nom de l'étudiant  </th>
            <th scope="col">Thématique</th>
            <th scope="col">Nom du tuteur  </th>
            <th scope="col">Début de l'activité</th>
            <th scope="col">Fin de l'activité</th>
        </tr>

    </thead>
            @foreach($utilisateur->activites as $activite)


            <tr onclick="window.location.assign('{{ route('activite', ['id'=> $activite->id]) }}');"> 

                <td>{{$activite->types->libelle}}</td>
                <td> 
                @foreach($activite->utilisateurs as $u)
                    @if($u->id != $utilisateur->id)
                    <a href="mailto:{{$u->prenom}}.{{$u->nom}}@etu.imt-nord-europe.fr"> 
                    {{$u->prenom}}
                    {{$u->nom}}
                     @endif 
                @endforeach
                </td>
                <td> {{$activite->thematique}} </td>
                <td><a href="mailto:{{$activite->adresse_mail_tuteur_externe}}">{{$activite->nom_tuteur_externe}}</td>
                <td>{{$activite->debut}} </td>
                <td>{{$activite->fin}}</td>

            </tr>

            @endforeach
    </table>

@endsection