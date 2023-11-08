<h1 class="dashboard__heading"><?php echo $titulo; ?></h1>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/usuarios">
        <i class="fa-solid fa-circle-arrow-left">
            Volver
        </i>
    </a>
</div>
<div class="dashboard__formulario">
    <?php
        include __DIR__.'../../../templates/alertas.php';
    ?>
    <form method="POST" class="formulario">
    <fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Informacion del Usuario</legend>

    <div class="formulario__campo">
        <h3 for="nombre" class="formulario__label">Id: <?php echo $usuario->id; ?></h3>
        <input type="hidden" class="formulario__input" id="id" name="id"  value="<?php echo $usuario->id ?? ''; ?>">
        <h3 for="nombre" class="formulario__label">Nombre del usuario: <?php echo $usuario->nombre; ?></h3>
        <input type="hidden" class="formulario__input" id="usuario_id" name="usuario_id" value="<?php echo $pedido->usuario_id ?? ''; ?>">
        <h3 for="nombre" class="formulario__label">Apellido del usuario: <?php echo $usuario->apellido; ?></h3>
        <input type="hidden" class="formulario__input" id="apellido" name="apellido"  value="<?php echo $usuario->apellido ?? ''; ?>">
        <h3 for="nombre" class="formulario__label">Email: <?php echo $usuario->email; ?></h3>
        <input type="hidden" class="formulario__input" id="email" name="email"  value="<?php echo $usuario->email ?? ''; ?>">
       
        <label for="admin">rol:</label>
        <select name="admin" id="admin" multiple>
            <option value="1">administrador</option>
            <option value="0">En usuario</option>
        </select>
    </div>
</fieldset>
        <input class="formulario__submit formulario__submit--registrar" type="submit" value="Cambiar rol">
    </form>
</div>