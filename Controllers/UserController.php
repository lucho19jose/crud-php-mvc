<?php
require_once 'Models/User.php';

class UserController{
	
	public function index(){
		$user = new User();
		$users = $user->getAll();
		
		require_once 'views/categoria/index.php';
	}
	
	public function ver(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			
			// Conseguir categoria
			$user = new Categoria();
			$user->setId($id);
			$user = $user->getOne();
			
			// Conseguir productos;
			$producto = new Producto();
			$producto->setCategoria_id($id);
			$productos = $producto->getAllCategory();
		}
		
		require_once 'views/categoria/ver.php';
	}
	
	public function crear(){
		Utils::isAdmin();
		require_once 'views/categoria/crear.php';
	}
	
	public function save(){
		Utils::isAdmin();
	    if(isset($_POST) && isset($_POST['nombre'])){
			// Guardar la categoria en bd
			$user = new Categoria();
			$user->setNombre($_POST['nombre']);
			$save = $user->save();
		}
		header("Location:".base_url."categoria/index");
	}
	
}