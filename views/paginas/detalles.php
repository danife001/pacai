<h2 class="acai__titulo"><?php echo $titulo ?></h2>

<?php
$cuenta = 0;
$totalcuenta = 0;
?>

<div class="dashboard__contenedor">
    <table class="table">
        <thead class="table__thead">
            <tr>
                <th class="table__th">Nombre</th>
                <th class="table__th">Cantidad</th>
                <th class="table__th"></th>
            </tr>
        </thead>
        <tbody class="table__tbody">
            <?php foreach ($detalles as $detalle) { ?>
                <tr class="table__tr">
                    <td class="table__td">
                        <?php echo $detalle->nombre ?>
                    </td>
                    <td class="table__td">
                        <?php echo $detalle->cantidad ?>
                    </td>
                    <td class="table__td">
                        $ <?php echo $detalle->precio ?>
                    </td>
                    <?php $cuenta = $detalle->precio * $detalle->cantidad ?>

                    <?php $totalcuenta =   $cuenta + $totalcuenta ?>


                </tr>
            <?php } ?>

           
                <?php foreach ($detalles as $detalle) { ?>
                    <input type="hidden" name="pedidoId" id="pedidoId" value="<?php echo $detalle->pedidoId ?>">
                    <input type="hidden" name="producto_id" id="producto_id" value="<?php echo $detalle->producto_id ?>">
                    <input type="hidden" name="cantidad" id="cantidad" value="<?php echo $detalle->cantidad ?>">
                    <input type="hidden" name="precio" id="precio" value="<?php echo $detalle->precio ?>">
                    <input type="hidden" name="total" id="total" value="<?php echo $totalcuenta ?>">
                <?php } ?>

            


            <tr>
                <td>
                El total del pedido es :
                </td>
                <td>
                $<?php echo $totalcuenta ?> 
                </td>
                <td>
                <button class="cart__btn" onclick="alInicio()">volver al inicio</button>
                </td>

            </tr>
            </form>
        </tbody>
    </table>

</div>