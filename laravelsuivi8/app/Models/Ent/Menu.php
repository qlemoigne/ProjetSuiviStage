<?php

namespace App\Models\Ent;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
  protected $connection = 'ent';
  protected $table = 'menu';
  protected $primaryKey = 'id_menu';
  public $incrementing = false; // Indique si les ID sont auto-incrémentés
  public $timestamps = false;  // Ne pas mettre à jour les colonnes created_at et updated_at

  public static function getMenu1($idApplication, $isResponsable=0,  $isGestionnaire=0, $isAdmin=0) {
   
    $menuApplication = self::select('id_menu', 'id_menu_sup', 'lib_titre', 'lib_route','lib_lien')
                ->where('id_application', '=', $idApplication)
                ->whereIn('bl_test_responsable', array(0, $isResponsable))
                ->whereIn('bl_test_gestionnaire', array(0, $isGestionnaire))
                ->whereIn('bl_test_admin', array(0, $isAdmin))
                ->orderBy('no_ordre')
                ->get();

    
    $menu = array();
    foreach ($menuApplication as $key => $value) {
      $menu[] = array('id_menu'=> $value['id_menu'], 'id_menu_sup' => $value['id_menu_sup'],
                           'lib_titre' => $value['lib_titre'], 'lib_route' => $value['lib_route'], 'lib_lien' => $value['lib_lien']);

    }
    dump($menu);
    return $menu;
  }

  public static function getMenu($idApplication, $id_utilisateur) {
   
    // Si on peut configurer les droits de l'application, on vérifie que la personne accède à l'application
      $menuApplication = self::select('menu.id_menu', 'id_menu_sup', 'lib_titre', 'lib_route', 'lib_lien')
                  //->join('droit_menu_utilisateur', 'menu.id_menu', 'droit_menu_utilisateur.id_menu')
                  //->where('droit_menu_utilisateur.id_utilisateur', '=', $id_utilisateur)
                  ->where('id_application', '=', $idApplication)
                  //->where('id_utilisateur', '=', $id_utilisateur)
                 
                  // ->where(function ($query) use ($utilisateur->typeUtilisateur) {
                  //   $query->where('id_type_utilisateur', "=", $utilisateur->typeUtilisateur)
                  //       ->orWhereNull('id_type_utilisateur');
                  // })
                  ->orderBy('ordre')
                  ->get();
  
     /*  
      $menu = array();
      foreach ($menuApplication as $key => $value) {
        $menu[] = array('id_menu'=> $value['id_menu'], 'id_menu_sup' => $value['id_menu_sup'],
                             'lib_titre' => $value['lib_titre'], 'lib_route' => $value['lib_route'], 'lib_lien' => $value['lib_lien']);
      } */


      // Sinon on vérifie si le profil de la personne peut accéder à l'application


      return $menuApplication;
    }

}
