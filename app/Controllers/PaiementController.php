<?php

namespace App\Controllers;

use App\Models\ClientModel;
use App\Models\ProduitModel;

class PaiementController extends BaseController
{
	public function afficherPagePaiement($produitId, $prixreel)
	{
		$session = session();
		$clientId = $session->get('client_id');

		if (!$clientId) {
			return redirect()->to('/authentification')->with('error', 'Veuillez vous connecter pour continuer.');
		}

		if (!$clientId || !$produitId) {
			return redirect()->to('/')->with('error', 'Session invalide ou expirée.');
		}

		$clientModel = new ClientModel();
		$produitModel = new ProduitModel();

		$client = $clientModel->find($clientId);
		$produit = $produitModel->find($produitId);

		if (!$client || !$produit) {
			return redirect()->to('/')->with('error', 'Données non trouvées.');
		}

		return view('Produit/PaiementView', [
			'client' => $client,
			'produit' => $produit,
			'prixreel' => $prixreel
		]);
	}
}
