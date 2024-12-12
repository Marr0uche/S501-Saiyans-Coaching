<?php

namespace App\Controllers;

use App\Models\ClientModel;
use App\Models\AcheterModel;
use CodeIgniter\Controller;
use App\Models\ProduitModel;

class AchatController extends Controller
{
	public function indexAchat($clientId)
	{
		$achat = new AcheterModel();
		$listeAchat = $achat->getProduitsAchetes($clientId);
		$commentaire = $achat->getCommentaire($clientId);

		return view('Produit/ProduitClientView', [
			'achat' => $listeAchat,
			'commentaire' => $commentaire
		]);
	}

	public function ajouter($produitId)
	{
		$acheterModel = new AcheterModel();

		$session = session();
		$clientId = $session->get('client_id');

		$promo = $session->get('codepromo');
		$idDocument = $promo ? $promo['iddocument'] : null;

		$acheterModel->ajouterAchat($produitId, $clientId, $idDocument);

		$session->remove('codepromo');
		return view('Achat/AchatConfirme');
	}

	public function confirme()
	{
		return view('Achat/AchatConfirme');
	}
}
