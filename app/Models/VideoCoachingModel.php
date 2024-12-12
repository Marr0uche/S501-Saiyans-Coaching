<?php

namespace App\Models;

use CodeIgniter\Model;

class VideoCoachingModel extends Model
{
	protected $table = 'videocoaching';
	protected $primaryKey = 'iddocument';

	protected $allowedFields = [
		'titredocument',
		'descriptiondocument',
		'video'
	];

	protected $returnType = 'array';

	public function getVideoCoaching($idDocument)
	{
		return $this->where('iddocument', $idDocument)->first();
	}

	public function creerVideoCoaching($videoCoachingDonnee)
	{
		return $this->insert($videoCoachingDonnee);
	}

	public function majVideoCoaching($idDocument, $videoCoachingDonnee)
	{
		return $this->update($idDocument, $videoCoachingDonnee);
	}

	public function supprimerVideoCoaching($idDocument)
	{
		return $this->delete($idDocument);
	}
}
