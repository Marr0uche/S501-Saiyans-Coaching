<?php

namespace App\Controllers;

use App\Models\AcheterModel;
use CodeIgniter\Log\Logger;

class AvisController extends BaseController
{
	public function ajouter($idProduit)
	{
		$logger = service('logger');
		$logger->info("AvisController::ajouter() appelé avec idProduit = $idProduit");

		$session = session();
		$idClient = $session->get('client_id');

		if (!$idClient) {
			$logger->warning("Utilisateur non authentifié. Redirection vers la page d'authentification.");
			return redirect()->to('/authentification');
		}

		$acheterModel = new AcheterModel();

		$achat = $acheterModel->getAcheter($idClient, $idProduit);
		$logger->info("Vérification de l'achat pour idClient = $idClient et idProduit = $idProduit", [
			'result' => $achat
		]);

		if (!$achat) {
			$logger->warning("L'utilisateur $idClient n'a pas acheté le produit $idProduit. Redirection vers l'accueil.");
			return redirect()->to('/')->with('error', 'Vous ne pouvez pas donner un avis sur un produit que vous n\'avez pas acheté.');
		}

		if ($this->request->getMethod() === 'post') {
			$noteTemoignage = $this->request->getPost('noteTemoignage');
			$avisTemoignage = $this->request->getPost('avisTemoignage');
			$dateTemoignage = date('Y-m-d H:i:s');

			$logger->info("Requête POST reçue. Données extraites : ", [
				'noteTemoignage' => $noteTemoignage,
				'avisTemoignage' => $avisTemoignage,
				'dateTemoignage' => $dateTemoignage
			]);

			$supprimé = $acheterModel->supprimerAcheter($idClient, $idProduit);
			$logger->info("Résultat de la suppression de l'ancien avis :", ['success' => $supprimé]);

			$data = [
				'idClient' => $idClient,
				'idProduit' => $idProduit,
				'notetemoignage' => $noteTemoignage,
				'datetemoignage' => $dateTemoignage,
				'avistemoignage' => $avisTemoignage,
			];

			$result = $acheterModel->creerAcheter($data);
			$logger->info("Résultat de l'insertion du nouvel avis :", [
				'data' => $data,
				'success' => $result
			]);

			if ($result) {
				$logger->info("Avis inséré avec succès pour idClient = $idClient et idProduit = $idProduit.");
				return redirect()->to('/')->with('message', 'Votre avis a été enregistré avec succès.');
			} else {
				$logger->error("Échec de l'insertion de l'avis pour idClient = $idClient et idProduit = $idProduit.");
				return redirect()->back()->with('error', 'Une erreur est survenue. Veuillez réessayer.');
			}
		}

		$logger->info("Affichage du formulaire d'avis pour idProduit = $idProduit");
		return view('Utilisateur/AvisView', ['idProduit' => $idProduit]);
	}
}
