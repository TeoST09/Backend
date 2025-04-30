<h1>Gestión de Cuentas</h1>
	
<a href="<?=base_url?>producto/crea" class="button button-small">
	Crear Cuentas
</a>

<br>
<a href="<?=base_url?>producto/pantallas" class="button button-small">
	Crear Pantallas
</a>

<table>
	<tr>
		<th>ID</th>
		<th>PLATAFORMAS</th>
		<th>TIPO</th>
		<th>CORREO</th>
		<th>CONTRASEÑA</th>
		<th>PERFIL</th>
		<th>PIN</th>
	</tr>
	<?php while($producto = $productos->fetch_object()): ?>
		<tr>
			<td><?=$producto->id;?></td>
			<td><?=$producto->plataforma;?></td>
			<td><?=$producto->tipo;?></td>
			<td><?=$producto->correo;?></td>
			<td><?=$producto->password;?></td>
			<td><?=$producto->perfil;?></td>
			<td><?=$producto->pin;?></td>
			<td>
				<?php if($producto->tipo == "Cuenta"):?>
				<a href="<?=base_url?>producto/editar_crea&id=<?=$producto->id?>"><button class="button button-gestion">Editar</button></a>
				<?php else: ?>
				<a href="<?=base_url?>producto/editar_pantallas&id=<?=$producto->id?>"><button class="button button-gestion">Editar</button></a>
			</td>
		</tr>
		<?php endif; ?>
	<?php endwhile; ?>
</table>
