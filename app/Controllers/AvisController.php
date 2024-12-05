<?php

namespace App\Controllers;

use App\Models\AcheterModel;
use CodeIgniter\Controller;

class AvisController extends Controller
{
	protected $acheterModel;

	public function __construct()
	{
		$this->acheterModel = new AcheterModel();
	}

	public function modifier($idProduit)
	{
		$session = session();
		if (!$session->has('client_id')) {
			return redirect()->to('/authentification')->with('error', 'Vous devez être connecté pour modifier un avis.');
		}

		$idClient = $session->get('client_id');
		$message = '';

		$achatExistant = $this->acheterModel->getAcheter($idClient, $idProduit);
		if (!$achatExistant) {
			return view('errors/html/error_404');
		}

		log_message('info', "Achat existant trouvé pour le client $idClient et le produit $idProduit : " . json_encode($achatExistant));

		if ($this->request->getMethod() === 'post') {
			$avis = $this->request->getPost('avis');
			$note = $this->request->getPost('note');

			log_message('info', "Avis reçu : " . $avis);
			log_message('info', "Note reçue : " . $note);

			if ($avis || $note) {
				if ($avis) {
					log_message('info', "Mise à jour de l'avis : " . $avis);
					$resultAvis = $this->acheterModel->update($idClient, $idProduit, ['avistemoignage' => $avis]);
					if (!$resultAvis) {
						log_message('error', "Échec de la mise à jour de l'avis pour le produit ID: $idProduit");
						$message = 'Erreur lors de la mise à jour de votre avis.';
					}
				}

				if ($note) {
					log_message('info', "Mise à jour de la note : " . $note);
					$resultNote = $this->acheterModel->update($idClient, $idProduit, ['notetemoignage' => $note]);
					if (!$resultNote) {
						log_message('error', "Échec de la mise à jour de la note pour le produit ID: $idProduit");
						$message = 'Erreur lors de la mise à jour de la note.';
					}
				}

				if ($avis || $note) {
					log_message('info', "Mise à jour de la date du témoignage : " . date('Y-m-d H:i:s'));
					$resultDate = $this->acheterModel->update($idClient, $idProduit, ['datetemoignage' => date('Y-m-d H:i:s')]);
					if (!$resultDate) {
						log_message('error', "Échec de la mise à jour de la date pour le produit ID: $idProduit");
						$message = 'Erreur lors de la mise à jour de la date.';
					}
				}

				if (empty($message)) {
					log_message('info', "Avis mis à jour avec succès pour le client ID: $idClient, produit ID: $idProduit");
					return redirect()->to('/produits/' . $idProduit)->with('success', 'Votre avis a été mis à jour avec succès.');
				}
			} else {
				$message = 'Tous les champs sont obligatoires.';
			}
		}

		return view('Utilisateur/AvisView', [
			'idProduit' => $idProduit,
			'message' => $message
		]);
	}
}
