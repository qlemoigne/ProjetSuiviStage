@extends('templateSuivi')


@section('content')
<div id="titre_activite"> {{$activite->resume}} </div>
<div class="timeline">
<?php 
$status = FALSE;
?>
    @foreach($etapes as $jalon)
        @foreach($validation as $valide)
        @if($valide->etapes_id == $jalon->id)
        <?php 
            $status = $valide->status;
        ?>  
        @endif
        @endforeach
    <?php
    $date_debut=new dateTime("{$date}");
    $intervalle = new \DateInterval("P{$jalon->echeance}D");
    $echeance = date_add($date_debut,$intervalle);
    $echeance = $echeance->format('d/m/Y');
    ?>
    @if($status)
        <x-bladewind.timeline
        date="{{$echeance}}"
        label='{{$jalon->libelle}}'
        status="completed"
        stacked="true"
        color="green" />
    @else
    <x-bladewind.timeline
        date="{{$echeance}}"
        label='{{$jalon->libelle}}'
        status="pending"
        stacked="true"
        color="red" />
    @endif
    @endforeach

    <x-bladewind.timeline
    date="{{$activite->fin}}"
    label="fin de l'activité"
    status="pending"
    stacked="true"
    last="true"
    color="red" />
</div>

@endsection