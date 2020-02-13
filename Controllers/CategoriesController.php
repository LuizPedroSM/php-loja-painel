<?php
namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Categories;

class CategoriesController extends Controller 
{

	private $user;
	private $arrayInfo;

	public function __construct()
	{
		$this->user = new Users();

		if (!$this->user->isLogged()) {
			header("Location: ".BASE_URL."login");exit;
		}

		$this->arrayInfo = array(
			'user' => $this->user,
			'menuActive' => 'categories'
		);	
	}

	public function index() 
	{
		$cat = new Categories();
		$this->arrayInfo['list'] = $cat->getAll();
		$this->loadTemplate('categories', $this->arrayInfo);
	}

	public function add() 
	{
		$cat = new Categories();
		$this->arrayInfo['list'] = $cat->getAll();
		$this->arrayInfo['errorItems'] = array();
		if (isset($_SESSION['formError']) && count($_SESSION['formError']) > 0 ) {
			$this->arrayInfo['errorItems'] = $_SESSION['formError'];
			unset($_SESSION['formError']);
		}
		$this->loadTemplate('categories_add', $this->arrayInfo);
	}

	public function add_action()
	{
		if (!empty($_POST['name'])) {

			$name = $_POST['name'];
			$sub = '';

			if (!empty($_POST['sub'])) {
				$sub = $_POST['sub'];
			}

			$cat = new Categories();
			$cat->add($name, $sub);
			header("Location: ".BASE_URL.'categories');exit;
		} else {
			$_SESSION['formError'] = array('name');
			header("Location: ".BASE_URL.'categories/add');exit;
		}
	}
}