<?php

namespace App\Controllers;

use App\Models\ProduitModel;
use App\Models\PromotionModel;
use App\Models\ClientModel;

class AccueilController extends BaseController
{
	public function index()
	{
		$clientModel = new ClientModel();
		
		if (!$clientModel->getAdmin()) {
			$data = [
				'nom' => 'nomAdmin',
				'prenom' => 'prenomAdmin',
				'mail' => 'admin@gmail.com',
				'motdepasse' => password_hash('password', PASSWORD_DEFAULT),
				'mobile' => 0000000000,
				'sexe' => 'Homme',
				'datenaissance' => '2024-12-11',
				'taille' => 000,
				'poidsdecorps' => 00,
				'admin' => true,
				'token' => bin2hex(random_bytes(16))
			];
	
			
			$clientModel->insert($data);
		}


		$produitModel = new ProduitModel();
		$listeProduitAcceuil = $produitModel->getProduitAffichageAcceuil();

		$promotionModel = new PromotionModel();
		$listePromotion = $promotionModel->findAll();

		return view('Accueil/HomeView.php', ['Acceuilliste' => $listeProduitAcceuil, 'promotion' => $listePromotion]);
	}
}
