<?php
global $titre, $titre2;
$titre = "Erreur";
$titre2 = '';
?>

@extends('template')

@section('content')

    <a href="javascript:history.back()">
        <span class="glyphicon glyphicon-chevron-left"></span> Page précédente
    </a>
    <br><br>
    {{$message}}

@endsection
