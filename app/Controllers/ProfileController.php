<?php

namespace App\Controllers;

use App\Models\ClientModel;
use CodeIgniter\Controller;

class ProfileController extends Controller
{
	public function index()
	{
		$clientId = session()->get('client_id'); // On suppose que l'ID du client est stocké en session
		if (!$clientId) {
			return redirect()->to('/authentification');
		}

		$clientModel = new ClientModel();
		$client = $clientModel->find($clientId);
		

		if (!$client) {
			session()->setFlashdata('error', 'Utilisateur introuvable.');
			return redirect()->to('/authentification');
		}

		return view('Utilisateur/ProfileView', ['client' => $client]);
	}

	public function modifier()
	{
		$clientId = session()->get('client_id');
		if (!$clientId) {
			return redirect()->to('/authentification');
		}

		$validation = \Config\Services::validation();

		$validation->setRules([
			'nom' => 'required|min_length[3]',
			'prenom' => 'required|min_length[3]',
			'mail' => 'required|valid_email',
			'mobile' => 'required|numeric|min_length[10]',
			'taille' => 'required|numeric',
			'poidsdecorps' => 'required|numeric',
			'motdepasse' => 'permit_empty|min_length[6]',
		]);

		if (!$validation->withRequest($this->request)->run()) {
			return redirect()->back()->withInput()->with('validation', $validation);
		}

		$data = [
			'nom' => $this->request->getPost('nom'),
			'prenom' => $this->request->getPost('prenom'),
			'mail' => $this->request->getPost('mail'),
			'mobile' => $this->request->getPost('mobile'),
			'taille' => $this->request->getPost('taille'),
			'poidsdecorps' => $this->request->getPost('poidsdecorps'),
		];

		if ($this->request->getPost('motdepasse')) {
			$data['motdepasse'] = password_hash($this->request->getPost('motdepasse'), PASSWORD_DEFAULT);
		}

		$clientModel = new ClientModel();
		if ($clientModel->update($clientId, $data)) {
			session()->setFlashdata('success', 'Profil mis à jour avec succès.');
		} else {
			session()->setFlashdata('error', 'Une erreur est survenue. Veuillez réessayer.');
		}

		return redirect()->to('/profile');
	}
}
