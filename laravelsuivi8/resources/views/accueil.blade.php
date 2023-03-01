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
      <th scope="col">Début de l'activité</th>
      <th scope="col">Fin de l'activité</th>
      <th scope="col">Nom  </th>
    </tr>
  </thead>
            @foreach($utilisateur->activites as $activite)
            
           
            <tr onclick="window.location.assign('{{ route('activite', ['id'=> $activite->id]) }}');"> 
             
                <td>{{$activite->types->libelle}}</td>
                <td>{{$activite->debut}} </td>
                <td>{{$activite->fin}}</td>
                <td>
                @foreach($activite->utilisateurs as $u)
                    @if($u->id != $utilisateur->id) 
                    {{$u->prenom}}  
                    {{$u->nom}}
                     @endif 
                @endforeach
                </td>
            </tr>

            @endforeach
    </table>

@endsection