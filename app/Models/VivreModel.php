<?php

namespace App\Models;

use CodeIgniter\Model;

class ProduitModel extends Model
{
	protected $table = 'vivre';
	protected $primaryKey = 'idclient';
	protected $useAutoIncrement = false;

	protected $allowedFields = [
		'idadresse'
	];

	protected $returnType = 'array';

	public function getVivre($idclient, $idadresse)
	{
		return $this->where('idclient', $idclient)->where('idadresse', $idadresse)->first();
	}

	public function creerVivre($vivreDonnee)
	{
		return $this->insert($vivreDonnee);
	}

	public function majVivre($idclient, $idadresse, $vivreDonnee)
	{
		return $this->where('idclient', $idclient)->where('idadresse', $idadresse)->set($vivreDonnee)->update();
	}

	public function supprimerVivre($idclient, $idadresse)
	{
		return $this->where('idclient', $idclient)->where('idadresse', $idadresse)->delete();
	}
}
