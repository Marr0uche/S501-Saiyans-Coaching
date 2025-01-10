<?php

namespace App\Controllers;

use App\Models\ClientModel;
use CodeIgniter\Controller;

class InscriptionController extends Controller
{
	public function index()
	{
		return view('Utilisateur/InscriptionView');
	}

	public function creer()
	{
		$validation = \Config\Services::validation();

		$validation->setRules([
			'nom' => 'required|min_length[3]',
			'prenom' => 'required|min_length[3]',
			'mail' => 'required|valid_email|is_unique[client.mail]',
			'motdepasse' => 'required|min_length[6]',
			'mobile' => 'required|numeric|min_length[10]',
			'sexe' => 'required',
			'datenaissance' => 'required|valid_date[Y-m-d]',
			'taille' => 'required|numeric',
			'poidsdecorps' => 'required|numeric',
		]);

		if (!$validation->withRequest($this->request)->run()) {
			session()->setFlashdata('error', 'Une erreur est survenue. Veuillez réessayer.');
			return redirect()->back()->withInput();
		}

		$data = [
			'nom' => $this->request->getPost('nom'),
			'prenom' => $this->request->getPost('prenom'),
			'mail' => $this->request->getPost('mail'),
			'motdepasse' => password_hash($this->request->getPost('motdepasse'), PASSWORD_DEFAULT),
			'mobile' => $this->request->getPost('mobile'),
			'sexe' => $this->request->getPost('sexe'),
			'datenaissance' => $this->request->getPost('datenaissance'),
			'taille' => $this->request->getPost('taille'),
			'poidsdecorps' => $this->request->getPost('poidsdecorps'),
			'admin' => false,
			'token' => bin2hex(random_bytes(16))
		];

		$clientModel = new ClientModel();
		if ($clientModel->insert($data)) {
			session()->setFlashdata('success', 'Inscription réussie, vous pouvez vous connecter.');
			return redirect()->to('/authentification');
		} else {
			session()->setFlashdata('error', 'Une erreur est survenue. Veuillez réessayer.');
			return redirect()->back()->withInput();
		}
	}
}
