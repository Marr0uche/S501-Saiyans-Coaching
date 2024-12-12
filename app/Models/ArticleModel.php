<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
	protected $table = 'article';
	protected $primaryKey = 'iddocument';

	protected $allowedFields = [
		'titredocument',
		'descriptiondocument',
		'datepublication',
		'image',
		'blog'
	];

	protected $returnType = 'array';

	public function getArticle($idDocument)
	{
		return $this->where('iddocument', $idDocument)->first();
	}

	public function creerArticle($articleDonnee)
	{
		return $this->insert($articleDonnee);
	}

	public function majArticle($idDocument, $articleDonnee)
	{
		return $this->where('iddocument', $idDocument)->set($articleDonnee)->update();
	}

	public function supprimerArticle($idDocument)
	{
		return $this->delete($idDocument);
	}
}
