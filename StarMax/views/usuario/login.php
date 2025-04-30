<div class="login-form">
<form  action="<?=base_url?>usuario/login" method="post">
    <label for="email">Email</label>
    <input type="email" name="email" />
    <label for="password">Contraseña</label>
    <input type="password" name="password" />
    <button type="submit">Logueo</button> <br/>
</form>

<a href="<?= base_url ?>usuario/registro">
<button class="btna" type="button">Registrarse</button>
</a>
</div>
