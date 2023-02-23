<?php

namespace App\Models\Ent;
use Session;
use Illuminate\Database\Eloquent\Model;

class DroitUtilisateur extends Model
{
	use \App\Models\Traits\HasCompositePrimaryKey;

  protected $connection = 'ent';
  protected $table = 'droit_utilisateur';
	protected $primaryKey = array('ID_APPLICATION', 'ID_UTILISATEUR', 'COD_DROIT');
	protected $keyType = array('int', 'int', 'int');
  public $timestamps = false;  // Ne pas mettre à jour les colonnes created_at et updated_at
  public $incrementing = false; // Pour l'id unique

  protected $guarded = [];

	public function utilisateur() {
		return $this->belongsTo('App\Models\Ent\Utilisateur', 'ID_UTILISATEUR', 'ID_UTILISATEUR');
	}

	public function droitLibelle() {
		return $this->belongsTo('App\Models\Ent\DroitLibelle', ['ID_APPLICATION', 'COD_DROIT'], ['ID_APPLICATION', 'COD_DROIT']);
	}

	public static function getDroit($idUtilisateur, $idApplication) {
		$droit = self::select('cod_droit')
									->where('id_utilisateur', '=', $idUtilisateur)
									->where('id_application', '=', $idApplication)
									->first();
		if(isset($droit))
			return $droit->cod_droit;
		else 
			return 0;
	}

	public static function estAdmin($idUtilisateur, $idApplication){
		// Si les droits ne sont pas en session, on va les chercher dans la bd
		$droit = 0;
		if(Session::has("IM_DROIT_".$idApplication) == ''){
			$droit = self::getDroits($idUtilisateur, $idApplication);
		}
		else{
			$droit = Session('IM_DROIT_'.$idApplication);
		}
		return $droit >= 2;
  }

}
