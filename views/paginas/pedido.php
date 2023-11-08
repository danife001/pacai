<h1 class="dashboard__heading"><?php echo $titulo; ?></h1>

<div class="dashboard__formulario">
<?php
    require_once __DIR__ . '/../templates/alertas.php'
    ?>
<fieldset class="formulario__fieldset">
    <form method="POST" class="formulario" action="/paginas/detalles">
        <div class="formulario__campo"> 
    <legend class="formulario__legend">Informacion del Pedido</legend>
    <input type="hidden" class="formulario__input" id="usuario_id" name="usuario_id" value="<?php echo $id; ?>">
    <input type="hidden" class="formulario__input" id="fecha" name="fecha" value="<?php echo date('Y-m-d'); ?>">
    <input type="hidden" class="formulario__input" id="estado" name="estado" value="pendiente">
    
        <label for="direccion" class="formulario__label">Direccion</label>
        <input type="text" class="formulario__input" id="direccion" name="direccion" placeholder="Direccion de envio" >
        <label for="envio">Selecciona envio:</label>
        <select name="envio" id="envio" multiple>
            <option value="1">Recoger en la tienda</option>
            <option value="1">envio a una direccion</option>
        </select>
        <label for="pago">Metodo de pago</label>
        <select name="pago" id="pago" multiple>
            <option value="Efectivo">Efectivo</option>
            <option value="Tarjeta de credito">Tarjeta de credito</option>
        </select>
    </div>
    <input class="formulario__submit formulario__submit--registrar" type="submit" id="detalles" value="Pago y finalizar">
    </form>
</fieldset>
</div>