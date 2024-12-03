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
		

		$configPager = config(Pager::class);
		$perPage = $configPager->perPage;
		$perPage = 3;  // Limite des tâches par statut
    	$currentPage = $this->request->getVar('page') ?? 1; 

		$articles = $articleModel
					->paginate($perPage, 'default');


		return view('Blog/blog.php', 
					['articles' => $articles,
						   'pager' => $articleModel->pager]);					
	}

	public function nouveau()
	{
		$articleModel = new ArticleModel();

		// Vérifie si le statut est passé dans l'URL
		$idtache = $this->request->getGet('idtache');
		
		if (!is_numeric($idtache)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Identifiant de tâche invalide.');
		}

		return view('ajout_commentaires.php', ['idtache' => $idtache]);
	}
}

?>