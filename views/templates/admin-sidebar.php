<aside class="dashboard__sidebar">
    <nav class="dashboard__menu">
        <a href="/admin/dashboard" class="dashboard__enlace <?php echo pagina_actual('/dashboard') ? 'dashboard__enlace--actual': '' ?>">
        <i class="fa-solid fa-house dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Inicio
            </span>
        </a>
        <a href="/admin/productos" class="dashboard__enlace <?php echo pagina_actual('/productos') ? 'dashboard__enlace--actual': '' ?>">
        <i class="fa-solid fa-store dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Productos
            </span>
        </a>
        <a href="/admin/pedidos" class="dashboard__enlace <?php echo pagina_actual('/pedidos') ? 'dashboard__enlace--actual': '' ?>">
        <i class="fa-solid fa-truck dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Pedidos
            </span>
        </a>
        <a href="/admin/usuarios" class="dashboard__enlace <?php echo pagina_actual('/usuarios') ? 'dashboard__enlace--actual': '' ?>">
        <i class="fa-solid fa-users dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Usuarios
            </span>
        </a>
    </nav>
</aside>