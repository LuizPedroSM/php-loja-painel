<?php
namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Permissions;

class PermissionsController extends Controller 
{

	private $user;

	public function __construct()
	{
		$this->user = new Users();

		if (!$this->user->isLogged()) {
			header("Location: ".BASE_URL."login");exit;
		}

		if (!$this->user->hasPermission('permissions_view')) {
			header("Location: ".BASE_URL);exit;
		}
	}

	public function index() 
	{		
		$array = array(
			'user' => $this->user,
			'list' => array()
		);		

		$p = new Permissions();
		$array['list'] = $p->getAllGroups();

		$this->loadTemplate('permissions', $array);		
	}

	public function del($id_group)
	{
		$p = new Permissions();
		$p->deleteGroup($id_group);
		header("Location: ".BASE_URL.'permissions');exit;
	}
}