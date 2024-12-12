<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{
	protected $table = 'client';
	protected $primaryKey = 'idclient';

	protected $allowedFields = [
		'admin',
		'nom',
		'prenom',
		'mail',
		'motdepasse',
		'mobile',
		'sexe',
		'datenaissance',
		'taille',
		'poidsdecorps',
		'token'
	];

	protected $returnType = 'array';

	public function getClient($idclient)
	{
		return $this->where('idclient', $idclient)->first();
	}

	public function creerClient($clientDonnee)
	{
		return $this->insert($clientDonnee);
	}

	public function majClient($idclient, $clientDonnee)
	{
		return $this->update($idclient, $clientDonnee);
	}

	public function supprimerClient($idclient)
	{
		return $this->delete($idclient);
	}
}
