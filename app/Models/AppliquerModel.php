<?php

namespace App\Models;

use CodeIgniter\Model;

class AppliquerModel extends Model
{
    protected $table = 'appliquer';
    protected $primaryKey = 'idpromotion';

	protected $useAutoIncrement = false;

    protected $allowedFields = [
        'idproduit'
    ];
	
    protected $returnType = 'array';

	public function getAppliquer($idpromotion,$idproduit)
	{
		return $this->where('idpromotion', $idpromotion)->where('idproduit', $idproduit)->first();
	}

	public function creerAppliquer($appliquerDonnee)
	{
		return $this->insert($appliquerDonnee);
	}

	public function majAppliquer($idpromotion, $idproduit, $appliquerDonnee)
	{
		return $this->where('idpromotion', $idpromotion)->where('idproduit', $idproduit)->set($appliquerDonnee)->update();
	}

	public function supprimerAppliquer($idpromotion, $idproduit)
	{
		return $this->where('idpromotion', $idpromotion)->where('idproduit', $idproduit)->delete();
	}
}