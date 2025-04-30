<?php
require_once 'models/pedido.php';

class pedidoController{
	
	public function hacer(){
		
		require_once 'views/pedido/hacer.php';
	}

	
	public function add(){
		if(isset($_SESSION['identy'])){
			$usuario_id = $_SESSION['identy']->id;
			$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : false;
			$email = isset($_POST['email']) ? $_POST['email'] : false;
			
			$stats = Utils::statsCarrito();
			$coste = $stats['total'];
			
			$saldo = $_SESSION['identy']->saldo;

			if($coste <= $saldo){
				echo "Compre";
			}else{
				echo"recargue";
			}
				
			if($telefono && $email){
				// Guardar datos en bd
				$pedido = new Pedido();
				$pedido->setUsuario_id($usuario_id);
				$pedido->setTelefono($telefono);
				$pedido->setEmail($email);
				$pedido->setCoste($coste);
				
				$save = $pedido->save();
				// Guardar linea pedido
				$save_linea = $pedido->save_linea();
				
				if($save && $save_linea){
					$_SESSION['pedido'] = "complete";	
					$productos = $pedido->getProductos();

				}else{
					$_SESSION['pedido'] = "failed";
				}
				
			}else{
				$_SESSION['pedido'] = "failed";
			}
			header("Location:" .base_url.'carrito/delete_car');	
		}else{
			// Redigir al index
			header("Location:".base_url);
		}
	}
	
	public function confirmado(){
		if(isset($_SESSION['identy'])){
			$identy = $_SESSION['identy'];
			$pedido = new Pedido();
			$pedido->setUsuario_id($identy->id);
			
			$pedido = $pedido->getOneByUser();
			
			$pedido_productos = new Pedido();
			$productos = $pedido_productos->getProductosByPedido($pedido->id);
		}
		require_once 'views/pedido/confirmado.php';
	}
	
	public function mis_pedidos(){
		Utils::isidenty();
		$usuario_id = $_SESSION['identy']->id;
		$pedido = new Pedido();
		
		// Sacar los pedidos del usuario
		$pedido->setUsuario_id($usuario_id);
		$pedidos = $pedido->getAllByUser();
		
		require_once 'views/pedido/mis_pedidos.php';
	}
	
	public function detalle(){
		Utils::isidenty();
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			

			$pedido = new Pedido();
			$pedido->setId($id);
			$pedido = $pedido->getOne();
			
			$pedido_productos = new Pedido();
			$productos = $pedido_productos->getProductosByPedido($id);
			
			require_once 'views/pedido/detalle.php';
		}else{
			header('Location:'.base_url.'pedido/mis_pedidos');
		}
	}
	
	public function gestion(){
		Utils::isAdmin();
		$gestion = true;
		
		$pedido = new Pedido();
		$pedidos = $pedido->getAll();
		
		require_once 'views/pedido/mis_pedidos.php';
	}
	
	public function estado(){
		Utils::isAdmin();
		if(isset($_POST['pedido_id']) && isset($_POST['estado'])){
			// Recoger datos form
			$id = $_POST['pedido_id'];
			$estado = $_POST['estado'];
			
			// Upadate del pedido
			$pedido = new Pedido();
			$pedido->setId($id);
			$pedido->setEstado($estado);
			$pedido->edit();
			
			header("Location:".base_url.'pedido/detalle&id='.$id);
		}else{
			header("Location:".base_url);
		}
	}
	
	
}