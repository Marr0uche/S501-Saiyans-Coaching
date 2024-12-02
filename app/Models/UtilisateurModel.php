<?php

namespace App\Models;

use CodeIgniter\Model;

class UtilisateurModel extends Model
{
    protected $table = 'utilisateur';
    protected $primaryKey = 'idutilisateur';
    protected $allowedFields = [
        'type',
        'nom',
        'prenom',
        'adresse_email',
        'motdepasse',
        'adresse',
        'Tel'
    ];
    protected $returnType = 'array';

	public function getUtil($utilId)
	{
		return $this->where('idutilisateur', $utilId)->first();
	}

	public function creerUtil($utilDonnee)
	{
		return $this->insert($utilDonnee);
	}

	public function majUtil($utilId, $infoDonnee)
	{
		return $this->update($utilId, $infoDonnee);
	}

	public function supprimerUtil($utilId)
	{
		return $this->delete($utilId);
	}

}
