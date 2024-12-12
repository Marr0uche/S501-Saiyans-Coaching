<?php

namespace App\Controllers;

class QuestionnaireController extends BaseController
{
	public function __construct()
	{
		helper(['form']);
	}

	public function index()
	{
		return view('Accueil/QuestionnaireView.php');
	}

	public function traitementQuestionnaire()
	{
		$validation = \Config\Services::validation();
		$data = $this->request->getPost();

		$validation->setRules(
			[
				'nom' => [
					'label' => 'Nom',
					'rules' => 'required|alpha_space|min_length[2]|max_length[50]',
					'errors' => [
						'required' => 'Le champ {field} est obligatoire.',
						'alpha_space' => 'Le champ {field} ne peut contenir que des lettres et des espaces.',
						'min_length' => 'Le champ {field} doit contenir au moins {param} caractères.',
						'max_length' => 'Le champ {field} ne peut pas dépasser {param} caractères.'
					]
				],
				'email' => [
					'label' => 'Adresse e-mail',
					'rules' => 'required|valid_email',
					'errors' => [
						'required' => 'Le champ {field} est obligatoire.',
						'valid_email' => 'Le champ {field} doit contenir une adresse e-mail valide.'
					]
				],
				'sexe' => [
					'label' => 'Sexe',
					'rules' => 'required',
					'errors' => [
						'required' => 'Le champ {field} est obligatoire.',
					]
				],
				'niveau' => [
					'label' => 'Niveau de condition physique',
					'rules' => 'required',
					'errors' => [
						'required' => 'Le champ {field} est obligatoire.',
					]
				],
				'temps' => [
					'label' => 'Temps hebdomadaire',
					'rules' => 'required',
					'errors' => [
						'required' => 'Le champ {field} est obligatoire.',
					]
				],
				'preference' => [
					'label' => 'Préférences de suivi',
					'rules' => 'required',
					'errors' => [
						'required' => 'Le champ {field} est obligatoire.',
					]
				],
				'style_coaching' => [
					'label' => 'Style de coaching',
					'rules' => 'required',
					'errors' => [
						'required' => 'Le champ {field} est obligatoire.',
					]
				],
				'nutrition' => [
					'label' => 'Conseils nutritionnels',
					'rules' => 'required',
					'errors' => [
						'required' => 'Le champ {field} est obligatoire.',
					]
				]
			]
		);

		if (!$validation->withRequest($this->request)->run()) {
			session()->setFlashdata('error', 'Merci de remplir tous les champs obligatoires.');
			return redirect()->to('/questionnaire')->withInput()->with('validation', $validation);
		} else {
			$responses =
				[
					'nom' => $data['nom'],
					'email' => $data['email'],
					'sexe' => $data['sexe'],
					'objectifs' => !empty($data['objectifs']) ? implode(', ', $data['objectifs']) : 'Non spécifié',
					'autre_objectif' => $data['autre_objectif'] ?? '',
					'niveau' => $data['niveau'],
					'temps' => $data['temps'],
					'contraintes' => $data['contraintes'] === 'Oui' ? $data['details_contraintes'] : 'Aucune',
					'activites' => !empty($data['objectifs']) ? implode(', ', $data['objectifs']) : 'Non spécifié',
					'autre_activite' => $data['autre_objectif'] ?? '',
					'preference' => $data['preference'],
					'resultats' => $data['resultats'],
					'style_coaching' => $data['style_coaching'],
					'nutrition' => $data['nutrition'],
					'informations_supplementaires' => $data['informations_supplementaires'],
				];

			$message = "";
			foreach ($responses as $key => $value) {
				$message .= $key . ' : ' . $value . '<br>';
			}

			$emailService = \Config\Services::email();
			$emailService->setFrom($responses['email'], $responses['nom']);
			$emailService->setTo('mohamad.marrouche20047@gmail.com');
			$emailService->setSubject('Questionnaire Identification Programme');
			$emailService->setMessage("$message");

			if ($emailService->send()) {
				return redirect()->to('/')->with('success', 'Votre message a été envoyé avec succès.');
			} else {
				$error = $emailService->printDebugger(['headers']);
				log_message('error', 'Erreur lors de l\'envoi de l\'e-mail : ' . $error);

				return redirect()->to('/')->with('error', 'Une erreur est survenue lors de l\'envoi de votre message. Veuillez réessayer.');
			}
		}
	}
}
