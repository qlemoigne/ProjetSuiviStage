<?php

namespace App\Models\Ent;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\DateHelper;
use App\Models\Ent\DroitApplicationUtilisateur;

use Illuminate\Support\Facades\Log;
use Session;

class Utilisateur extends Model
{
  protected $connection = 'suivi';
  protected $table = 'utilisateur';
  protected $primaryKey = 'id_utilisateur';

  public $timestamps = false;  // Ne pas mettre à jour les colonnes created_at et updated_at
  public $incrementing = false; // Pour l'id unique

  protected $guarded = [];

  public static function getUtilisateurByMail($mail) {
	  $mailNE = str_replace("lille-douai","nord-europe",$mail);
    $utilisateur = self::where('LIB_ADR_MAIL', '=', $mail)
                ->orwhere('LIB_ADR_MAIL', '=', $mailNE)
                ->first();
    if($utilisateur)
      return $utilisateur->getAttributes();
    else
      return null;       
  }

  public static function getNom($idUtilisateur){
    $nomAAfficher = "";
    $infos = self::getUtilisateurById($idUtilisateur);
    if($infos){
      $nomAAfficher = $infos['LIB_PRENOM']." ".$infos['LIB_NOM'];
    }
    return $nomAAfficher;
  }
}
