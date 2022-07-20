<?php

/* include("../config.php"); */
class User{
	private $id;
	private $name;
	private $age;
	private $email;
	private $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}
	
	function getId() {
		return $this->id;
	}

	function getName() {
		return $this->name;
	}
	
  function getAge() {
		return $this->age;
	}

	function getEmail() {
		return $this->email;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setName($name) {
		$this->name = $this->db->real_escape_string($name);
	}
	
  function setAge($age) {
		$this->age = $this->db->real_escape_string($age);
	}
	
  function setEmail($email) {
		$this->email = $this->db->real_escape_string($email);
	}

	public function getAll(){
		$users = $this->db->query("SELECT * FROM users ORDER BY id DESC;");
		return $users;
	}
	
	public function getOne(){
		$user = $this->db->query("SELECT * FROM users WHERE id={$this->getId()}");
		return $user->fetch_object();
	}
	
	public function save(){
		$sql = "INSERT INTO users VALUES(NULL, '{$this->getName()}', '{$this->getAge()}', '{$this->getEmail()}');";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	
	
}