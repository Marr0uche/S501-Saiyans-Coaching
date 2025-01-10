<?php

namespace App\Controllers;

use App\Models\DocumentModel;
use CodeIgniter\Controller;
use Config\Pager;
use App\Models\AcheterModel;
use App\Models\PromotionModel;

class PromotionController extends Controller
{
	public function __construct()
	{
		helper(filenames: ['form']);
	}

	public function index()
	{
		$promotionModel = new PromotionModel();
		$listePromotion = $promotionModel->findAll();

		return view('Promos/PromotionView', ['listePromotion' => $listePromotion]);
	}

	public function valider()
	{
		$codepromo = $this->request->getPost('codepromo');

		$promotionModel = new PromotionModel();

		$promotion = $promotionModel->where('codepromo', $codepromo)
			->where('active', true)
			->first();

		if (!$promotion) {
			return redirect()->back()->with('error', 'Le code promo est invalide ou inactif.');
		}

		$session = session();
		$session->set('codepromo', $promotion);

		$promo = $session->get('codepromo');
		echo $promo['reductionpromo'];

		return redirect()->back()->with('success', 'Code promo appliqué avec succès.');
	}

	public function creerView()
	{
		return view('Promos/CreerPromoView');
	}

	public function supprimer($idPromos)
	{
		$promos = new PromotionModel();

		$promos->supprimerPromotion($idPromos);
		return redirect()->to('/produit/dashboard');
	}

	public function creer()
	{
		$validationRules = [
			'titredocument' => 'required|string|max_length[255]',
			'descriptiondocument' => 'required|string',
			'active' => 'required|in_list[true,false]',
			'reductionpromo' => 'required|decimal',
			'codepromo' => 'required|string|max_length[20]'
		];

		$promos = new PromotionModel();

		$dataDoc = [
			'titredocument' => $this->request->getPost('Titre'),
			'descriptiondocument' => $this->request->getPost('descriptiondocument')
		];
		$documentModel = new DocumentModel();
		$documentModel->creerDocument($dataDoc);

		$data = [
			'titredocument' => $this->request->getPost('Titre'),
			'descriptiondocument' => $this->request->getPost('descriptiondocument'),
			'active' => $this->request->getPost('active') === 'true',
			'reductionpromo' => $this->request->getPost('reduc'),
			'codepromo' => $this->request->getPost('codepromo')
		];

		if (!$promos->validate($data)) {

			return redirect()->back()->withInput()->with('errors', $promos->errors());
		}
		$promos->creerPromotion($data);
		return redirect()->to('/produit/dashboard');
	}

	public function modifier()
	{
		$promos = new PromotionModel();

		$idPromo = $this->request->getPost('idpromotion');

		if (!is_numeric($idPromo)) {
			return redirect()->back()->with('error', 'ID Projet invalide.');
		}

		$active = $this->request->getPost('active');

		if (isset($active)) {
			$active = 't';
		} else {
			$active = 'f';
		}

		$data = [
			'titredocument' => $this->request->getPost('titrepromotion'),
			'descriptiondocument' => $this->request->getPost('DescriptionPromotion'),
			'reductionpromo' => $this->request->getPost('reduc'),
			'codepromo' => $this->request->getPost('code'),
			'active' => $active
		];

		echo $idPromo . '<br>';
		foreach ($data as $key => $value) {
			echo $key . ' : ' . $value . '<br>';
		}

		$promos->majPromotion($idPromo, $data);
		return redirect()->to('/produit/dashboard');
	}
}
