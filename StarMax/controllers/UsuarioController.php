<?php


require_once 'models/usuario.php';

class usuarioController{

    public function index(){
        echo "Usuario Contralador, Accion Index";
    }

    public function enviar(){
        require_once'views/usuario/login.php';
        exit();
    }

    public function registro(){
        require_once"views/usuario/registro.php";
    }

    public function reca_saldo(){
        Utils::isAdmin();
        $usu = new Usuario();
        $usus = $usu->getAll();

        require_once 'views/usuario/editar.php';
    }

    public function editar_usu() {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $edit = true;

            $usu = new Usuario();
            $usu->setId($id);

            $usus = $usu->getOne();

            require_once 'views/usuario/gestion.php';
        } else {
            header('Location:' . base_url . 'usuario/reca_saldo');
        }
    }


    public function save(){
        if(isset($_POST)){

            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            
            if ($nombre && $email && $password){
                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setEmail($email);
                $usuario->setPassword($password);

                $save = $usuario->save();
                if ($save){
                    $_SESSION['register'] = "complete";
                }else
                $_SESSION['register'] = "failed";
            }else{
                $_SESSION['register'] = "failed";
            }   

        }else{
            $_SESSION['register'] = "failed";
        }   
        header("Location:".base_url.'usuario/enviar');
    }

	public function recagar_saldo(){
		Utils::isAdmin();
		if(isset($_GET['id']) && isset($_POST['saldo']) && isset($_POST['rol'])){
			// Recoger datos form
			$id = $_GET['id'];
            $saldo= $_POST['saldo'];
            $rolstatus= $_POST['rol'];
			
			$usuario = new Usuario();
			$usuario->setId($id);
			$usuario->setSaldo($saldo);
            $usuario->setRol($rolstatus);
			$usuario->save_saldo();
			
			header("Location:".base_url.'usuario/editar_usu&id='.$id);
		}else{
			header("Location:".base_url);
		}
	}


    public function login(){
        if (isset($_POST)){
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            $identy = $usuario->login();

            $usu = new Usuario();
            $usus = $usu->getAll();

            if ($identy && is_object($identy)){
                $_SESSION['identy'] = $identy;

                if($identy->rol == 'admin'){
                    $_SESSION['admin'] = true;
                }
            }else{
                $_SESSION['error_login'] = "identificación fallida";
            }
        }
        header("Location:".base_url);
    }

    public function logout(){
        if(isset($_SESSION['identy'])){
            unset($_SESSION['identy']);
        }

        if(isset($_SESSION['admin'])){
			unset($_SESSION['admin']);
		}
		
		header("Location:".base_url);

    }

    public function saldo(){
        if(isset($_SESSION['identy'])){
            $usuario_id = $_SESSION['identy']->id;
            $usu = new Usuario();
            $usu->setId($usuario_id);
            $usuario = $usu->getUsus();
            require_once 'views/usuario/saldo.php';
        }else{
            header("Location:".base_url);
        }
    }

}