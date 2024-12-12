<?php

namespace App\Models;

use CodeIgniter\Model;

class ProduitModel extends Model
{
	protected $table = 'produit';
	protected $primaryKey = 'idproduit';

	protected $allowedFields = [
		'titreproduit',
		'photoproduit',
		'descriptionproduit',
		'prix',
		'valabilite',
		'affichage',
		'affichageaccueil'
	];

	protected $returnType = 'array';

	public function getProduit($idproduit)
	{
		return $this->where('idproduit', $idproduit)->first();
	}

	public function getProduitAffichage()
	{
		return $this->where('affichage', true)->findAll();
	}

	public function getProduitAffichageAcceuil()
	{
		return $this->where('affichageaccueil', 't')->findAll();
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
