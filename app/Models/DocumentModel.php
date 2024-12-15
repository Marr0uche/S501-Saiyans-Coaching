<?php

namespace App\Models;

use CodeIgniter\Model;

class DocumentModel extends Model
{
	protected $table = 'document';
	protected $primaryKey = 'iddocument';

	protected $allowedFields = [
		'titredocument',
		'descriptiondocument'
	];

	protected $returnType = 'array';

	public function getDocument($idDocument)
	{
		return $this->where('iddocument', $idDocument)->first();
	}

	public function getDocumentFromTitre($titreDocument)
	{
		return $this->where('titredocument', $titreDocument)->first();
	}

	public function creerDocument($documentDonnee)
	{
		return $this->insert($documentDonnee);
	}

	public function majDocument($idDocument, $documentDonnee)
	{
		return $this->update($idDocument, $documentDonnee);
	}

	public function supprimerDocument($idDocument)
	{
		return $this->delete($idDocument);
	}
}
