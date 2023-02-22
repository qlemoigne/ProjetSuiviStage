<?php
  $titre = "Suivi ...";
  $support = getenv('SUPPORT_MYSERVICES');
?>

@extends('template')

@section('style')
  <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}" media="screen"/>
  @yield('styleSuivi')
@endsection

@section('pagescripts')
  @yield('scriptsSuivi')
@endsection
