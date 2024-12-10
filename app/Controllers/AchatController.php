<?php

namespace App\Controllers;

use App\Models\ClientModel;
use App\Models\AcheterModel;
use CodeIgniter\Controller;
use App\Models\ProduitModel;

class AchatController extends Controller{


    public function indexAchat($clientId){


        $achat = new AcheterModel();
        $listeAchat = $achat->getProduitsAchetes($clientId);
        $commentaire = $achat->getCommentaire($clientId);

    
        return view('Produit/ProduitClientView',[
            'achat'=>$listeAchat,
            'commentaire'=>$commentaire
        ]);
    }

}


?>