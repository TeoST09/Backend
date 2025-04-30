    <?php if($usus): ?>
    <h3>Editar usuario<?php $usus->nombre ?></h3>
    <h3>Id: <?=$usus->id;?></h3>
    <h3>Nombre: <?=$usus->email;?></h3>
    <h3>Saldo: <?=$usus->saldo;?></h3>
    <h3>Rol: <?=$usus->rol;?></h3>
    <?php $url_action = base_url."usuario/recagar_saldo&id=".$usus->id; ?>
    
    <div class="form_container">
        <form action="<?=$url_action?>" method="POST">
            <label for="saldo">Saldo</label>
            <input type="text" name="saldo" value="<?=$usus->saldo?>"/>

            <label for="rol">Rol</label>
            <select name="rol">
                <option value="null">Seleccione un rol</option>
                <option value="user" <?= $usus->rol == 'user' ? 'selected' : '' ?>>Usuario</option>
                <option value="admin" <?= $usus->rol == 'admin' ? 'selected' : '' ?>>Admin</option>
            </select>
            <button class="btn" type="submit">Guardar</button>
        </form>
    </div>
<?php endif; ?>