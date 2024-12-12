<?php

namespace App\Controllers;

use App\Models\ProduitModel;
use App\Models\PromotionModel;

class AccueilController extends BaseController
{
	public function index()
	{

		$produitModel = new ProduitModel();
		$listeProduitAcceuil = $produitModel->getProduitAffichageAcceuil();

		$promotionModel = new PromotionModel();
		$listePromotion = $promotionModel->findAll();

		return view('Accueil/HomeView.php', ['Acceuilliste' => $listeProduitAcceuil, 'promotion' => $listePromotion]);
	}
}
