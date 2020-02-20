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

		$this->arrayInfo['filter'] = array('name' => '', 'permission' => '');

		if (!empty($_GET['name'])) {
			$this->arrayInfo['filter']['name'] = $_GET['name'];			
		}
		if (!empty($_GET['permission'])) {
			$this->arrayInfo['filter']['permission'] = $_GET['permission'];			
		}
		
		$this->arrayInfo['permission_list'] = $permissions->getAllGroups();
		$this->arrayInfo['list'] = $users->getAll($this->arrayInfo['filter']);
		$this->loadTemplate('users', $this->arrayInfo);
	}
		

}