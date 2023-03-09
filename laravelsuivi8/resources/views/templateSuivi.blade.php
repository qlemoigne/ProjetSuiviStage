<?php
  $titre = "Suivi";
  $support = getenv('SUPPORT_MYSERVICES');
?>

@extends('template')

@section('head')
  <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />

  <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />

  <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>

  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

  
  
  
 
  

@endsection

@section('style')
  <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}" media="screen"/>
 
 
  @yield('styleSuivi')
@endsection

@section('pagescripts')
  @yield('scriptsSuivi')
  <script type="text/javascript" src="{{asset('js/suivi.js')}}"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>

@endsection
