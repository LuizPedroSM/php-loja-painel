<?php
namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Brands;

class BrandsController extends Controller 
{

	private $user;
	private $arrayInfo;

	public function __construct()
	{
		$this->user = new Users();

		if (!$this->user->isLogged()) {
			header("Location: ".BASE_URL."login");exit;
		}
		
		if (!$this->user->hasPermission('brands_view')) {
			header("Location: ".BASE_URL);exit;
		}

		$this->arrayInfo = array(
			'user' => $this->user,
			'menuActive' => 'brands'
		);	
	}

	public function index() 
	{
		$b = new Brands();
		$this->arrayInfo['list'] = $b->getAll();
		$this->loadTemplate('brands', $this->arrayInfo);
	}

}