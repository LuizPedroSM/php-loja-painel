<?php
namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Pages;

class PagesController extends Controller 
{

	private $user;
	private $arrayInfo;

	public function __construct()
	{
		$this->user = new Users();

		if (!$this->user->isLogged()) {
			header("Location: ".BASE_URL."login");exit;
		}

		if (!$this->user->hasPermission('pages_view')) {
			header("Location: ".BASE_URL);exit;
		}

		$this->arrayInfo = array(
			'user' => $this->user,
			'menuActive' => 'pages'
		);		

	}

	public function index() 
	{
		$p = new Pages();
		$this->arrayInfo['list'] = $p->getAll();
		$this->loadTemplate('pages', $this->arrayInfo);
	}

	public function add() 
	{
		$this->arrayInfo['errorItems'] = array();
		if (isset($_SESSION['formError']) && count($_SESSION['formError']) > 0 ) {
			$this->arrayInfo['errorItems'] = $_SESSION['formError'];
			unset($_SESSION['formError']);
		}
		$this->loadTemplate('pages_add', $this->arrayInfo);
	}
	
	public function add_action()
	{
		if (!empty($_POST['title'])) {
			$title = $_POST['title'];
			$body = $_POST['body'];

			$p = new Pages();
			$p->add($title, $body);

			header("Location: ".BASE_URL.'pages');exit;
		} else {
			$_SESSION['formError'] = array('title');
			header("Location: ".BASE_URL.'pages/add');exit;
		}
	}

	public function del($id)
	{
		if (!empty($id)) {
			$p = new Pages();
			$p = $p->del($id);
		} 
		header("Location: ".BASE_URL.'pages');exit;
	}
}