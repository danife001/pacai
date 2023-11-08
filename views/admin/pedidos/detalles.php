<h1 class="dashboard__heading"><?php echo $titulo; ?></h1>


<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/pedidos">
        <i class="fa-solid fa-circle-arrow-left">
            Volver
        </i>
    </a>
</div>
<div class="dashboard__contenedor">
    
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th class="table__th">Nombre</th>
                    <th class="table__th">Cantidad</th>
                    <th class="table__th">Subtotal</th>
                </tr>
            </thead>
            <tbody class="table__tbody">
                <?php $totalpedido=0 ?>
                <?php foreach ($detalles as $detalle) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $detalle->nombre ?>
                        </td>
                        <td class="table__td">
                            <?php echo $detalle->cantidad ?>
                        </td>
                        <td class="table__td">
                            $<?php echo $detalle->total ?>
                        </td>
                       <?php $totalpedido=$detalle->total+$totalpedido ?>
                    </tr>
                <?php } ?>
                <tr class="table__tr">
                <td class="table__td">
                    Total del pedido
                </td>
                <td class="table__td">
                    
                </td>
                <td class="table__td">
                    $<?php echo $totalpedido ?>
                </td>
                </tr>


            </tbody>
        </table>


</div>