<h1 class="dashboard__heading"><?php echo $titulo; ?></h1>
<div class="dashboard__formulario">
    <?php
        include __DIR__.'../../../templates/alertas.php';
    ?>
    <form method="POST" class="formulario">
    <fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Informacion del Usuario</legend>

    <div class="formulario__campo">
        <h3 for="nombre" class="formulario__label">Nombre: <?php echo $usuario->nombre; ?></h3>
        <input type="hidden" class="formulario__input" id="nombre" name="nombre" placeholder="Nombre del cliente" value="<?php echo $usuario->nombre ?? ''; ?>">
        <h3 for="precio" class="formulario__label">Apellido: <?php echo $usuario->apellido; ?> </h3>
        <input type="hidden" class="formulario__input" id="apellido" name="apellido" placeholder="Apellido del cliente" value="<?php echo $usuario->apellido ?? ''; ?>">
        <h3 for="stock" class="formulario__label">Email</h3>
        <input type="text" class="formulario__input" id="email" name="email" placeholder="Cantidad del producto" value="<?php echo $usuario->email ?? ''; ?>">
    </div>
</fieldset>
        <input class="formulario__submit formulario__submit--registrar" type="submit" value="Actualizar Email">
    </form>
</div>