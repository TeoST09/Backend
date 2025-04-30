<h1>Gestión de Usuarios</h1>
	
<table>
	<tr>
		<th>ID</th>
		<th>NOMBRE</th>
		<th>SALDO</th>
		<th>CORREO</th>
	</tr>
	<?php while($usuario = $usus->fetch_object()): ?>
		<tr>
			<td><?=$usuario->id;?></td>
			<td><?=$usuario->nombre;?></td>
			<td><?=$usuario->saldo;?></td>
			<td><?=$usuario->email;?></td>
			<td>
				<a href="<?=base_url?>usuario/editar_usu&id=<?=$usuario->id?>"><button class="button button-gestion">Editar</button></a>
			</td>
		</tr>
	<?php endwhile; ?>
</table>
