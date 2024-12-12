<?php

namespace App\Controllers;

use App\Models\ClientModel;

class MdpOublieController extends BaseController
{
	public function demanderEmail()
	{
		return view('Utilisateur/MdpOublieView');
	}

	public function envoyerEmail()
	{
		$email = $this->request->getPost('email');
		$clientModel = new ClientModel();
		$client = $clientModel->where('mail', $email)->first();

		if (!$client) {
			return redirect()->back()->with('error', 'Adresse email non trouvée.');
		}

		$token = bin2hex(random_bytes(32));
		$clientModel->update($client['idclient'], ['token' => $token]);

		$lienReinitialisation = site_url('mdp-oublie/reinitialiser/' . $token);

		$emailService = \Config\Services::email();

		$emailService->setTo($email);
		$emailService->setFrom('mitsukiikha76@gmail.com', 'Coaching');
		$emailService->setSubject('Réinitialisation de votre mot de passe');
		$emailService->setMessage("
        <p>Bonjour,</p>
        <p>Nous avons reçu une demande pour réinitialiser votre mot de passe. Veuillez cliquer sur le lien ci-dessous pour le réinitialiser :</p>
        <p><a href='{$lienReinitialisation}'>{$lienReinitialisation}</a></p>
        <p>Si vous n'avez pas fait cette demande, ignorez cet email.</p>
        <p>Merci,</p>
        <p>L'équipe de support</p>
    ");

		if ($emailService->send()) {
			return redirect()->back()->with('success', 'Un lien de réinitialisation a été envoyé à votre adresse email.');
		} else {
			$data = $emailService->printDebugger(['headers']);
			log_message('error', 'Échec de l\'envoi de l\'email : ' . $data);
			return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'envoi de l\'email.');
		}
	}

	public function afficherFormulaireReinitialisation($token)
	{
		$clientModel = new ClientModel();
		$client = $clientModel->where('token', $token)->first();

		if (!$client) {
			return redirect()->to('/')->with('error', 'Lien invalide ou expiré.');
		}

		return view('Utilisateur/ReinitialiserMdpView', ['token' => $token]);
	}

	public function reinitialiserMotDePasse()
	{
		$token = $this->request->getPost('token');
		$password = $this->request->getPost('password');
		$passwordConfirm = $this->request->getPost('password_confirm');

		if ($password !== $passwordConfirm) {
			return redirect()->back()->with('error', 'Les mots de passe ne correspondent pas.');
		}

		$clientModel = new ClientModel();
		$client = $clientModel->where('token', $token)->first();

		if (!$client) {
			return redirect()->to('/')->with('error', 'Lien invalide ou expiré.');
		}

		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
		$clientModel->update($client['idclient'], ['motdepasse' => $hashedPassword, 'token' => null]);

		return redirect()->to('/authentification')->with('success', 'Mot de passe réinitialisé avec succès.');
	}
}
