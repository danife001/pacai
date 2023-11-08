<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/productos/crear">
        <i class="fa-solid fa-circle-plus">
            Agregar Producto
        </i>
    </a>
</div>

<div class="dashboard__contenedor">
    <?php if (!empty($productos)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th class="table__th">Nombre</th>
                    <th class="table__th">Cantidad</th>
                    <th class="table__th"></th>
                </tr>
            </thead>
            <tbody class="table__tbody">
                <?php foreach ($productos as $producto) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $producto->nombre ?>
                        </td>
                        <td class="table__td">
                            <?php echo $producto->stock ?>
                        </td>
                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/admin/productos/editar?id=<?php echo $producto->id; ?>">
                                <i class="fa-regular fa-pen-to-square"></i>
                                Editar</a>
                            <form method="POST" action="/admin/productos/eliminar"  class="tabla__formulario">
                                <input type="hidden" name="id" value="<?php echo $producto->id; ?>">
                                <button class="table__accion table__accion--eliminar" type="submit">
                                <i class="fa-regular fa-circle-xmark"></i>
                                Eliminar
                                </button>
                            </form>        
                        </td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>
        <?php 
        echo $paginacion;
    ?>
    <?php } else { ?>
        <p class="text-center">No Hay Productos</p>
    <?php } ?>
</div>

