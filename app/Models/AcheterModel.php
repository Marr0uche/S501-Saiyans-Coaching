<?php

namespace App\Models;

use CodeIgniter\Model;

class AcheterModel extends Model
{
	protected $table = 'acheter';
	protected $primaryKey = 'idclient';
	protected $useAutoIncrement = false;

	protected $allowedFields = [
		'idproduit',
		'notetemoignage',
		'datetemoignage',
		'avistemoignage',
		'iddocument'
	];

	protected $returnType = 'array';

	public function getAcheter($idclient, $idproduit)
	{
		return $this->where('idclient', $idclient)
			->where('idproduit', $idproduit)
			->first();
	}

	public function getProduitsAchetes($idClient)
	{
		return $this->select('produit.*')
			->join('produit', 'acheter.idproduit = produit.idproduit')
			->where('acheter.idclient', $idClient)
			->findAll();
	}

	public function getCommentaire($idclient)
	{
		return $this->where('idclient', $idclient)->findAll();
	}

	public function getAcheterProduit($idproduit)
	{
		return $this->where('idproduit', $idproduit)->findAll();
	}

	public function creerAcheter($acheterDonnee)
	{
		return $this->insert($acheterDonnee);
	}

	public function ajouterAchat($idproduit, $idclient, $idDocument = null)
	{
		$acheterDonnee = [
			'idclient' => $idclient,
			'idproduit' => $idproduit,
			'notetemoignage' => null,
			'datetemoignage' => null,
			'avistemoignage' => null,
			'iddocument' => $idDocument
		];

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
