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
           
            <tr class="odd"> 
             
                <td id="act"> <a href=" {{ route('activite', ['id'=> $activite->id]) }}">{{$activite->types->libelle}}</td>
</a>
                <td>
                
                @foreach($activite->utilisateurs as $u)
              
                    @if($u->id != $utilisateur->id) 
                    <a href="mailto:{{$u->prenom}}.{{$u->nom}}@etu.imt-nord-europe.fr">
                     {{$u->prenom}}  
                    {{$u->nom}}
                     @endif 
                @endforeach
</a>
                </td>
                <td> {{$activite->thematique}} </td>
                
                <td><a href="mailto:{{$activite->adresse_mail_tuteur_externe}}">{{$activite->nom_tuteur_externe}}</td>
</a>
                <td>{{$activite->debut}} </td>
                <td>{{$activite->fin}}</td>
                
            </tr>   

            @endforeach
    </table>

@endsection