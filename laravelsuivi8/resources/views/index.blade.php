<!DOCTYPE html>
<html>
    <head> 
    <link rel="stylesheet"  href="{{ asset('app.css') }}">
    </head>
    <body>
       <h1>page d'accueil du site web </h1>
       @foreach($utilisateurs as $u )
            @foreach($u->activites as $activite)
            <h2> {{$activite->adresse}}</h2>
            @endforeach
        @endforeach
       <script src= "{{ asset('app.js') }}"> </script>
    </body>
</html>