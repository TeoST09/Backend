<?php

class Usuario{
	private $id;
	private $nombre;
	private $saldo;
	private $email;
	private $password;
	private $rol;
	private $imagen;
	private $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}
	
	function getId() {
		return $this->id;
	}

	function getNombre() {
		return $this->nombre;
	}

	function getSaldo() {
		return $this->saldo;
	}

	function getEmail() {
		return $this->email;
	}

	function getPassword() {
		return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
	}

	function getRol() {
		return $this->rol;
	}

	function getImagen() {
		return $this->imagen;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setNombre($nombre) {
		$this->nombre = $this->db->real_escape_string($nombre);
	}
	
	function setSaldo($saldo) {
		$this->saldo = $this->db->real_escape_string($saldo);
	}

	function setEmail($email) {
		$this->email = $this->db->real_escape_string($email);
	}

	function setPassword($password) {
		$this->password = $password;
	}

	function setRol($rol) {
		$this->rol = $rol;
	}

	function setImagen($imagen) {
		$this->imagen = $imagen;
	}

	public function save(){
		$sql = "INSERT INTO usuarios VALUES(NULL, '{$this->getNombre()}', 0, '{$this->getEmail()}', '{$this->getPassword()}', 'user', null);";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

	public function save_saldo() {
		$sql = "UPDATE usuarios SET saldo = saldo + '{$this->getSaldo()}', rol = '{$this->getRol()}' WHERE id = {$this->getId()}";
		$save = $this->db->query($sql);
	
		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
	}
	
	public function login(){
		$result = false;
		$email = $this->email;
		$password = $this->password;
		
		$sql = "SELECT * FROM usuarios WHERE email = '$email'";
		$login = $this->db->query($sql);
		
		
		if($login && $login->num_rows == 1){
			$usuario = $login->fetch_object();
			
			$verify = password_verify($password, $usuario->password);
			
			if($verify){
				$result = $usuario;
			}
		}
		
		return $result;
	}
	

    public function getAll() {
        $sql = "SELECT * FROM usuarios";
        $result = $this->db->query($sql);
        return $result;
    }

	

    public function getOne() {
        $sql = "SELECT * FROM usuarios WHERE id = {$this->getId()}";
        $usuario = $this->db->query($sql);
        return $usuario->fetch_object();
    }

	public function getUsus(){
		
		$sql = "SELECT * FROM usuarios WHERE id = {$this->getId()}";
		$usus = $this->db->query($sql);
		return $usus->fetch_object();
	}
}