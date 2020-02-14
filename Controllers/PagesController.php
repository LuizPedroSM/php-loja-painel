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
}