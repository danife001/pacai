document.addEventListener('DOMContentLoaded',function(){
    iniciarApp();
})

const carrito={
    idusuario:0,
    productos:[]
}


function iniciarApp(){
    consultarApi();
    esconder()
    actuar()
    mostrarCarrito()
    idusuario()
    hacerResumen()
}

function idusuario(){
    carrito.idusuario = document.querySelector('#idusuario').value;
    
}


async function consultarApi(){
    try {
        const url= 'http://localhost:3000/api/productos';
        const resultado = await fetch(url);
        const productos = await resultado.json();
        mostrarProductos(productos);
    } catch (error){
        console.log(error);
    }
}


function mostrarProductos(productos){
    productos.forEach(productos => {
        const {id,nombre,descripcion,precio,stock,imagen_url,cantidad} = productos;
        
        const imagenProducto = document.createElement('img');
        imagenProducto.classList.add('imagen-producto')
       imagenProducto.src = `/img/productos/${imagen_url}.png`;

        const nombreProducto = document.createElement('p');
        nombreProducto.classList.add('nombre-producto');
        nombreProducto.textContent = nombre;

        const precioProducto = document.createElement('p');
        precioProducto.classList.add('precio-producto');
        precioProducto.textContent = `$ ${precio}`;

        const botonProducto = document.createElement('button');
        botonProducto.classList.add('boton-producto');
        botonProducto.dataset.idProducto= id;
        botonProducto.textContent = 'Agregar al carrito';
        botonProducto.onclick = function(){
            addCarrito(productos);
        };

        const productoDiv = document.createElement('div');
        productoDiv.classList.add('producto');
        
        productoDiv.appendChild(imagenProducto);
        productoDiv.appendChild(nombreProducto);
        productoDiv.appendChild(precioProducto);
        productoDiv.appendChild(botonProducto);

        document.querySelector('#productos').appendChild(productoDiv);
    });
}

function addCarrito(producto){
    const { id } = producto;
    let { productos } = carrito;
    if (productos.some(agregado => agregado.id === id)) {
        // console.log();
        producto.cantidad += 1;
        
    } else {
        carrito.productos = [...productos, producto];
    }

    localStorage.setItem('carrito',JSON.stringify(carrito))

    
    // console.log(carrito.productos);

}


