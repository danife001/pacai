<aside class="dashboard__sidebar">
    <nav class="dashboard__menu">
        <a href="/client/dashboard" class="dashboard__enlace <?php echo pagina_actual('/dashboard') ? 'dashboard__enlace--actual': '' ?>">
        <i class="fa-solid fa-house dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Inicio
            </span>
        </a>
        <a href="/client/pedidos" class="dashboard__enlace <?php echo pagina_actual('/pedidos') ? 'dashboard__enlace--actual': '' ?>">
        <i class="fa-solid fa-store dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Pedidos
            </span>
        </a>
        <a href="/client/perfil" class="dashboard__enlace <?php echo pagina_actual('/perfil') ? 'dashboard__enlace--actual': '' ?>">
        <i class="fa-solid fa-truck dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Pefil
            </span>
        </a>
    </nav>
</aside>