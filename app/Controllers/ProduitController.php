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

	   public function indexDashboard()
    {


        // Chargement des modèles
        $product = new ProduitModel();
        $promotion = new PromotionModel();

		$configPager = config(Pager::class);
		$perPage = 2;
		

        // Utilisation de la méthode paginate
        $productListe = $product->findAll();
        $promotionListe= $promotion->getActivePromotion();

        // Passer les données à la vue
        return view('Admin/Gestionproduit', [
            'produits' => $productListe,
            'promotion' =>$promotionListe
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
		return redirect()->to('/Produit');
	}

    public function creer() {
        $validationRules = [
            'fichier' => [
                'rules' => 'uploaded[fichier]|mime_in[fichier,image/jpg,image/jpeg,image/png]|max_size[fichier,2048]',
                'errors' => [
                    'uploaded' => 'Vous devez sélectionner un fichier.',
                    'mime_in' => 'Seuls les fichiers JPG et PNG sont autorisés.',
                    'max_size' => 'La taille du fichier ne doit pas dépasser 2MB.'
                ],
            ],
        ];
    
        if (!$this->validate($validationRules)) {
            return redirect()->to('/Produit');
        }
    
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
            'titreproduit' => $this->request->getPost('Titre'),
            'descriptionproduit' => $this->request->getPost('descriptionproduit'),
            'prix' => $this->request->getPost('prix'),
            'affichageaccueil' => $this->request->getPost('dashboard') === 'true', // Assurez-vous que c'est un booléen
            'affichage' => $this->request->getPost('Afficher') === 'true' , // Assurez-vous que c'est un booléen
            'photoproduit' => $fileName
        ];

        // Insérer les données dans la base de données
        $produitModel->creerProduit($data);
        return redirect()->to('/Produit');
    }
    
    public function creerView(){
         return view('Produit/CreerProduit');
    }
    public function modifier()
	{
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
            'affichage' => $this->request->getPost('affichage'),
			'affichageaccueil' => $this->request->getPost('affichageaccueil'),
		];

		if ($produitModel->majProduit($idProduit, $data)) {
			return redirect()->to('/Produit')->with('message', 'Projet modifié avec succès.');
		} else {
			return redirect()->back()->with('error', 'Erreur lors de la modification du projet.');
		}
	}
}
