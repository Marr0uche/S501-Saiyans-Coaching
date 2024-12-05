<?php

namespace App\Models;

use CodeIgniter\Model;

class AcheterModel extends Model
{
	protected $table = 'acheter';
	protected $primaryKey = ['idclient', 'idproduit'];

	protected $useAutoIncrement = false;

	protected $allowedFields = [
		'idproduit',
		'notetemoignage',
		'datetemoignage',
		'avistemoignage',
		'idpromotion'
	];

	protected $returnType = 'array';

	public function getAcheter($idclient, $idproduit)
	{
		return $this->where('idclient', $idclient)
			->where('idproduit', $idproduit)
			->first();
	}

	public function getAcheterProduit($idproduit)
	{
		return $this->where('idproduit', $idproduit)->findAll();
	}

	public function creerAcheter($acheterDonnee)
	{
		return $this->insert($acheterDonnee);
	}

	public function majAcheter($idclient, $idproduit, $acheterDonnee)
	{
		$existingRow = $this->where('idclient', $idclient)
			->where('idproduit', $idproduit)
			->first();

		if ($existingRow) {
			return $this->where('idclient', $idclient)
				->where('idproduit', $idproduit)
				->set($acheterDonnee)
				->update();
		} else {
			return false;
		}
	}


	public function supprimerAcheter($idclient, $idproduit)
	{
		return $this->where('idclient', $idclient)->where('idproduit', $idproduit)->delete();
	}
}
