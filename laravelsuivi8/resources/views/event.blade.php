@extends('templateSuivi')


@section('content')
<div class="titre-activite"> {{$activite->thematique}} </div>
    <div id="contenu">
        <div class="timeline">
            <?php 
                $status = FALSE;
                $id = 1;
                $valide_id;
                $cloture_status=$cloture->status;
                $cloture_id=$cloture->id;
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

                @if($cloture_status)
                    <div id="{{$cloture_id}}" class="cloture">
                    @csrf
                        <x-bladewind.timeline
                        date="{{$activite->fin}}"
                        label="fin de l'activité"
                        status="completed"
                        stacked="true"
                        last="true"
                        color="green" 
                        id="jalon_cloture"/>
                    </div>
                @else
                    <div id="{{$cloture_id}}" class="cloture">
                    @csrf
                        <x-bladewind.timeline
                        date="{{$activite->fin}}"
                        label="fin de l'activité"
                        status="pending"
                        stacked="true"
                        last="true"
                        color="red" 
                        id="jalon_cloture"/>
                    </div>
                @endif
        </div>
        
        <div class="etape-activite">

            <div class="bloc-info-general">
                <div class="titre-etape-info-generale">Information générale :</div>    
                <div class="etape-info-generale">{{$jalon->libelle}}</div>
            </div>
            
            <div class="ensemble-etape">
                @foreach($etapes as $jalon)
                    <div class="bloc-etape">
                        <div class="etape-info-titre">Etape : {{$jalon->libelle}}</div>
                        <div class="etape-info-detail">{{$jalon->resume}}</div>
                        <div class="validation-etape"><span class="icon-validate"></span><button class="button-validate">Valider</button></div>
                    </div>
                @endforeach
            </div>

            <div class="deroulant-etapes">
                
            </div>
        </div>
    </div>
    
    
@endsection
@section('pagescripts')
<script type="text/javascript" src="{{asset('js/suivi.js')}}"></script>
<script>var baseUrl = <?php echo json_encode(url('/')); ?>;</script>
@endsection