<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Informacion del Producto</legend>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre</label>
        <input type="text" class="formulario__input" id="nombre" name="nombre" placeholder="Nombre del producto" value="<?php echo $producto->nombre ?? ''; ?>">
        <label for="precio" class="formulario__label">Precio</label>
        <input type="number" class="formulario__input" id="precio" name="precio" placeholder="precio del producto" value="<?php echo $producto->precio ?? ''; ?>">
        <label for="stock" class="formulario__label">Cantidad</label>
        <input type="number" class="formulario__input" id="stock" name="stock" placeholder="Cantidad del producto" value="<?php echo $producto->stock ?? ''; ?>">
        <label for="imagen_url" class="formulario__label">Imagen</label>
        <input type="file" class="formulario__input formulario__input--file" id="imagen_url" name="imagen_url" >
        <?php if(isset($producto->imagen_actual)){ ?>
            <p class="formulario__texto">Imagen actual:</p>
            <div class="formulario__imagen">
                <picture>
                    <source srcset="<?php echo $_ENV['HOST'] . '/img/productos/' . $producto->imagen_actual; ?>.webp" type="image/webp">
                    <source srcset="<?php echo $_ENV['HOST'] . '/img/productos/' . $producto->imagen_actual; ?>.png" type="image/png">
                    <img src="<?php echo $_ENV['HOST'] . '/img/productos/' . $producto->imagen_actual; ?>.png" alt="Imagen Producto">
                </picture>
            </div>
        <?php }?>
        <label for="descripcion" class="formulario__label">Descripción del producto</label>
        <textarea class="formulario__input" maxlength="200" id="descripcion" cols="40" name="descripcion" rows="4" value="<?php echo $producto->descripcion ?? ''; ?>"><?php echo $producto->descripcion ?></textarea>
    </div>
</fieldset>