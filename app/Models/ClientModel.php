<?php
namespace App\Models;
use CodeIgniter\Model;
class ClientModel extends Model
{
    protected $table = 'Client';
    protected $primaryKey = 'idclient';
    protected $allowedFields = [
        'sexe',
        'age',
        'taille',
        'poids_de_corps',
        'produits'
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
