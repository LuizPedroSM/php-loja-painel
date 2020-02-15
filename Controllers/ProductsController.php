<?php
namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Brands;
use \Models\Categories;
use \Models\Products;

class ProductsController extends Controller 
{

	private $user;
	private $arrayInfo;

	public function __construct()
	{
		$this->user = new Users();

		if (!$this->user->isLogged()) {
			header("Location: ".BASE_URL."login");exit;
		}
		
		if (!$this->user->hasPermission('products_view')) {
			header("Location: ".BASE_URL);exit;
		}

		$this->arrayInfo = array(
			'user' => $this->user,
			'menuActive' => 'products'
		);	
	}

	public function index() 
	{
		$p = new Products();
		$this->arrayInfo['list'] = $p->getAll();
		$this->loadTemplate('products', $this->arrayInfo);
	}
}