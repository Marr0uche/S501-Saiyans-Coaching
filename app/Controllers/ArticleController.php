<?php
namespace App\Controllers;
use App\Models\ArticleModel;
use CodeIgniter\Controller;
use Config\Pager;
class ArticleController extends Controller
{

	public function __construct()
	{
		helper(['form']);
	}

	public function indexActu()
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
					->where('blog', false)
					->paginate($perPage, 'default');


		return view('Actualite/ActualiteView.php', 
					['articles' => $articles,
						   'pager' => $articleModel->pager]);					
	}
	

	public function indexBlog()
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
					->where('blog', true)
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
			'blog' => 'required',
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
			'blog' => $this->request->getPost('blog'),
		];

		$articleModel->creerArticle($data);
		echo $data['datepublication'];
		if($data['blog'] == 1)
		{
			return redirect()->to('/blog');
		}
		else
		{
			return redirect()->to('/actualites');
		}
	}

	public function modif($id)
	{
		$articleModel = new ArticleModel();
		$article = $articleModel->getArticle($id);
		if (!$article) {
			return redirect()->back()->with('error', 'Article non trouvée');
		}

		return view('Blog/ModifArticleView.php', [
			'article' => $article
		]);
	}

	public function edition()
	{
		$articleModel = new ArticleModel();
		$iddocument = $this->request->getPost('iddocument');
		echo 'iddocumentController : ' . $iddocument . '<br>';

		$titre = $this->request->getPost('titredocument');
		$description = $this->request->getPost('descriptiondocument');
		$supprimerImage = $this->request->getPost('supprimer_image');
		$article = $articleModel->find($iddocument);

		$data = [
			'titredocument' => $titre,
			'descriptiondocument' => $description,
		];

		$image = $this->request->getFile('image');

		if ($supprimerImage) {
			if (!empty($article['image']) && file_exists('uploads/' . $article['image'])) {
				unlink('uploads/' . $article['image']);
			}
			$data['image'] = null; 
		} elseif ($image && $image->isValid() && !$image->hasMoved()) {
			$newImageName = $image->getRandomName();
			$image->move('uploads', $newImageName);

			if (!empty($article['image']) && file_exists('uploads/' . $article['image'])) {
				unlink('uploads/' . $article['image']);
			}
			$data['image'] = $newImageName;
		}
		
		$articleModel->majArticle($iddocument, $data);
		
		if($article['blog'] == 1)
		{
			return redirect()->to('/blog');
		}
		else
		{
			return redirect()->to('/actualites');
		}
		
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

		if($article['blog'] == 1)
		{
			return redirect()->to('/blog');
		}
		else
		{
			return redirect()->to('/actualites');
		}
	}
}

?>