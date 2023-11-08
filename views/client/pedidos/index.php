<h1 class="dashboard__heading"><?php echo $titulo; ?></h1>

<div class="dashboard__contenedor">
    <?php if (!empty($pedidos)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th class="table__th">Estado del pedido </th>
                    <th class="table__th">Direccion de entrega</th>
                    <th class="table__th">Fecha del pedido</th>
                    <th class="table__th"></th>
                </tr>
            </thead>
            <tbody class="table__tbody">
                <?php foreach ($pedidos as $pedido) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $pedido->estado ?>
                        </td>
                        <td class="table__td">
                            <?php echo $pedido->direccion ?>
                        </td>
                        <td class="table__td">
                            <?php echo $pedido->fecha ?>
                        </td>
                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/client/pedidos/detalles?id=<?php echo $pedido->id; ?>">
                                <i class="fa-regular fa-pen-to-square"></i>
                                Detalles del pedido</a>
      
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
                <?php 
            echo $paginacion;
        ?>
    <?php } else { ?>
        <p class="text-center">No Hay Pedidos</p>
    <?php } ?>
</div>

