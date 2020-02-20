<?php
namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Permissions;

class UsersController extends Controller 
{

	private $user;
	private $arrayInfo;

	public function __construct()
	{
		$this->user = new Users();

		if (!$this->user->isLogged()) {
			header("Location: ".BASE_URL."login");exit;
		}
		
		if (!$this->user->hasPermission('users_view')) {
			header("Location: ".BASE_URL);exit;
		}

		$this->arrayInfo = array(
			'user' => $this->user,
			'menuActive' => 'users'
		);	
	}

	public function index() 
	{
		$users = new Users();
		$permissions = new Permissions();

		// FILTRO
		$this->arrayInfo['filter'] = array('name' => '', 'permission' => '');

		if (!empty($_GET['name'])) {
			$this->arrayInfo['filter']['name'] = $_GET['name'];			
		}
		if (!empty($_GET['permission'])) {
			$this->arrayInfo['filter']['permission'] = $_GET['permission'];			
		}
		
		// PAGINAÇÃO
		$this->arrayInfo['pag'] = array('currentpage' => 0, 'total' => 0, 'per_page' => 2);
		
		if (!empty($_GET['p'])) {
			$this->arrayInfo['pag']['currentpage'] = intval($_GET['p'] - 1);			
		}

		$this->arrayInfo['permission_list'] = $permissions->getAllGroups();
		$this->arrayInfo['list'] = $users->getAll( $this->arrayInfo['filter'], $this->arrayInfo['pag']);
		$this->arrayInfo['pag']['total'] = $users->getTotal($this->arrayInfo['filter']);
		$this->loadTemplate('users', $this->arrayInfo);
	}
		

}