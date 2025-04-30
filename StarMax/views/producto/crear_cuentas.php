
<?php if($edit == false && $pantalla == false && $edit_pantalla == false): ?>
<h3>Crear Cuentas</h3>
    <?php if(isset($producto_Model)): ?>
        <?php $url_action = base_url . 'producto/save_cuenta'; ?>
    <div class="login-form">
        <form action="<?=$url_action?>" method="POST">


        <label for="">Correo</label>
        <input type="email" name="correo" required>

        <label for="">Contraseña</label>
        <input type="text" name="password" required>
            <label for="cuenta">Cuenta:</label>
            <?php $pras = Utils::showPlataformas(); ?>
            <select name="cuenta">
			<?php while ($cat = $pras->fetch_object()): ?>
				<option value="<?= $cat->nombre ?>" <?=isset($pro) && is_object($pro) == $cat->nombre? 'selected' : ''; ?>>
					<?= $cat->nombre?>
				</option>
			<?php endwhile; ?>
		</select>
            <button class="btn" type="submit">Guardar</button>
        </form>
    </div>
    <?php endif; ?>
<?php endif; ?>

<?php if(isset($producto) && ($edit == true) && ($pantalla == false) && ($edit_pantalla== false)): ?>
<h3>Editar Cuenta</h3>
    <?php $url_action = base_url . 'producto/save_cuenta&id='. $_GET['id']; ?>
    <div class="login-form">
        <form action="<?=$url_action?>" method="POST">

        <h3><?= $producto->getPlataforma() ?></h3>

            <label for="">Plataforma (No Modificar)</label>
            <input type="text" value="<?=isset($pro) && is_object($pro) ? $pro->plataforma : ''; ?>" >


            <label for="">Correo</label>
            <input type="email" name="correo" value="<?=isset($pro) && is_object($pro) ? $pro->correo : ''; ?>" required>


            <label for="">Contraseña</label>
            <input type="text" name="password" value="<?=isset($pro) && is_object($pro) ? $pro->password : ''; ?>" required>

            <label for="cuenta">Cuenta</label>
		<?php $pras = Utils::showPlataformas(); ?>

		<select name="cuenta">
                <?php while ($cat = $pras->fetch_object()): ?>
				<option value="<?= $cat->nombre ?>" <?=isset($pro) && is_object($pro) == $cat->nombre? 'selected' : ''; ?>>
					<?= $cat->nombre?>
				</option>
			<?php endwhile; ?>
		</select>

            <button type="submit">Guardar</button>
        </form>
    </div>
<?php endif; ?>



<?php if($pantalla == true && $edit == false && $edit_pantalla == false): ?>
<h3>Crear Pantallas</h3>
    <?php if(isset($producto_Model)): ?>
        <?php $url_action = base_url . 'producto/save_pantalla'; ?>
    <div class="login-form">
        <form action="<?=$url_action?>" method="POST">


        <label for="">Correo</label>
        <input type="email" name="correo" required>

        <label for="">Contraseña</label>
        <input type="text" name="password" required>

            <label for="">Perfil</label>
            <input type="text" name="perfil">

            <label for="">Pin</label>
            <input type="text" name="pin">

            <?php $pras = Utils::showPlataformas(); ?>
            <select name="cuenta">
			<?php while ($cat = $pras->fetch_object()): ?>
				<option value="<?= $cat->nombre ?>" <?=isset($pro) && is_object($pro) == $cat->nombre? 'selected' : ''; ?>>
					<?= $cat->nombre?>
				</option>
			<?php endwhile; ?>
		</select>
            <button class="btn" type="submit">Guardar</button>
        </form>
    </div>
    <?php endif; ?>
<?php endif; ?>


<?php if(isset($producto) && ($edit == false) && ($pantalla == false) && ($edit_pantalla == true)): ?>
<h3>Editar Cuenta</h3>
    <?php $url_action = base_url . 'producto/save_cuenta&id='. $_GET['id']; ?>
    <div class="login-form">
        <form action="<?=$url_action?>" method="POST">

        <h3><?= $producto->getPlataforma() ?></h3>

            <label for="">Plataforma (No Modificar)</label>
            <input type="text" value="<?=isset($pro) && is_object($pro) ? $pro->plataforma : ''; ?>" >


            <label for="">Correo</label>
            <input type="email" name="correo" value="<?=isset($pro) && is_object($pro) ? $pro->correo : ''; ?>" required>


            <label for="">Contraseña</label>
            <input type="text" name="password" value="<?=isset($pro) && is_object($pro) ? $pro->password : ''; ?>" required>

            <label for="">Perfil</label>
            <input type="text" name="perfil" value="<?=isset($pro) && is_object($pro) ? $pro->perfil : ''; ?>" required>
            

            <label for="">Pin</label>
            <input type="text" name="pin" value="<?=isset($pro) && is_object($pro) ? $pro->pin : ''; ?>" required>



		<?php $pras = Utils::showPlataformas(); ?>

		<select name="cuenta">
                <?php while ($cat = $pras->fetch_object()): ?>
				<option value="<?= $cat->nombre ?>" <?=isset($pro) && is_object($pro) == $cat->nombre? 'selected' : ''; ?>>
					<?= $cat->nombre?>
				</option>
			<?php endwhile; ?>
		</select>

            <button type="submit">Guardar</button>
        </form>
    </div>
<?php endif; ?>