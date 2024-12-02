<?php

namespace App\Models;

use CodeIgniter\Model;

class ProduitModel extends Model
{
    protected $table = 'Produit';
    protected $primaryKey = 'idproduit';
    protected $allowedFields = [
        'titre',
        'photo',
        'description',
        'prix'
    ];
    protected $returnType = 'array';

	public function getProduit($idproduit)
	{
		return $this->where('idproduit', $idproduit)->first();
	}

	public function creerProduit($produitDonnee)
	{
		return $this->insert($produitDonnee);
	}

	public function majProduit($idproduit, $produitDonnee)
	{
		return $this->update($idproduit, $produitDonnee);
	}

	public function supprimerProduit($idproduit)
	{
		return $this->delete($idproduit);
	}
}
