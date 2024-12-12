<?php

namespace App\Controllers;

use App\Models\AcheterModel;
use CodeIgniter\Log\Logger;

class AvisController extends BaseController
{
	public function ajouter($idProduit)
	{
		$session = session();
		$clientId = $session->get('client_id');

		$data = [
			'idclient' => $clientId,
			'idproduit' => $idProduit,
			'notetemoignage' => $this->request->getPost('noteTemoignage'),
			'datetemoignage' => date('Y-m-d H:i:s'),
			'avistemoignage' => $this->request->getPost('avisTemoignage')
		];

		$acheterModel = new AcheterModel();

		$acheterModel->majAcheter($clientId, $idProduit, $data);
		session()->setFlashdata('success', 'Votre avis a été mis à jour avec succès.');


		return redirect()->to('/achat/' . $clientId);
	}
}
