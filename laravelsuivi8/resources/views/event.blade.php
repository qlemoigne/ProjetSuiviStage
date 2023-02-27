@extends('templateSuivi')


@section('content')
<div id="titre_activite"> {{$activite->resume}} </div>
<div class="timeline">
    @foreach($etapes as $jalon)
    
    <?php
    $date_debut=new dateTime("{$date}");
    $intervalle = new \DateInterval("P{$jalon->echeance}D");
    $echeance = date_add($date_debut,$intervalle);
    $echeance = $echeance->format('Y/m/d');
    
    ?>
    <x-bladewind.timeline
    date="{{$echeance}}"
    label='{{$jalon->libelle}}'
    status="completed"
    stacked="true" />
    @endforeach
</div>

@endsection