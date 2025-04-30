<?php

class Pedido {
    private $id;
    private $usuario_id;
    private $telefono;
    private $email;
    private $plataforma;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;

    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getUsuario_id() {
        return $this->usuario_id;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPlataforma() {
        return $this->plataforma;
    }

    public function getCoste() {
        return $this->coste;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getHora() {
        return $this->hora;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setUsuario_id($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    public function setTelefono($telefono) {
        $this->telefono = $this->db->real_escape_string($telefono);
    }

    public function setEmail($email) {
        $this->email = $this->db->real_escape_string($email);
    }

    public function setPlataforma($plataforma) {
        $this->plataforma = $plataforma;
    }

    public function setCoste($coste) {
        $this->coste = $coste;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }

    // Methods
    public function getAll() {
        $result = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC");
        return $result;
    }

    public function getOne() {
        $result = $this->db->query("SELECT * FROM pedidos WHERE id = {$this->getId()}");
        return $result->fetch_object();
    }

    public function getOneByUser() {
        $sql = "SELECT p.id, p.coste FROM pedidos p WHERE p.usuario_id = {$this->getUsuario_id()} ORDER BY id DESC LIMIT 1";
        $result = $this->db->query($sql);
        return $result->fetch_object();
    }

    public function getAllByUser() {
        $sql = "SELECT p.* FROM pedidos p WHERE p.usuario_id = {$this->getUsuario_id()} ORDER BY id DESC";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getProductosByPedido($id) {
        $sql = "SELECT pr.*, lp.unidades FROM productos pr INNER JOIN lineas_pedidos lp ON pr.id = lp.producto_id WHERE lp.pedido_id = {$id}";
        $result = $this->db->query($sql);
        return $result;
    }

    public function save() {
        $sql = "INSERT INTO pedidos VALUES(NULL, {$this->getUsuario_id()}, '{$this->getTelefono()}', '{$this->getEmail()}', 'null', {$this->getCoste()}, 'confirm', CURDATE(), CURTIME())";
        $save = $this->db->query($sql);

        return $save ? true : false;
    }

    public function save_linea() {
        $sql = "SELECT LAST_INSERT_ID() as 'pedido'";
        $query = $this->db->query($sql);
        $pedido_id = $query->fetch_object()->pedido;

        foreach ($_SESSION['carrito'] as $elemento) {
            $producto = $elemento['producto'];
            $insert = "INSERT INTO lineas_pedidos VALUES(NULL, {$pedido_id}, {$producto->id}, {$elemento['unidades']})";
            $save = $this->db->query($insert);

            if (!$save) {
                return false;
            }
        }

        return true;
    }

    public function edit() {
        $sql = "UPDATE pedidos SET estado='{$this->getEstado()}' WHERE id={$this->getId()}";
        $save = $this->db->query($sql);

        return $save ? true : false;
    }

    public function getProductos() {
        $sql = "UPDATE productos SET STOCK = STOCK - 1 WHERE ID";
        $productos = $this->db->query($sql);
        return $productos;
    }
}