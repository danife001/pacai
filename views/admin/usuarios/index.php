<h1 class="dashboard__heading"><?php echo $titulo; ?></h1>

<div class="dashboard__contenedor">
    <?php if (!empty($usuarios)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th class="table__th">Nombre de usuario</th>
                    <th class="table__th">Email de usuario</th>
                    <th class="table__th">Rol</th>
                    <th class="table__th"></th>
                </tr>
            </thead>
            <tbody class="table__tbody">
                <?php foreach ($usuarios as $usuario) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $usuario->nombre ?>
                            <?php echo $usuario->apellido ?>
                        </td>
                        <td class="table__td">
                            <?php echo $usuario->email ?>
                        </td>
                        <td class="table__td">
                            <?php if ($usuario->admin == 1){
                                    echo 'Administrador';
                            }else{
                                echo 'Usuario';
                            } ?>
                        </td>
                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/admin/usuarios/editar?id=<?php echo $usuario->id; ?>">
                                <i class="fa-regular fa-pen-to-square"></i>
                                Editar</a>
                            <form method="POST" action="/admin/usuarios/eliminar"  class="tabla__formulario">
                                <input type="hidden" name="id" value="<?php echo $usuario->id; ?>">
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
    <?php } else { ?>
        <p class="text-center">No Hay usuarios</p>
    <?php } ?>
</div>
