<?php

namespace App\Controllers;

use App\Models\ClientModel;
use App\Models\ProduitModel;

class PaiementController extends BaseController
{
	public function afficherPagePaiement()
	{
		$session = session();
		$clientId = $session->get('client_id');
		$produitId = $session->get('produit_id');

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

		return view('PaiementView', [
			'client' => $client,
			'produit' => $produit,
		]);
	}

	public function traiterPaiement()
	{
		$session = session();
		$clientId = $session->get('client_id');
		$produitId = $session->get('produit_id');

		if (!$clientId || !$produitId) {
			return redirect()->to('/')->with('error', 'Session invalide ou expirée.');
		}

		return redirect()->to('/confirmation')->with('success', 'Paiement effectué avec succès.');
	}
}
