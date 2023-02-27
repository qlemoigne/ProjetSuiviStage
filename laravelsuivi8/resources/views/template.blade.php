<?php
$dbType = getenv('APP_ENV');
$header = "header-large";
if (empty($titre2))
  $titre2 = '';
if ($dbType == 'development') {
  $header = "header-large-test";
}
?>

<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{$titre}}</title>

  <link rel="stylesheet" href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap-theme.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bootstrap-datatables/media/css/jquery.dataTables.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bootstrap-datatables/extensions/FixedHeader/css/fixedHeader.dataTables.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/myServices.css')}}" media="screen" />
  @yield('style')

  @yield('head')
</head>

<body id="template">
  <div class="container">
    <div class="row">
      <!-- Bandeau -->
      <div class="hidden-xs">
        <header class="{{$header}}">
          <div class="logo-l"></div>
          <div class="text-banner-l">{{$titre}}</div>
          <div class="text-banner-l-2lignes">{{$titre2}}</div>
        </header>
      </div>
      <div class="hidden-sm hidden-md hidden-lg col-xs-12 col-sm-12 text-center">
        <header class="header-small">{{$titre}}<br />IMT Nord Europe</header>
      </div>
    </div>

    <!-- Menu -->
    <div class="row">
      <div class="col-xs-12">
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header hidden-sm hidden-md hidden-lg">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Menu</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav navbar-left" id="myTab">
                <?php

                function echoBeginningOfMenu($menu){
                  echo '<li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" id="myTabDrop3" href="#">' .
                    $menu['lib_titre'] . '
                              <span class="badge" id="span-' . $menu['lib_titre'] . '"></span>
                              <b class="caret"></b>
                            </a>
                            <ul aria-labelledby="myTabDrop3" role="menu" class="dropdown-menu dropdown-menu-primary">';
                }

                function echoEndOfMenu() {
                  echo "</ul></li>";
                }

                function echoMenu($menu){
                  if ($menu['lib_titre'] == '-')
                    echo "<li class='divider'>";
                  else if (((Request::is($menu['lib_route'])) || (Request::is($menu['lib_route'] . "*"))) && ($menu['lib_lien'] == ""))
                    echo "<li class='active'>";
                  else
                    echo "<li>";

                  if ($menu['lib_route'] == "") {
                    if ($menu['lib_lien'] != "") {
                      echo "<a href=" . $menu['lib_lien'] . " target=\"_blank\">" . $menu['lib_titre'] . "</a>";
                    } 
                    else {
                      echo '<b>' . $menu['lib_route'] . $menu['lib_lien'] . $menu['lib_titre'] . '</b>';
                    }
                  } 
                  else {
                    echo "<a href=" . url('/') . '/' . $menu['lib_route'] . " onclick=\"document.getElementById('template').style.cursor= 'wait';\">" .
                      $menu['lib_titre'] . "
                           <span class='badge' id='span-" . $menu['lib_route'] . "'></span>
                         </a>";
                  }
                  echo " </li>";
                }

                function hasSubMenus($menuCourant, $menus){
                  foreach ($menus as $menu) {
                    if ($menu['id_menu_sup'] == $menuCourant['id_menu'])
                      return true;
                  }
                  return false;
                }

                // display all submenus of menu
                function displayAllSubMenusOf($menuCourant, $menus) {
                  foreach ($menus as $menu) {
                    if ($menu['id_menu_sup'] == $menuCourant['id_menu']) {
                      displayMenu($menu, $menus);
                    }
                  }
                }

                // display $menu
                function displayMenu($menu, $menus) {
                  if (hasSubMenus($menu, $menus)) {
                    echoBeginningOfMenu($menu);
                    displayAllSubMenusOf($menu, $menus);
                    echoEndOfMenu();
                  } 
                  else {
                    echoMenu($menu);
                  }
                }

                if (isset($menus)) {
                  foreach ($menus as $key => $menu) {
                    // test if $menu has parent i.e. it is a root menu
                    if ($menu['id_menu_sup'] == null) {
                      displayMenu($menu, $menus);
                    }
                  }
                }
                echo '<li class="hidden-sm hidden-md hidden-lg"><a href="' . url('/deconnexion') . '">Déconnexion</a></li>';
                ?>
              </ul>
              <ul class="nav navbar-nav navbar-right hidden-xs">
                <?php
                if (Session::has('MAIL')) {
                  $nom = session('IM_LIB_NOM');
                  $prenom = session('IM_LIB_PRENOM');
                  echo '<li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" id="myTabDrop3" href="#">' .
                    $prenom . " " . $nom . '
                              <span class="badge" id="span-' . $nom . '"></span>
                              <b class="caret"></b>
                            </a>
                            <ul aria-labelledby="myTabDrop3" role="menu" class="dropdown-menu dropdown-menu-primary">
                              <li>
                                <a href="' . url(getenv('APP_URL')) . '">MyServices</a>
                              </li>
                              <li>
                                <a href="' . url(getenv('ADRESSE_PROFIL')) . '">Mon profil</a>
                              </li>
                              <li>
                                <a href="' . url('/deconnexion') . '"><span class="glyphicon glyphicon-log-out"></span>Déconnexion</a>
                              </li>
                            </ul>
                          </li>';
                } 
                else {
                  echo "<li><a href='" . url('/deconnexion') . "'><span class='glyphicon glyphicon-log-out'></span>Déconnexion</a></li>";
                }
                ?>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>

    <!-- Contenu -->
    @yield('content')


  </div>

  <!-- Pied de page -->
  <footer>
    <?php
    $annee = date('Y');
    if (!isset($support))
      $support = getenv('SUPPORT_MYSERVICES');
    echo "© IMT Nord Europe DISI-OSN  - $annee";
    if (isset($version))
      echo " - Version " . $version;
    echo "<br>Pour toutes questions, envoyez un mail au <a href=\"mailto:$support\">support</a>"
    ?>
  </footer>

  <!-- Scripts -->
  <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>F
  <script type="text/javascript" src="{{asset('assets/popper/popper.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/bootstrap-datatables/media/js/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/bootstrap-datatables/extensions/FixedHeader/js/dataTables.fixedHeader.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/moment.min.js')}}"></script>
  @yield('pagescripts')
  <script type="text/javascript" src="{{asset('js/template.js')}}"></script>
</body>

</html>