@extends('templateSuivi')


@section('content')
<div class="titre-activite"> {{$activite->thematique}} </div>
    <div id="contenu">
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
        <div id="{{$jalon->id}}" onclick="window.location.assign('{{ route('changementEtat', ['id'=> $valide_id]) }}');">
        @csrf
            <x-bladewind.timeline
            date="{{$echeance}}"
            label='{{$jalon->libelle}}'
            status="completed"
            stacked="true"
            color="green"
            id="{{$jalon->id}}" />
            </div>
        @else
        <div id="{{$jalon->id}}" onclick="window.location.assign('{{ route('changementEtat', ['id'=> $valide_id]) }}');">
        @csrf
        <x-bladewind.timeline
            date="{{$echeance}}"
            label='{{$jalon->libelle}}'
            status="pending"
            stacked="true"
            color="red" />
            </div>
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
    <div class="etape-activite">
        <div class="titre-etape-activite">Etape</div>
        <div class="etape-info-generale">Info général</div>
        <div class="etape-info-detail">Information étape:
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Aliquam sem fringilla ut morbi tincidunt. Mauris augue neque gravida in fermentum et sollicitudin ac orci. Urna molestie at elementum eu facilisis sed. Nisl vel pretium lectus quam id leo. Tellus orci ac auctor augue mauris augue neque. Lectus urna duis convallis convallis tellus id interdum velit. Platea dictumst vestibulum rhoncus est pellentesque elit ullamcorper. Molestie nunc non blandit massa enim nec. Mattis rhoncus urna neque viverra justo nec ultrices dui. Lacus suspendisse faucibus interdum posuere lorem ipsum dolor sit. Mauris rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar. Condimentum vitae sapien pellentesque habitant morbi tristique senectus et netus. Massa tincidunt dui ut ornare lectus sit amet.

            Pharetra massa massa ultricies mi quis hendrerit dolor. Enim praesent elementum facilisis leo vel fringilla est ullamcorper. Id aliquet risus feugiat in ante metus dictum. Quis risus sed vulputate odio ut enim blandit volutpat maecenas. Nisl suscipit adipiscing bibendum est ultricies integer quis. Tincidunt ornare massa eget egestas purus viverra accumsan in. Mauris vitae ultricies leo integer malesuada nunc vel. Ultricies mi eget mauris pharetra et ultrices neque. Mauris commodo quis imperdiet massa tincidunt. Et ligula ullamcorper malesuada proin. Quam id leo in vitae turpis massa sed elementum.
            
            Ac turpis egestas maecenas pharetra convallis posuere. A diam maecenas sed enim ut. In ornare quam viverra orci sagittis eu. At risus viverra adipiscing at. Ut porttitor leo a diam sollicitudin tempor id eu. Sed risus pretium quam vulputate dignissim suspendisse. Tristique sollicitudin nibh sit amet commodo nulla facilisi. Lectus vestibulum mattis ullamcorper velit sed ullamcorper morbi tincidunt. Est lorem ipsum dolor sit amet consectetur. Volutpat maecenas volutpat blandit aliquam etiam. Eget arcu dictum varius duis at consectetur lorem donec. Pellentesque pulvinar pellentesque habitant morbi tristique senectus et netus. Porta nibh venenatis cras sed.
            
            Facilisis sed odio morbi quis commodo odio aenean sed adipiscing. Aliquam eleifend mi in nulla posuere. Viverra aliquet eget sit amet tellus cras adipiscing enim eu. Fringilla ut morbi tincidunt augue interdum velit euismod. Blandit cursus risus at ultrices mi tempus. Ipsum dolor sit amet consectetur adipiscing elit ut aliquam purus. At tempor commodo ullamcorper a lacus vestibulum. Tortor consequat id porta nibh venenatis cras sed. Odio ut enim blandit volutpat maecenas. Proin sagittis nisl rhoncus mattis rhoncus urna neque. Neque egestas congue quisque egestas diam in arcu cursus euismod. At risus viverra adipiscing at. Aenean et tortor at risus viverra. Dictum non consectetur a erat nam at lectus urna. Pellentesque id nibh tortor id.
            
            Mauris in aliquam sem fringilla ut morbi tincidunt augue. Velit laoreet id donec ultrices tincidunt. Et malesuada fames ac turpis egestas sed. Egestas dui id ornare arcu. Turpis egestas sed tempus urna et pharetra pharetra massa massa. A diam sollicitudin tempor id eu nisl nunc. Aliquet nibh praesent tristique magna sit amet purus gravida quis. Tincidunt arcu non sodales neque sodales ut etiam. Tortor vitae purus faucibus ornare suspendisse sed nisi. Parturient montes nascetur ridiculus mus mauris vitae ultricies leo. Morbi non arcu risus quis. Arcu ac tortor dignissim convallis aenean et tortor at. Ridiculus mus mauris vitae ultricies leo integer malesuada. Odio ut enim blandit volutpat maecenas volutpat. Purus sit amet luctus venenatis lectus. Donec adipiscing tristique risus nec. Semper quis lectus nulla at volutpat diam ut. Tortor consequat id porta nibh venenatis. Feugiat nisl pretium fusce id velit. At volutpat diam ut venenatis tellus in metus vulputate.</div>
        <div class="validation-etape"><span class="icon-validate"></span><button class="button-validate">Valider</button></div>
    </div>
</div>

@endsection