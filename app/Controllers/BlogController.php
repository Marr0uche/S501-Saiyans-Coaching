<?php
namespace App\Controllers;
use App\Models\ArticleModel;
use CodeIgniter\Controller;
use Config\Pager;
class BlogController extends Controller
{

	public function __construct()
	{
		helper(['form']);
	}

	public function index()
	{
		$articleModel = new ArticleModel();
		
		$keyword = $this->request->getGet('keyword');
		if ($keyword === null) {
			$keyword = '';
		}
		$keyword = strtolower($keyword);

		$configPager = config(Pager::class);
		$perPage = $configPager->perPage;
		$perPage = 3;  // Limite des tâches par statut
    	$currentPage = $this->request->getVar('page') ?? 1; 

		$articles = $articleModel
					->groupStart()
						->like('LOWER(titredocument)', $keyword)
						->orLike('LOWER(descriptiondocument)', $keyword)
					->groupEnd()
					->paginate($perPage, 'default');


		return view('Blog/BlogView.php', 
					['articles' => $articles,
						   'pager' => $articleModel->pager]);					
	}

	public function nouveauTraitement()
	{
		$validationRules = [
			'titredocument' => 'required|max_length[255]',
			'descriptiondocument' => 'required',
		];
	
		if (!$this->validate($validationRules)) {
			return redirect()->back()->withInput()->with('validation', $this->validator);
		}

		$articleModel = new ArticleModel();

		$file = $this->request->getFile('image');
		$fileName = null;

		if ($file && $file->isValid() && !$file->hasMoved()) {
			$fileName = $file->getRandomName();
			$file->move(WRITEPATH . '../public/uploads', $fileName);
		}

		$data = [
			'titredocument' => $this->request->getPost('titredocument'),
			'descriptiondocument' => $this->request->getPost('descriptiondocument'),
			'datepublication' => $this->request->getPost('datepublication'),
			'image' => $fileName,
		];

		$articleModel->insert($data);
		return redirect()->to('/blog');
	}

	public function suppression($idDocArticle)
	{
		echo 'idDocArticle' . $idDocArticle;
		$articleModel = new ArticleModel();

		// Récupérer l'article avant de le supprimer
		$article = $articleModel->find($idDocArticle);
		echo 'article' . $article['image'];
    
		if ($article && !empty($article['image'])) {
			
			
			$imagePath = FCPATH . 'uploads/' . $article['image'];
			echo 'path' . $imagePath;
			
			if (file_exists($imagePath)) {
				echo 'exists';
				unlink($imagePath); 
			}
		}

		$articleModel->supprimerArticle($idDocArticle);
		return redirect()->to('/blog');
	}
}

?>