@extends('templateSuivi')


@section('content')
<div id="titre_activite"> {{$activite->resume}} </div>
<div class="timeline">
    @foreach($etapes as $jalon)
    <x-bladewind.timeline
    date="18-JUL"
    label='{{$jalon->libelle}}'
    status="completed"
    stacked="true" />
    @endforeach
</div>

@endsection