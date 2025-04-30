<h1>Crear nueva categoria</h1>

<form action="<?=base_url?>categoria/save" method="POST">
	<label for="nombre">Nombre</label>
	<input type="text" name="nombre" required/>
	
	<button class="btn" type="submit">Guardar</button>
</form>