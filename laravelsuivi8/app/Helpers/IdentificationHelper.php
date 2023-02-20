<?php
namespace App\Helpers;

use App\Models\Absences\ComportementAgent;
use App\Models\Ent\DroitUtilisateur;
use App\Models\Ent\Menu;
use Illuminate\Support\Facades\Log;
use App\Models\Ent\Utilisateur;
use Session;

class IdentificationHelper{
  /**
     * @param idAppli
     * @param accesRestreint 2 accès uniquement au personnel, 1 accèes personnel et ext, 0 accès à tous (aussi aux étudiants)
     * @return bool
     */
  public static function identification($idAppli, $accesRestreint=2){
    $error = '';
    // On récupère l'environnement
    if (getenv('SHIBBOLETH') == 'yes'){
      // On récupère le mail depuis shibboleth
    }
    else {
      // Pour les tests en local
      $supannAutreMail = getenv('MAIL_TEST');
      $shibUID = getenv('MAIL_TEST');
      $mail = getenv('MAIL_TEST');
      $profil = getenv('PROFIL_TEST');
      $prenom = 'Prenom';
      $nom = 'NOM';
    }

    if ($mail == ''){
      $error = 'Vous n\'êtes pas identifié.';
    }
    elseif (($profil == 'student') && ($accesRestreint > 0 )) {
      $error = "Vous ne pouvez pas accéder à cette application.";
    }
    elseif (($profil == 'affiliate') && ($accesRestreint > 1 )) {
      $error = "Vous ne pouvez pas accéder à cette application.";
    }
    //etudiant pour l'audit de la DRIPA
    elseif($shibUID == 'etudiant1.audit@etu.imt-lille-douai.fr'){
      $error = 'Vous ne pouvez pas accéder à cette application.';
    }
    elseif (Session::has('MAIL') == ''){
      // Pas de session en cours, on va tout chercher
      $error = self::miseSessionInfos($mail, $shibUID, $supannAutreMail, $profil, $nom, $prenom);
      if($error == ''){
        $error = self::miseSessionDroits($idAppli);
      }
      if($error == ''){
        $error = self::miseSessionMenu($idAppli);
      }
    }
    else{
      // Déjà une session en cours, on ne récupère que le menu et les droits de la nouvelle application
      if (Session::has("IM_DROIT_".$idAppli) == ''){
        // Mail mais pas les droits pour cette appli
        $error = self::miseSessionDroits($idAppli);
      }

      if (Session::has("MENU_".$idAppli) == ''){
        // Mail mais pas les droits pour cette appli
        $error = self::miseSessionMenu($idAppli);
      }  
    }

    if (!empty($error)){
      Log::error('Login error: '.$mail);
    }

    return $error;
  }

  public static function miseSessionInfos($mail, $shibUID, $supannAutreMail, $profil, $nom, $prenom){
    $error = '';
    //On récupère toutes les infos de l'utilisateur
    $user = Utilisateur::getUtilisateurByMail($mail);

    // Teste si la personne existe dans la bd
    if ($user == null) {
      $error = "Impossible de récupérer le compte associé au mail " . $mail . ".";
    }
    else {
      $idUtilisateur = $user['ID_UTILISATEUR'];
      
      // On met les infos dans une session
      Session::put("MAIL", $mail);
      Session::put("PROFIL", $profil);
      Session::put("ID_UTILISATEUR", $idUtilisateur);
      Session::put("IM_LIB_PRENOM", $prenom);
      Session::put("IM_LIB_NOM", $nom);

      if (($profil == 'employee') || ($profil == 'faculty') || ($profil == 'researcher')) {
        //
      }
      elseif ($profil == 'student'){
        Session::put("IM_COD_ENTITE", 0);
        $promo = 'Non récupérée';
        if(isset($_SERVER['imtldPromo']) && isset($_SERVER['imtldAnneeSortie']))
          $promo = $_SERVER['imtldPromo']."-".$_SERVER['imtldAnneeSortie'];
        Session::put("IM_PROMO", $promo);
      }
      else if (($profil == 'affiliate')) { 
        Session::put("IM_COD_ENTITE", 0);
      }
      Log::info('User logged: '.$mail." profil:".$profil);
    }
    return $error;
  }

  public static function miseSessionDroits($idAppli){
    $error = '';
    // On va chercher les droits et le menu
    if (Session::has("IM_DROIT_".$idAppli) == ''){
      $droit = 1;  ///IL A LES DROITS
      Session::put("IM_DROIT_".$idAppli, $droit);
    }

    // TODO IF
    if (Session::has("IM_DROITS_ACCES_".$idAppli) == ''){
      Session::put("IM_DROITS_ACCES_".$idAppli, "1");
    }
    return $error;
  }

  public static function miseSessionMenu($idAppli){
    $error = '';
    if (Session::has("MENU_".$idAppli) == ''){
      $estGestionnaire = 0;
      $estAdmin = 0;
      $estResponsable = 0;
      Session::put("MENU_".$idAppli, Menu::getMenu($idAppli, $estResponsable, $estGestionnaire, $estAdmin));
    }
    return $error;
  }
}
