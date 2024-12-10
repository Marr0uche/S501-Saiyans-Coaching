<?php
namespace App\Controllers;
class ContactController extends BaseController
{
	public function __construct()
	{
		helper(['form']);
	}

	public function index()
	{
		return view('Contact/ContactView.php');
	}

	public function send()
	{
		$validation = \Config\Services::validation();

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
			'telephone' => [
				'label' => 'Téléphone',
				'rules' => 'required|regex_match[/^[0-9+\-\s]+$/]|min_length[10]|max_length[15]',
				'errors' => [
					'required' => 'Le champ {field} est obligatoire.',
					'regex_match' => 'Le champ {field} doit contenir uniquement des chiffres, des espaces ou des signes + et -.',
					'min_length' => 'Le champ {field} doit contenir au moins {param} caractères.',
					'max_length' => 'Le champ {field} ne peut pas dépasser {param} caractères.'
				]
			],
			'message' => [
				'label' => 'Message',
				'rules' => 'required',
				'errors' => [
					'required' => 'Le champ {field} est obligatoire.',
					'min_length' => 'Le champ {field} doit contenir au moins {param} caractères.',
					'max_length' => 'Le champ {field} ne peut pas dépasser {param} caractères.'
				]
			]
		]);


		// Vérifier si les données sont valides
		if (!$this->validate($validation->getRules())) {
			return redirect()->back()->withInput()->with('validation', $this->validator);
		}

		// Récupérer les données du formulaire
		$nom = $this->request->getPost('nom');
		$email = $this->request->getPost('email');
		$message = $this->request->getPost('message');
		$telephone = $this->request->getPost('telephone');

		$emailService = \Config\Services::email();
		$emailService->setFrom($email, $nom);
		$emailService->setTo('mohamad.marrouche20047@gmail.com'); 
		$emailService->setSubject('Nouveau message de contact');
		$emailService->setMessage("Nom : $nom\nEmail : $email\n\nMessage :\n$message");

		if ($emailService->send()) {
			// Message de succès
			return redirect()->to('/contact')->with('success', 'Votre message a été envoyé avec succès.');
		} else {
			// Récupérer les erreurs d'envoi
			$error = $emailService->printDebugger(['headers']);
			log_message('error', 'Erreur lors de l\'envoi de l\'e-mail : ' . $error);

			// Rediriger avec un message d'erreur
			return redirect()->to('/contact')->with('error', 'Une erreur est survenue lors de l\'envoi de votre message. Veuillez réessayer.');
		}
	}
}