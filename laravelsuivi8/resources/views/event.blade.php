@extends('templateSuivi')


@section('content')
<div class="timeline">
    <x-bladewind.timeline
        date="18-JUL"
        label="You signed up"
        status="completed"
    />

    <x-bladewind.timeline
        date="19-JUL"
        label="I signed up"
        status="completed"
    />

    <x-bladewind.timeline
        date="19-JUL"
        label="I signed up"
        status="pending"
        color="red"
    />

</div>

@endsection