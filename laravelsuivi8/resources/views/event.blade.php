@extends('templateSuivi')


@section('content')
<div id="titre_activite"> {{$activite->thematique}} </div>
<div class="contenu">
<div class="timeline">
<?php 
$status = FALSE;
$id = 1;
$valide_id;
?>
     @foreach($etapes as $jalon)
        @foreach($validation as $valide)
        @if($valide->etapes_id == $jalon->id)
        <?php 
            $status = $valide->status;
            $valide_id = $valide->id;
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
    <div id="{{$valide_id}}" class="jalon">
    @csrf
        <x-bladewind.timeline
        date="{{$echeance}}"
        label='{{$jalon->libelle}}'
        status="completed"
        stacked="true"
        color="green"
        id="{{$valide_id}}" />
        </div>
    @else
    <div id="{{$valide_id}}"  class="jalon">
    @csrf
    <x-bladewind.timeline
        date="{{$echeance}}"
        label='{{$jalon->libelle}}'
        status="pending"
        stacked="true"
        color="red" 
        id="{{$valide_id}}"/>
        
        </div>
    @endif


    @endforeach

   
</div>
</div>
<div id="information">

<div id="info_etape">
    HEllo
</div>
<div id="info_generale">
    World




</div>
</div>
</div>

@endsection
@section('pagescripts')
<script type="text/javascript" src="{{asset('js/suivi.js')}}"></script>
<script>var baseUrl = <?php echo json_encode(url('/')); ?>;</script>
@endsection