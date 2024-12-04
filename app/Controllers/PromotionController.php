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
    
    public function supprimer($idPromos){
        $promos = new PromotionModel();

		$promos->supprimerPromotion($idPromos);
		return redirect()->to('/Produit');
	}

    public function creer() {

        $promos = new PromotionModel();
        // Récupérer les données du formulaire
        $data = [
            'titredocument' => $this->request->getPost('Titre'),
            'descriptiondocument' => $this->request->getPost('descriptiondocument'),
            'active' => $this->request->getPost('active'),
            'reductionpromo' => $this->request->getPost('reduc') , 
            'codepromo' => $this->request->getPost('codepromo')  
        ];
    
        $promos->creerPromotion($data);
        return redirect()->to('/Produit');
    }
    
    public function modifier(){
        $promos = new PromotionModel();

		$idPromo = $this->request->getPost('idpromotion');

		if (!is_numeric($idPromo)) {
			return redirect()->back()->with('error', 'ID Projet invalide.');
		}

		$data = [
			'titredocument' => $this->request->getPost('titredocument'),
            'descriptiondocument' => $this->request->getPost('descriptiondocument'),
			'active' => $this->request->getPost('active'),
            'reductionpromo' => $this->request->getPost('reduc'),
			'codepromo' => $this->request->getPost('codepromo'),
		];

		if ($promos->majProduit($idPromo, $data)) {
			return redirect()->to('/Produit')->with('message', 'Projet modifié avec succès.');
		} else {
			return redirect()->back()->with('error', 'Erreur lors de la modification du projet.');
		}
	}
}
