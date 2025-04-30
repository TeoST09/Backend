<?php

class Utils{
	
	public static function deleteSession($name){
		if(isset($_SESSION[$name])){
			$_SESSION[$name] = null;
			unset($_SESSION[$name]);
		}
		
		return $name;
	}
	
	public static function isAdmin(){
		if(!isset($_SESSION['admin'])){
			header("Location:".base_url);
		}else{
			return true;
		}
	}
	
	public static function isidenty(){
		if(!isset($_SESSION['identy'])){
			header("Location:".base_url);
		}else{
			return true;
		}
	}
	
	public static function showCategorias(){
		require_once 'models/categoria.php';
		$categoria = new Categoria();
		$categorias = $categoria->getAll();
		return $categorias;
	}

	public static function showPlataformas(){
		require_once 'models/producto.php';
		$pra = new Producto();
		$pras = $pra->getPlata();
		return $pras;
	}


	
	public static function statsCarrito() {
		$stats = array(
			'count' => 0,
			'total' => 0
		);
		
		if (isset($_SESSION['carrito'])) {
			$stats['count'] = count($_SESSION['carrito']);
			
			foreach ($_SESSION['carrito'] as $producto) {
				$stats['total'] += $producto['precio'] * $producto['unidades'];
			}
		}
		
		$stats['total'] = number_format($stats['total'], 3, '.', '');
		
		return $stats;
	}
	
	public static function showStatus($status){
		$value = 'Pendiente';
		
		if($status == 'pendiente'){
			$value = 'Pendientee';
		}elseif($status == 'preparando'){
			$value = 'En preparación';
		}elseif($status == 'preparado'){
			$value = 'Preparado para Enviar';
		}elseif($status = 'listo'){
			$value = 'Enviado';
		}else{
			$value = 'No hay Datos';
		}
		
		return $value;
	}

	public static function showValue($rolstatus){
		$value = 'null';
		
		if($rolstatus == 'user'){
		}elseif($rolstatus == 'admin'){
		}else{
		}


		return $value;
	}

	public static function showCuenta($cuenta){
		$value = 'null';
		
		if($cuenta == 'netflix'){
		}elseif($cuenta == 'amazon' ){
			$value = 'amazon';
		}elseif ($cuenta == 'paramount'){
		}elseif ($cuenta == 'max'){
		}else{
		} 

		return $value;
	}
	
}
