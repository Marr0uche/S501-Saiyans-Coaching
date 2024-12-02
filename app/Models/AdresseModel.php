<?php

namespace App\Models;

use CodeIgniter\Model;

class AdresseModel extends Model
{
    protected $table = 'Adresse';
    protected $primaryKey = 'idadresse';
    protected $allowedFields = [
        'adresse',
        'ville',
        'code_postal',
        'pays',
        'region',
        'telephonefixe',
        'idutilisateuradresse'
    ];
    protected $returnType = 'array';

	public function getAdresse($idadresse)
	{
		return $this->where('idadresse', $idadresse)->first();
	}

	public function creerAdresse($adresseDonnee)
	{
		return $this->insert($adresseDonnee);
	}

	public function majAdresse($idadresse, $adresseDonnee)
	{
		return $this->update($idadresse, $adresseDonnee);
	}

	public function supprimerAdresse($idadresse)
	{
		return $this->delete($idadresse);
	}
}
