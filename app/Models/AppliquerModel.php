<?php

namespace App\Models;

use CodeIgniter\Model;

class AppliquerModel extends Model
{
    protected $table = 'appliquer';
    protected $primaryKey = 'iddocument';

	protected $useAutoIncrement = false;

    protected $allowedFields = [
        'idproduit'
    ];
	
    protected $returnType = 'array';

	public function getAppliquer($iddocument,$idproduit)
	{
		return $this->where('iddocument', $iddocument)->where('idproduit', $idproduit)->first();
	}

	public function creerAppliquer($appliquerDonnee)
	{
		return $this->insert($appliquerDonnee);
	}

	public function majAppliquer($iddocument, $idproduit, $appliquerDonnee)
	{
		return $this->where('iddocument', $iddocument)->where('idproduit', $idproduit)->set($appliquerDonnee)->update();
	}

	public function supprimerAppliquer($iddocument, $idproduit)
	{
		return $this->where('iddocument', $iddocument)->where('idproduit', $idproduit)->delete();
	}
}