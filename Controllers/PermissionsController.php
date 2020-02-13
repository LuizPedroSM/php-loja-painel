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

	public function items() 
	{		
		$array = array(
			'user' => $this->user,
			'list' => array()
		);		

		$p = new Permissions();
		$array['list'] = $p->getAllItems();

		$this->loadTemplate('permissions_items', $array);		
	}

	public function del($id_group)
	{
		$p = new Permissions();
		$p->deleteGroup($id_group);
		header("Location: ".BASE_URL.'permissions');exit;
	}

	public function items_del($id_item)
	{
		$p = new Permissions();
		$p->deleteItem($id_item);
		header("Location: ".BASE_URL.'permissions/items');exit;
	}

	public function add()
	{
		$array = array(
			'user' => $this->user,
			'errorItems' => array()
		);
		$p = new Permissions();

		$array['permission_items'] = $p->getAllItems();

		if (isset($_SESSION['formError']) && count($_SESSION['formError']) > 0 ) {
			$array['errorItems'] = $_SESSION['formError'];
			unset($_SESSION['formError']);
		}

		$this->loadTemplate('permissions_add', $array);		
	}

	public function items_add()
	{
		$array = array(
			'user' => $this->user,
			'errorItems' => array()
		);

		if (isset($_SESSION['formError']) && count($_SESSION['formError']) > 0 ) {
			$array['errorItems'] = $_SESSION['formError'];
			unset($_SESSION['formError']);
		}

		$this->loadTemplate('permissions_items_add', $array);	
	}

	public function add_action()
	{
		$p = new Permissions();

		if (!empty($_POST['name'])) {
			$name = $_POST['name'];
			$id = $p->addGroup($name);

			if (isset($_POST['items']) && count($_POST['items']) > 0 ) {
				$items = $_POST['items'];

				foreach ($items as $item) {
					$p->linkItemToGroup($item, $id);
				}
			}

			header("Location: ".BASE_URL.'permissions');exit;
		} else {
			$_SESSION['formError'] = array('name');
			header("Location: ".BASE_URL.'permissions/add');exit;
		}
	}

	public function items_add_action()
	{
		$p = new Permissions();

		if (!empty($_POST['name']) && !empty($_POST['slug'])) {
			$name = $_POST['name'];
			$slug = $_POST['slug'];
			$slug = $this->slugify($slug);
			$id = $p->addItem($name, $slug);

			header("Location: ".BASE_URL.'permissions/items');exit;
		} else {
			$_SESSION['formError'] = array('name');
			header("Location: ".BASE_URL.'permissions/permissions_items_add');exit;
		}
	}

	public function edit($id)
	{
		if (!empty($id)) {			
			$array = array(
				'user' => $this->user,
				'errorItems' => array()
			);
			$p = new Permissions();
	
			$array['permission_items'] = $p->getAllItems();
			$array['permission_id'] = $id;
			$array['permission_group_name'] = $p->getPermissionGroupName($id);
			$array['permission_group_slugs'] = $p->getPermissions($id);
	
			if (isset($_SESSION['formError']) && count($_SESSION['formError']) > 0 ) {
				$array['errorItems'] = $_SESSION['formError'];
				unset($_SESSION['formError']);
			}
	
			$this->loadTemplate('permissions_edit', $array);	
		} else {			
			header("Location: ".BASE_URL.'permissions');exit;	
		}
	}

	public function items_edit($id)
	{
		if (!empty($id)) {			
			$array = array(
				'user' => $this->user,
				'errorItems' => array()
			);
			$p = new Permissions();
	
			$array['permission_item'] = $p->getItem($id);
			
			if (isset($_SESSION['formError']) && count($_SESSION['formError']) > 0 ) {
				$array['errorItems'] = $_SESSION['formError'];
				unset($_SESSION['formError']);
			}
	
			$this->loadTemplate('permissions_items_edit', $array);	
		} else {			
			header("Location: ".BASE_URL.'permissions/items');exit;
		}
	}

	public function edit_action($id)
	{
		if (!empty($id)) {			
			$p = new Permissions();

			if (!empty($_POST['name'])) {
				$name = $_POST['name'];

				$p->editName($name, $id);
				$p->clearLinks($id);

				if (isset($_POST['items']) && count($_POST['items']) > 0 ) {
					$items = $_POST['items'];

					foreach ($items as $item) {
						$p->linkItemToGroup($item, $id);
					}
				}

				header("Location: ".BASE_URL.'permissions');exit;
			} else {
				$_SESSION['formError'] = array('name');
				header("Location: ".BASE_URL.'permissions/edit/'.$id);exit;
			}
		} else {			
			header("Location: ".BASE_URL.'permissions');exit;	
		}
	}

	public function items_edit_action($id)
	{
		if (!empty($id)) {			
			$p = new Permissions();

			if (!empty($_POST['name'])) {
				$name = $_POST['name'];

				$p->editNameItem($name, $id);

				header("Location: ".BASE_URL.'permissions/items');exit;
			} else {
				$_SESSION['formError'] = array('name');
				header("Location: ".BASE_URL.'permissions/items_edit/'.$id);exit;
			}
		} else {			
			header("Location: ".BASE_URL.'permissions/items');exit;	
		}
	}

	private static function slugify($text)
	{
		// replace non letter or digits by -
		$text = preg_replace('~[^\pL\d]+~u', '-', $text);
		// transliterate
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
		// remove unwanted characters
		$text = preg_replace('~[^-\w]+~', '', $text);
		// trim
		$text = trim($text, '-');
		// remove duplicate -
		$text = preg_replace('~-+~', '-', $text);
		// lowercase
		$text = strtolower($text);

		if (empty($text)) {
			return 'n-a';
		}
		return $text;
	}
}