function mostrarCarrito() {

    const carritoGuardado = JSON.parse(localStorage.getItem('carrito'));
    const limpio = document.querySelector('#carro');
    if (carritoGuardado === null) {
        limpio.innerHTML = 'no se a seleccionado ningun producto';
    } else {

        const { productos } = carritoGuardado;

        let totalcuenta = 0;
        let cuenta = 0;
        // console.log(carritoGuardado.productos);

        if (carritoGuardado.length === 0) {

            limpio.innerHTML = 'no se a seleccionado ningun producto';

        } else {
            limpio.innerHTML = '';


            productos.forEach(productos => {
                const { id, nombre, descripcion, precio, stock, imagen_url, cantidad } = productos;


                const imagenProducto = document.createElement('img');
                imagenProducto.classList.add('carrito-imagen')
                imagenProducto.src = `/img/productos/${imagen_url}.png`;

                const nombreProducto = document.createElement('p');
                nombreProducto.classList.add('carrito-nombre');
                nombreProducto.textContent = nombre;

                cuenta = precio * cantidad;

                const precioProducto = document.createElement('p');
                precioProducto.classList.add('carrito-precio');
                precioProducto.textContent = cuenta;

                const cantidadInput = document.createElement('input');
                cantidadInput.classList.add('carrito-cantidad-input');
                cantidadInput.type = 'number';
                cantidadInput.min = 1; // Establece un valor mínimo de 1
                cantidadInput.value = cantidad;
                cantidadInput.setAttribute('data-product-id', id);

                cantidadInput.addEventListener('change', function() {
                    const productId = this.getAttribute('data-product-id');
                    const newQuantity = parseInt(this.value, 10); // Convierte el valor ingresado a un número entero
                  
                    // Valida que la nueva cantidad sea mayor o igual a 1
                    if (newQuantity >= 1) {
                      // Lógica para actualizar la cantidad del producto en el carrito por su ID.
                      const producto = carritoGuardado.productos.find(producto => producto.id === productId);
                      if (producto) {
                        producto.cantidad = newQuantity;
                        // Actualiza el carrito en el almacenamiento local.
                        localStorage.setItem('carrito', JSON.stringify(carritoGuardado));
                        // Vuelve a mostrar el carrito con la cantidad actualizada.
                        mostrarCarrito();
                      }
                    } else {
                      // Restaura la cantidad a 1 si el valor ingresado es menor que 1 o no válido
                      this.value = 1;
                    }
                  });



                const eliminarProductoButton = document.createElement('button');
                eliminarProductoButton.classList.add('carrito-eliminar');
                eliminarProductoButton.textContent = 'Eliminar';
                eliminarProductoButton.setAttribute('data-product-id', id);
                eliminarProductoButton.addEventListener('click', function() {
                    const productId = this.getAttribute('data-product-id');
                    // Lógica para eliminar el producto del carrito por su ID.
                    // Puedes utilizar `filter` para crear un nuevo arreglo sin el producto que deseas eliminar.
                    carritoGuardado.productos = carritoGuardado.productos.filter(producto => producto.id !== productId);
                    // Actualiza el carrito en el almacenamiento local.
                    localStorage.setItem('carrito', JSON.stringify(carritoGuardado));
                    // Vuelve a mostrar el carrito con el producto eliminado.
                    mostrarCarrito();
                  });

                const productoDiv = document.createElement('div');
                productoDiv.classList.add('carrito');



                productoDiv.appendChild(imagenProducto);
                productoDiv.appendChild(nombreProducto);
                productoDiv.appendChild(cantidadInput);
                productoDiv.appendChild(precioProducto);
                productoDiv.appendChild(eliminarProductoButton);

                document.querySelector('#carro').appendChild(productoDiv);

                // console.log(cuenta);
                totalcuenta = cuenta + totalcuenta;
                // console.log(totalcuenta);
            })
            
            const cantidadProducto = document.createElement('p');
            cantidadProducto.classList.add('carrito-cantidad');
            cantidadProducto.textContent = `el total del carrito es $ ${totalcuenta}`;

            document.querySelector('#carro').appendChild(cantidadProducto);

        }
        
    }
}




function esconder(){
    const cart = document.querySelector('#cart')
    cart.classList.toggle('hidden') 
}

function actuar(){
    esconder()
    mostrarCarrito()
}


async function guardarCarrito(){
    const carritoGuardado = JSON.parse(localStorage.getItem('carrito'));
    const{ productos } = carritoGuardado;

    const idProducto = productos.map( producto => producto.id);
    const cantidad = productos.map( producto => producto.cantidad);
    // console.log(idProducto);

    const datos = new FormData();
    datos.append('usuario_id',carrito.idusuario)
    datos.append('producto_id',idProducto)
    datos.append('cantidad',cantidad)
    

    const url ='/api/carrito';

    const respuesta = await fetch(url,{
        method: 'POST',
        body: datos
    });
    
    const resultado = await respuesta.json();
    // console.log(resultado);
    window.location.href = "/paginas/pedido";
}

function limpiar(){
    const carritoGuardado = JSON.parse(localStorage.getItem('carrito'));
    carritoGuardado.productos = []; // Vacía el arreglo de productos
    // Actualiza el carrito en el almacenamiento local.
    localStorage.removeItem('carrito'); // Elimina la entrada 'carrito' en el almacenamiento local
    // Vuelve a mostrar el carrito vacío.
    mostrarCarrito();
}

function borrarCarro(){
    localStorage.clear()
    
}
function alInicio(){
    window.location.href = "/";
    limpiar()
}


document.addEventListener('DOMContentLoaded', function () {
    // Selecciona el botón por su ID
    var boton = document.getElementById('detalles');

    // Agrega un evento de clic al botón
    boton.addEventListener('click', function () {
        // Aquí puedes realizar acciones cuando se haga clic en el botón
        window.location.href = "/paginas/detalles"
    });
});


