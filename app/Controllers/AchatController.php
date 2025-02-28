<?php

namespace App\Controllers;

use App\Models\ClientModel;
use App\Models\AcheterModel;
use CodeIgniter\Controller;
use App\Models\ProduitModel;
use App\Models\DocumentModel;

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

		$documentModel = new DocumentModel();
		$doc = $documentModel->getDocumentFromTitre($promo['titredocument']);
		$acheterModel->ajouterAchat($produitId, $clientId, $doc['iddocument']);

		$session->remove('codepromo');
		return view('Achat/AchatConfirme');
	}

    public function confirme()
    {
        return view('Achat/AchatConfirme');
    }

    public function allachat()
    {
        $session = session();
		$admin = $session->get('admin');
		$connexion = $session->get('client_id');
		if ($admin === 'f' or $connexion === null) {
			return redirect()->to('/');
		}

        $achat = new AcheterModel();
        $listeAchat = $achat->findAll();
        
        return view('Achat/AllAchatView',[
            'listeachat'=>$listeAchat
        ]);
    }   
}
