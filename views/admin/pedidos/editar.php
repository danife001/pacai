<h1 class="dashboard__heading"><?php echo $titulo; ?></h1>
<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/pedidos">
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
        <h3 for="nombre" class="formulario__label">Id: <?php echo $pedido->id; ?></h3>
        <input type="hidden" class="formulario__input" id="Id" name="Id"  value="<?php echo $pedido->Id ?? ''; ?>">
        <h3 for="nombre" class="formulario__label">Id del usuario: <?php echo $pedido->usuario_id; ?></h3>
        <input type="hidden" class="formulario__input" id="usuario_id" name="usuario_id" value="<?php echo $pedido->usuario_id ?? ''; ?>">
        <h3 for="nombre" class="formulario__label">Fecha del pedido: <?php echo $pedido->fecha; ?></h3>
        <input type="hidden" class="formulario__input" id="fecha" name="fecha"  value="<?php echo $pedido->fecha ?? ''; ?>">
        <h3 for="nombre" class="formulario__label">Metodo de pago: <?php echo $pedido->pago; ?></h3>
        <input type="hidden" class="formulario__input" id="pago" name="pago"  value="<?php echo $pedido->pago ?? ''; ?>">
        <h3 for="nombre" class="formulario__label">Direccion: <?php echo $pedido->direccion; ?></h3>
        <input type="hidden" class="formulario__input" id="direccion" name="direccion"  value="<?php echo $pedido->direccion ?? ''; ?>">
        <label for="estado">Estado del envio:</label>
        <select name="estado" id="estado" multiple>
            <option value="pendiente">pendiente</option>
            <option value="transito">En Transito</option>
            <option value="Entregado">Entregado</option>
        </select>
    </div>
</fieldset>
        <input class="formulario__submit formulario__submit--registrar" type="submit" value="Actualizar Email">
    </form>
</div>