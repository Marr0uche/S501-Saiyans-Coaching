<?php

namespace App\Models;

use CodeIgniter\Model;

class PromotionModel extends Model
{
    protected $table = 'promotion';
    protected $primaryKey = 'iddocument';
    protected $allowedFields = [
		'titredocument',
		'descriptiondocument',
		'idpromotion',
        'active',
        'reductionpromo',
        'codepromo'
    ];
    protected $returnType = 'array';

	public function getPromotion($idDocument)
	{
		return $this->where('iddocument', $idDocument)->first();
	}

	public function getActivePromotion()
	{
		return $this->where('active',true)->findAll();
	}

	public function creerPromotion($promotionDonnee)
	{
		return $this->insert($promotionDonnee);
	}

	public function majPromotion($idDocument, $promotionDonnee)
	{
		return $this->update($idDocument, $promotionDonnee);
	}

	public function supprimerPromotion($idDocument)
	{
		return $this->delete($idDocument);
	}
}
