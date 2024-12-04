<?php

namespace App\Controllers;

use App\Models\ClientModel;
use CodeIgniter\Controller;

class AuthentificationController extends Controller
{
	public function index()
	{
		return view('Utilisateur/AuthentificationView');
	}

	public function connexion()
	{
		$validation = \Config\Services::validation();

		$validation->setRules([
			'email' => 'required|valid_email',
			'motdepasse' => 'required|min_length[6]',
		]);

		if (!$validation->withRequest($this->request)->run()) {
			return view('Utilisateur/AuthentificationView', [
				'validation' => $validation,
			]);
		}

		$email = $this->request->getPost('email');
		$motdepasse = $this->request->getPost('motdepasse');

		$clientModel = new ClientModel();
		$client = $clientModel->where('mail', $email)->first();

		if ($client && password_verify($motdepasse, $client['motdepasse'])) {
			session()->set('client_id', $client['idclient']);
			session()->set('admin', $client['admin']);
			return redirect()->to('/dashboard');
		} else {
			session()->setFlashdata('error', 'Identifiants incorrects');
			return redirect()->back()->withInput();
		}
	}

	public function deconnexion()
	{
		session()->destroy();
		return redirect()->to('/authentification');
	}
}
