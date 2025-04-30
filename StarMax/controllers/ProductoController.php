<?php
require_once 'models/producto.php';

class productoController {
    
    public function index() {
        $producto = new Producto();
        $productos = $producto->getRandom(6);
    
        require_once 'views/producto/destacados.php';
    }

     
    public function ver() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        
            $producto = new Producto();
            $producto->setId($id);
            
            $product = $producto->getOne();
        }
        require_once 'views/producto/ver.php';
    }

    public function cuentas(){
		if(isset($_SESSION['identy'])){
            Utils::isAdmin();
            $producto = new Producto();
            $productos = $producto->getCuentas();
			require_once 'views/producto/ver_cuentas.php';
		}
	}
    
    public function gestion() {
        Utils::isAdmin();
        
        $producto = new Producto();
        $productos = $producto->getAll();
        
        require_once 'views/producto/gestion.php';
    }
    
    public function crear() {
        Utils::isAdmin();
        require_once 'views/producto/crear.php';
    }
    
    public function save() {
        Utils::isAdmin();
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $oferta = isset($_POST['oferta']) ? $_POST['oferta'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            
            if ($nombre && $descripcion && $precio && $stock && $categoria) {
                $producto = new Producto();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setOferta($oferta);
                $producto->setStock($stock);
                $producto->setCategoria_id($categoria);
                
                if (isset($_FILES['imagen'])) {
                    $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];

                    if ($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {
                        if (!is_dir('uploads/images')) {
                            mkdir('uploads/images', 0777, true);
                        }

                        $producto->setImagen($filename);
                        move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);
                    }
                }
                
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $producto->setId($id);
                    
                    $save = $producto->edit();
                } else {
                    $save = $producto->save();
                }
                
                if ($save) {
                    $_SESSION['producto'] = "complete";
                    echo "Producto guardado";
                } else {
                    $_SESSION['producto'] = "failed";
                }
            } else {
                $_SESSION['producto'] = "failed";
            }
        } else {
            $_SESSION['producto'] = "failed";
        }
        
        header('Location: ' . base_url . 'producto/gestion');
        exit();
    }

    public function save_cuenta() {
        Utils::isAdmin();
        if (isset($_POST)) {
            $correo = isset($_POST['correo']) ? $_POST['correo'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;
            $cuenta = isset($_POST['cuenta']) ? $_POST['cuenta'] : false;
            $producto_id = 0;
            if ($cuenta == 'Netflix'){
                $producto_id = 1;
            }elseif($cuenta == 'Disney'){
                $producto_id = 3;
            }elseif($cuenta == 'Paramount'){
                $producto_id = 5;
            }elseif($cuenta == 'Amazon'){
                $producto_id = 7;
            }elseif($cuenta == 'Max'){
                $producto_id = 9;
            }
            
            if ($correo && $password) {
                $producto = new Producto();
                $producto->setCorreo($correo);
                $producto->setPassword($password);
                $producto->setPlataforma($cuenta);
                $producto->setProducto_id($producto_id);
                
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $producto->setId($id);
                    
                    $save = $producto->edit_cuenta();
                } else {
                    $save = $producto->save_cuenta();
                }
                
                if ($save) {
                    $_SESSION['producto'] = "complete";
                    echo "Producto guardado";
                } else {
                    $_SESSION['producto'] = "failed";
                }
            } else {
                $_SESSION['producto'] = "failed";
            }
        } else {
            $_SESSION['producto'] = "failed";
        }
        
        header('Location: ' . base_url . 'producto/cuentas');
        exit();
    }


    public function save_pantalla() {
        Utils::isAdmin();
        if (isset($_POST)) {
            $correo = isset($_POST['correo']) ? $_POST['correo'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;
            $perfil= isset($_POST['perfil']) ? $_POST['perfil'] : false;
            $pin = isset($_POST['pin']) ? $_POST['pin'] : false;
            $cuenta = isset($_POST['cuenta']) ? $_POST['cuenta'] : false;
            $producto_id = 0;
            if ($cuenta == 'Netflix'){
                $producto_id = 2;
            }elseif($cuenta == 'Disney'){
                $producto_id = 4;
            }elseif($cuenta == 'Paramount'){
                $producto_id = 6;
            }elseif($cuenta == 'Amazon'){
                $producto_id = 8;
            }elseif($cuenta == 'Max'){
                $producto_id = 10;
            }

            
            if ($correo && $password) {
                $producto = new Producto();
                $producto->setCorreo($correo);
                $producto->setPassword($password);
                $producto->setPerfil($perfil);
                $producto->setPin($pin);
                $producto->setPlataforma($cuenta);
                $producto->setProducto_id($producto_id);
                
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $producto->setId($id);
                    
                    $save = $producto->edit_pantalla();
                } else {
                    $save = $producto->save_pantalla();
                }
                
                if ($save) {
                    $_SESSION['producto'] = "complete";
                    echo "Producto guardado";
                } else {
                    $_SESSION['producto'] = "failed";
                }
            } else {
                $_SESSION['producto'] = "failed";
            }
        } else {
            $_SESSION['producto'] = "failed";
        }
        
        header('Location: ' . base_url . 'producto/cuentas');
        exit();
    }


    public function crea(){
        if(isset($_SESSION['identy'])){
            if ($edit = true){
                $edit = false;
            }
            $edit = false;
            $edit_pantalla = false;
            $pantalla = false;
            Utils::isAdmin();
            $producto_Model = new Producto();
            $pro = $producto_Model->getCrea();
            require_once 'views/producto/crear_cuentas.php';
        }
    }

    public function pantallas(){
        if(isset($_SESSION['identy'])){
            $edit = false;
            $pantalla = true;
            $edit_pantalla = false;
            Utils::isAdmin();
            $producto_Model = new Producto();
            $pro = $producto_Model->getPanta();
            require_once 'views/producto/crear_cuentas.php';
        }
    }

    public function editar_crea(){
        if(isset($_SESSION['identy'])){
            if ($edit = false){
                $edit = true;
            }
            $edit_pantalla = false;
            $pantalla = false;
            $edit = true;
            $id = $_GET['id'];
            Utils::isAdmin();
            $producto = new Producto();
            $producto->setId($id);
            $pro = $producto->getOna();
            require_once 'views/producto/crear_cuentas.php';
        }
    }

    
    public function editar() {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $edit = true;
            
            $producto = new Producto();
            $producto->setId($id);
            
            $pro = $producto->getOne();
            
            require_once 'views/producto/crear.php';
        } else {
            header('Location:' . base_url . 'producto/gestion');
        }
    }

    public function editar_cuentas() {
        Utils::isAdmin();
        if ($edit= false){
            $edit = true;
        }
        $pantalla = false;
        $edit = false;
        $edit_pantalla = true;

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $edit = true;

            $producto = new Producto();
            $producto->setId($id);

            $productos = $producto->getOna();


            require_once 'views/producto/crear_cuentas.php';
        } else {
            header('Location:' . base_url . 'producto/cuentas');
        }
    }


    public function editar_pantallas() {
        Utils::isAdmin();
        $edit = false;
        $pantalla = false;
        $edit_pantalla = true;

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $edit_pantalla = true;

            $producto = new Producto();
            $producto->setId($id);

            $pro = $producto->getOna();


            require_once 'views/producto/crear_cuentas.php';
        } else {
            header('Location:' . base_url . 'producto/cuentas');
        }
    }
    
    
    public function eliminar() {
        Utils::isAdmin();
        
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            
            $delete = $producto->delete();
            if ($delete) {
                $_SESSION['delete'] = 'complete';
            } else {
                $_SESSION['delete'] = 'failed';
            }
        } else {
            $_SESSION['delete'] = 'failed';
        }
        
        header('Location:' . base_url . 'producto/gestion');
    }
}
