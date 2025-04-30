
<?php

class Producto {
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;

    private $plataforma;

    private $correo;

    private $perfil;
    private $pin;
    private $password;
    
    private $producto_id;
    private $tipo;
    private $db;


    public function __construct() {
        $this->db = Database::connect();
    }

    function getId() {
        return $this->id;
    }

    function getCategoria_id() {
        return $this->categoria_id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getStock() {
        return $this->stock;
    }

    function getOferta() {
        return $this->oferta;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getImagen() {
        return $this->imagen;
    }

    function getPlataforma(){
        return $this->plataforma;
    }

    function getCorreo(){
        return $this->correo;
    }

    function getPassword(){
        return $this->password;
    }

    function getProducto_id(){
        return $this->producto_id;
    }

    function getTipo(){
        return $this->tipo;
    }   

    function getPerfil(){
        return $this->perfil;
    }

    function getPin(){
        return $this->pin;
    }

    function setPerfil($perfil){
        $this->perfil = $perfil;
    }

    function setPin($pin){
        $this->pin = $pin;
    }

    function setTipo($tipo){
        $this->tipo = $tipo;
    }

    function setProducto_id($producto_id){
        $this->producto_id = $producto_id;
    }
    function setCorreo($correo){
        $this->correo = $correo;
    }

    function setPassword($password){
        $this->password = $password;
    }

    function setPlataforma($plataforma){
        $this->plataforma = $plataforma;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCategoria_id($categoria_id) {
        $this->categoria_id = $categoria_id;
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    function setPrecio($precio) {
        $this->precio = $this->db->real_escape_string($precio);
    }

    function setStock($stock) {
        $this->stock = $this->db->real_escape_string($stock);
    }

    function setOferta($oferta) {
        $this->oferta = $this->db->real_escape_string($oferta);
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function getAll() {
        $productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC");
        return $productos;
    }

    public function getCuentas() {
        $sql = "SELECT * FROM droper";
        $result = $this->db->query($sql);
        return $result;
    }


    public function getAllCategory() {
        $sql = "SELECT p.*, c.nombre AS 'catnombre' FROM productos p "
            . "INNER JOIN categorias c ON c.id = p.categoria_id "
            . "WHERE p.categoria_id = {$this->getCategoria_id()} "
            . "ORDER BY id DESC";
        $productos = $this->db->query($sql);
        return $productos;
    }

    public function getRandom($limit) {
        $productos = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit");
        return $productos;
    }

    public function getOne() {
        $producto = $this->db->query("SELECT * FROM productos WHERE id = {$this->getId()}");
        return $producto->fetch_object();
    }


	public function save(){
		$sql = "INSERT INTO productos VALUES(NULL, {$this->getCategoria_id()}, '{$this->getNombre()}', '{$this->getDescripcion()}', {$this->getPrecio()}, {$this->getStock()}, null, CURDATE(), '{$this->getImagen()}');";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

    

    public function save_cuenta(){
        $sql = "INSERT INTO droper VALUES (null, '{$this->getProducto_id()}', 'Cuenta', '{$this->getPlataforma()}', '{$this->getCorreo()}', '{$this->getPassword()}', '', '')";
        $save = $this->db->query($sql);
        
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function save_pantalla(){
        $sql = "INSERT INTO droper VALUES (null, '{$this->getProducto_id()}', 'Pantalla', '{$this->getPlataforma()}', '{$this->getCorreo()}', '{$this->getPassword()}',  '{$this->getPerfil()}',  '{$this->getPin()}')";
        $save = $this->db->query($sql);
        
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function edit() {
        $sql = "UPDATE productos SET nombre='{$this->getNombre()}', descripcion='{$this->getDescripcion()}', precio={$this->getPrecio()}, stock={$this->getStock()}, oferta={$this->getOferta()}, categoria_id={$this->getCategoria_id()}";
        
        if ($this->getImagen() != null) {
            $sql .= ", imagen='{$this->getImagen()}'";
        }
        
        $sql .= " WHERE id={$this->id};";
        
        $save = $this->db->query($sql);
        
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function edit_cuenta() {
        $sql = "UPDATE droper SET 
                    producto_id='{$this->getProducto_id()}', 
                    plataforma='{$this->getPlataforma()}', 
                    tipo='Cuenta',
                    correo='{$this->getCorreo()}', 
                    password='{$this->getPassword()}'";
        
        $sql .= " WHERE id={$this->getId()};";
        
        $save = $this->db->query($sql);
        
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function edit_pantalla() {
        $sql = "UPDATE droper SET 
                    producto_id='{$this->getProducto_id()}', 
                    plataforma='{$this->getPlataforma()}', 
                    tipo='Pantalla',
                    correo='{$this->getCorreo()}', 
                    password='{$this->getPassword()}',
                    perfil= {$this->getPerfil()}',
                    pin={$this->getPin()}'";
        
        $sql .= " WHERE id={$this->getId()};";
        
        $save = $this->db->query($sql);
        
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function delete() {
        $sql = "DELETE FROM productos WHERE id={$this->id}";
        $delete = $this->db->query($sql);
        
        $result = false;
        if ($delete) {
            $result = true;
        }
        return $result;
    }


    public function getOna() {
        $producto = $this->db->query("SELECT * FROM droper WHERE id = {$this->getId()}");
        return $producto->fetch_object();
    }

    public function getCrea(){
        $sql = "SELECT * FROM droper";
        $pro = $this->db->query($sql);
        return $pro->fetch_object();
    }


    public function getPanta(){
        $sql = "SELECT * FROM droper";
        $pro = $this->db->query($sql);
        return $pro->fetch_object();
    }

    public function getPlata(){
        $productos = $this->db->query("SELECT * FROM plataformas ORDER BY id DESC");
        return $productos;
    }

    public function getC(){
        $productos = $this->db->query("SELECT * FROM `droper` WHERE `tipo` = 'cuenta'; ");
        return $productos;
    }

    public function getP(){
        $productos = $this->db->query("SELECT * FROM `droper` WHERE `tipo` = 'pantalla';");
        return $productos;
    }
    
}