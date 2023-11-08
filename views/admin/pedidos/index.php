<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>


<div class="dashboard__contenedor">
    <?php if (!empty($pedidos)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th class="table__th">Numero del pedido</th>
                    <th class="table__th">Id del cliente</th>
                    <th class="table__th">Nombre del cliente</th>
                    <th class="table__th">Fecha del pedido</th>
                    <th class="table__th">Estado</th>
                    <th class="table__th">Tipo de pago </th>
                    <th class="table__th"></th>
                </tr>
            </thead>
            <tbody class="table__tbody">
                <?php foreach ($pedidos as $pedido) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $pedido->id ?>
                        </td>
                        <td class="table__td">
                            <?php echo $pedido->usuario_id ?>
                        </td>
                        <td class="table__td">
                            <?php echo $pedido->nombre ?>
                        </td>
                        <td class="table__td">
                            <?php echo $pedido->fecha ?>
                        </td>
                        <td class="table__td">
                            <?php echo $pedido->estado ?>
                        </td>
                        <td class="table__td">
                            <?php echo $pedido->pago ?>
                        </td>
                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/admin/pedidos/detalles?id=<?php echo $pedido->id; ?>">
                            <i class="fa-solid fa-circle-info"></i>
                                detalles</a>
                            <a class="table__accion table__accion--editar" href="/admin/pedidos/editar?id=<?php echo $pedido->id; ?>">
                                <i class="fa-regular fa-pen-to-square"></i>
                                Actualizar</a>
                            <form method="POST" action="/admin/pedidos/eliminar" class="tabla__formulario">
                                <input type="hidden" name="id" value="<?php echo $pedido->id; ?>">
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