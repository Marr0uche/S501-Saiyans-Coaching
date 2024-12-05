<?php


namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Pager;
use App\Models\AcheterModel;
use App\Models\PromotionModel;


class PromotionController extends Controller
{

    public function __construct(){
		helper(filenames: ['form']);
	}

    public function index(){

        $promotionModel = new PromotionModel();
        $listePromotion = $promotionModel->findAll();

        return view('Promos/PromotionView',['listePromotion' => $listePromotion]);

    }

    public function creerView(){
        return view('Promos/CreerPromoView');
   }
    
    public function supprimer($idPromos){
        $promos = new PromotionModel();

		$promos->supprimerPromotion($idPromos);
		return redirect()->to('promo');
	}

    public function creer() {

        $validationRules = [
            'titredocument' => 'required|string|max_length[255]',
            'descriptiondocument' => 'required|string',
            'active' => 'required|in_list[true,false]',
            'reductionpromo' => 'required|decimal',
            'codepromo' => 'required|string|max_length[20]'
        ];

        $promos = new PromotionModel();
        // Récupérer les données du formulaire
        $data = [
            'titredocument' => $this->request->getPost('Titre'),
            'descriptiondocument' => $this->request->getPost('descriptiondocument'),
            'active' => $this->request->getPost('active') === 'true', // Retourne true si coché, sinon false
            'reductionpromo' => $this->request->getPost('reduc'), 
            'codepromo' => $this->request->getPost('codepromo')  
        ];

        if (!$promos->validate($data)) {
            return redirect()->back()->withInput()->with('errors', $promos->errors());
        }
        $promos->creerPromotion($data);
        return redirect()->to('promo');
    }
    
    public function modifier(){
        $promos = new PromotionModel();

		$idPromo = $this->request->getPost('idpromotion');

		if (!is_numeric($idPromo)) {
			return redirect()->back()->with('error', 'ID Projet invalide.');
		}

		$data = [
			'titredocument' => $this->request->getPost('titrepromotion'),
            'descriptiondocument' => $this->request->getPost('DescriptionPromotion'),
			'active' => $this->request->getPost('active'),
            'reductionpromo' => $this->request->getPost('reduc'),
			'codepromo' => $this->request->getPost('code'),
		];

		if ($promos->majPromotion($idPromo, $data)) {
			return redirect()->to('promo')->with('message', 'Projet modifié avec succès.');
		} else {
			return redirect()->back()->with('error', 'Erreur lors de la modification du projet.');
		}
	}
}
