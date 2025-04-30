<!-- BARRA LATERAL -->

<aside id="lateral">

	<div class="block_aside">
		<h4>Nav</h4>
		<ul>
		<li><a href="<?= base_url ?>">Inicio</a></li>
		<?php 
	if (isset($_SESSION['identy'])):
		$categorias = Utils::showCategorias(); 
		while ($cat = $categorias->fetch_object()): 
		?>
			<li><a href="<?= base_url ?>categoria/ver&id=<?= $cat->id ?>"><?= $cat->nombre ?></a></li>
		<?php 
			endwhile; 
		else: 
		?>
			<li><p>Para Poder Ver Todas las Secciones Logueate</p></li>
		<?php 
		endif; 
		?>
</ul>
	</div>
	<div id="carrito" class="block_aside">
		<h4>Mi carrito</h4>
		<ul>
			
			<?php if(isset($_SESSION['identy'])): ?>
			<?php $stats = Utils::statsCarrito(); ?>
			<?php if(isset($_SESSION['identy']) && ($_SESSION['identy']->rol == 'user' || $_SESSION['identy']->rol == 'admin')): ?>
					<li><a href="<?=base_url?>usuario/saldo">Ver Saldo</a></li>
			<?php endif; ?>
			<li><a href="<?=base_url?>carrito/index">Productos: (<?=$stats['count']?>)</a></li>
			<li><a href="<?=base_url?>carrito/index">Total: <?=$stats['total']?></a></li>
			<li><a href="<?=base_url?>carrito/index">Ver el carrito</a></li>
			<?php else: ?>
			<?php endif; ?>
		</ul>
	</div>
	
	<div id="login" class="block_aside">
		
		<?php if(!isset($_SESSION['identy'])): ?>
			<h4>Log IN</h4>
		<?php else: ?>
			<h4><?=$_SESSION['identy']->nombre?>
				<?php if(isset($_SESSION['identy']) && $_SESSION['identy']->rol == 'admin'): ?>
					<?=$_SESSION['admin'] = "Admin" ?>
			</h4>
			<?php endif; ?>
		<?php endif; ?>
		<ul>
			<?php if(isset($_SESSION['admin'])): ?>
				<li><a href="<?=base_url?>categoria/index">Gestionar categorias</a></li>
				<li><a href="<?=base_url?>producto/gestion">Gestionar productos</a></li>
				<li><a href="<?=base_url?>producto/cuentas">Gestionar Cuentas</a></li>
				<li><a href="<?=base_url?>pedido/gestion">Gestionar pedidos</a></li>
				<li><a href="<?=base_url?>usuario/reca_saldo">Gestionar Usuarios</a></li>
			<?php endif; ?>
			
			<?php if(isset($_SESSION['identy'])): ?>
				<li><a href="<?=base_url?>pedido/mis_pedidos">Mis pedidos</a></li>
				<li><a href="<?=base_url?>usuario/logout">Cerrar sesión</a></li>
			<?php else: ?> 
				<li><a href="usuario/enviar">Login</a></li>
			<?php endif; ?> 
			</ul>
		</div>

</aside>

<a href="https://wa.me/3196807865" class="whatsapp-logo" target="_blank">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" class="whatsapp-img">
    </a>
<!-- CONTENIDO CENTRAL -->
<div id="central">