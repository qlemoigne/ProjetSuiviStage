<?php
global $titre, $titre2;
$titre = "Erreur";
$titre2 = '';
?>

@extends('templateSuivi')

@section('content')
    <p>error</p>
    <a href="javascript:history.back()">
        <span class="glyphicon glyphicon-chevron-left"></span> Page précédente
    </a>
    <br><br>
    {{$message}}

@endsection
