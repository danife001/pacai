<header class="header">
    <div class="header__contenedor">
        <nav class="header__navegacion">
            <?php if(!is_auth()) { ?>
               
            <a href="/registro" class="header__enlace">Registro</a>
            <a href="/login" class="header__enlace">Iniciar Sesión</a>
            <?php }else if( !is_admin()){?>
                <a href="/client/dashboard" class="header__enlace">Panel de usuario</a>
            <?php }else{?>
                <a href="/admin/dashboard" class="header__enlace">Panel de administrador</a>
             <?php }?>   
        </nav>
        <div class="header__contenido">
            <a href="/">
                <h1 class="header__logo">
                    A.C.A.I
                </h1>
            </a>

            <p class="header__texto">Tienda Virtual</p>
            <a href="/" class="header__boton">Ver Productos</a>
        </div>
    </div>
</header>
<div class="barra">
    <div class="barra__contenido">
        <a href="/">
            <h2 class="barra__logo">
                A.C.A.I
            </h2>
        </a>

        <nav class="navegacion">
            <button onclick="actuar()" class="navegacion__carrito">
                <i class="fa-solid fa-cart-shopping"></i>
            </button>
            <a href="/paginas/blog" class="navegacion__enlace">blog</a>
        </nav>
    </div>
</div>
<?php   if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
 ?>
<div id="cart" class="cart hidden">
    <?php if(isset($_SESSION['id'])) { ?>
        



    <div class="cart-carro">
        
            <div class="cart__header">
               

                <h3>productos</h3>
                <button class="cart__boton" type="button" onclick="actuar()">
                    <i class="fa-solid fa-circle-xmark"></i>
                </button>
                
            </div>

            <div class="" id="carro">

            </div>
            <input type="hidden" id="idusuario" value="<?php echo $_SESSION['id'] ?>">
            <div class="cart__footer">
            <button class="cart__btn" onclick="guardarCarrito()">Proceder al pago</button>
            <button class="cart__btn" onclick="limpiar()">Vaciar carrito</button>
            </div>
    </div>
        <?php } else { ?>
            <div class="cart-carro">
        
            <div class="cart__header">
               

                <h3>Carrito de compras</h3>
                <button class="cart__boton" type="button" onclick="actuar()">
                    <i class="fa-solid fa-circle-xmark"></i>
                </button>
                
            </div>

           
            
            <div class="cart__footer">
            <a href="/login" class="cart__btn">Iniciar Sesión</a>
            </div>
    </div>
            
       <?php } ?>     
</div>