<?php


namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProduitModel;
use Config\Pager;
use App\Models\AcheterModel;


class ProduitController extends Controller{

    public function __construct()
	{
		helper(filenames: ['form']);
	}

    public function index()
    {


        // Chargement du modèle
        $product = new ProduitModel();

        // Utilisation de la méthode paginate
        $productListe = $product->getProduitAffichage();

        // Passer les données à la vue
        return view('Produit/ProduitView', [
            'produits' => $productListe,
        ]);
    }

    public function indexProduct($idproduit)
    {
        
        // Chargement du modèle
        $product = new ProduitModel();
        $achat = new AcheterModel();

        $listeAchat = $achat->getAcheterProduit($idproduit);

        $prod = $product->getProduit($idproduit);

        // Passer les données à la vue
        return view('Produit/DetailsProduit', [
            'produit' => $prod,
            'achats' => $listeAchat
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
        
        // Récupérer les données du formulaire
        $data = [
            'titreproduit' => $this->request->getPost('Titre'),
            'descriptionproduit' => $this->request->getPost('descriptionproduit'),
            'prix' => $this->request->getPost('prix'),
            'affichageaccueil' => $this->request->getPost('dashboard') === 'true', // Assurez-vous que c'est un booléen
            'affichage' => $this->request->getPost('Afficher') === 'true'  // Assurez-vous que c'est un booléen
        ];
    
        // Gérer le fichier téléchargé
        $fichier = $this->request->getFile('fichier');
        if ($fichier->isValid() && !$fichier->hasMoved()) {
            // Déplacer le fichier dans un dossier, ici "uploads"
            $filePath = 'public/assets/' . $fichier->getName();  // Vous pouvez ajuster le chemin selon vos besoins
            $fichier->move(WRITEPATH .'public/assets/', $fichier->getName());
    
            // Ajouter le chemin du fichier dans les données
            $data['photoproduit'] = $filePath;
        }
    
        // Insérer les données dans la base de données
        $produitModel->creerProduit($data);
        echo "Insertion des données : ";
        print_r($data);
    
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
