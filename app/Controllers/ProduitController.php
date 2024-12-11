<?php


namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProduitModel;
use Config\Pager;
use App\Models\AcheterModel;
use App\Models\PromotionModel;


class ProduitController extends Controller{

    public function __construct()
	{
		helper(filenames: ['form']);
	}

    public function index()
    {


        // Chargement des modèles
        $product = new ProduitModel();
        $promotion = new PromotionModel();

        // Utilisation de la méthode paginate
        $productListe = $product->getProduitAffichage();
        $promotionListe= $promotion->getActivePromotion();

        $session = session();
        $session->remove('codepromo');

        // Passer les données à la vue
        return view('Produit/ProduitView', [
            'produits' => $productListe,
            'promotion' =>$promotionListe
        ]); 
    }

	public function indexDashboard(){


        // Chargement des modèles
        $product = new ProduitModel();
        $promotion = new PromotionModel();

        $order = strtoupper($this->request->getVar('order')) === 'ASC' ? 'ASC' : 'DESC';


		$configPager = config(Pager::class);
		$perPage = 2;
		

        // Utilisation de la méthode paginate
        $productListe = $product->findAll();
        $promotionListe= $promotion->findAll();

        // Passer les données à la vue
        return view('Admin/Gestionproduit', [
            'produits' => $productListe,
            'promotions' =>$promotionListe,
            'order' => $order
        ]); 
    }

    public function indexProduct($idproduit)
    {
        
        // Chargement du modèle
        $product = new ProduitModel();
        $achat = new AcheterModel();

		$perPage = 3;
		$prod = $product->getProduit($idproduit);


        $listeAchat = $achat->where('idproduit', $idproduit)->paginate($perPage,'group_achats');

   	 	$pager = $achat->pager;

        // Passer les données à la vue
        return view('Produit/DetailsProduit', [
            'produit' => $prod,
            'achats' => $listeAchat,
			'pager' => $pager
        ]);
    }
    public function supprimer($idProduit)
	{
        $product = new ProduitModel();

		$product->supprimerProduit($idProduit);
		return redirect()->to('/produit/dashboard');
	}

    public function creer() {

        $produitModel = new ProduitModel();
    
        // Traitement de l'image
        $file = $this->request->getFile('fichier');
        $fileName = null;
    
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move(WRITEPATH . '../public/uploads', $fileName);
        }
    
        // Récupérer les données du formulaire
        $data = [
            'titreproduit' => $this->request->getPost('titreproduit'),
            'descriptionproduit' => $this->request->getPost('descriptionproduit'),
            'prix' => $this->request->getPost('prix'),
            'affichageaccueil' => $this->request->getPost('affichageacceuil') === 'on', // Convertir booléen
            'affichage' => $this->request->getPost('affichage') === 'on', // Convertir booléen
            'photoproduit' => $fileName
        ];
    
        // Insérer les données dans la base de données
        $produitModel->creerProduit($data);
        return redirect()->to('/produit/dashboard')->with('success', 'Produit ajouté avec succès.');
    }
    
    
    public function creerView(){
         return view('Produit/CreerProduit');
    }
    public function modifier()
	{
        $validationRules = [
            'titreproduit' => 'required|min_length[3]|max_length[255]',
            'descriptionproduit' => 'permit_empty|max_length[1000]',
            'prix' => 'required|numeric',
            'affichage' => 'permit_empty|in_list[true,false]',
            'affichageaccueil' => 'permit_empty|in_list[true,false]',
        ];
        
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
		$produitModel = new ProduitModel();

		$idProduit = $this->request->getPost('idproduit');

		if (!is_numeric($idProduit)) {
			return redirect()->back()->with('error', 'ID Projet invalide.');
		}

		$data = [
			'titreproduit' => $this->request->getPost('titreproduit'),
			'photoproduit' => $this->request->getPost('fichier'),
            'descriptionproduit' => $this->request->getPost('descriptionproduit'),
			'prix' => $this->request->getPost('prix'),
            'affichage' => $this->request->getPost('affichage')=== 't' ? true : false,
			'affichageaccueil' => $this->request->getPost('affichageacceuil') === 't' ? true : false ,
		];

		if ($produitModel->majProduit($idProduit, $data)) {
			return redirect()->to('/produit/dashboard')->with('message', 'Projet modifié avec succès.');
		} else {
			return redirect()->back()->with('error', 'Erreur lors de la modification du projet.');
		}
	}
}
