@extends('templateSuivi')


@section('content')

    <div class="row">
        <div class="col-xs-12 titre-page">
        Liste des activités
        </div>
    </div>
    <table>
    <thead>
    <tr>
      <th scope="col">Type d'activité</th>
      <th scope="col">Début de l'activité</th>
      <th scope="col">Fin de l'activité</th>
      <th scope="col">Nom  </th>
      <th scope="col">Prenom  </th>
    </tr>
  </thead>
            @foreach($utilisateur->activites as $activite)
            <tr class="odd"> 
                <td id="act">{{$activite->types->libelle}}</td>
                <td>{{$activite->debut}} </td>
                <td>{{$activite->fin}}</td>
                @foreach($activite->utilisateurs as $u)
                    @if($u->id != $utilisateur->id) 
                    <td> {{$u->prenom}}  </td>
                    <td> {{$u->nom}} </td>
                     @endif 
                @endforeach
            </tr>   

            @endforeach
    </table>

@endsection