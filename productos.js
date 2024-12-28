const productos = [
    { id: 1, nombre: "Camiseta", categoria: "Ropa", precio: 20 },
    { id: 2, nombre: "Pantalón", categoria: "Ropa", precio: 30 },
    { id: 3, nombre: "Zapatos", categoria: "Calzado", precio: 50 },
    { id: 4, nombre: "Gorra", categoria: "Accesorios", precio: 15 },
    { id: 5, nombre: "Abrigo", categoria: "Ropa", precio: 100 },
    { id: 6, nombre: "Sandalias", categoria: "Calzado", precio: 25 }
];

let carrito = {};

function searchProducts() {
    const query = document.getElementById("product-search").value.toLowerCase();
    const resultados = productos.filter(producto =>
        producto.nombre.toLowerCase().includes(query) ||
        producto.categoria.toLowerCase().includes(query)
    );
    mostrarResultados(resultados);
}

function mostrarResultados(resultados) {
    const contenedor = document.getElementById("results-container");
    contenedor.innerHTML = "";

    if (resultados.length === 0) {
        contenedor.innerHTML = "<p>No se encontraron productos.</p>";
        return;
    }

    resultados.forEach(producto => {
        const productoDiv = document.createElement("div");
        productoDiv.classList.add("producto");
        productoDiv.innerHTML = `
            <h3>${producto.nombre}</h3>
            <p>Categoría: ${producto.categoria}</p>
            <p>Precio: $${producto.precio}</p>
            <button onclick="agregarAlCarrito(${producto.id})">Agregar al carrito</button>
        `;
        contenedor.appendChild(productoDiv);
    });
}

function agregarAlCarrito(productoId) {
    if (!carrito[productoId]) {
        const producto = productos.find(prod => prod.id === productoId);
        carrito[productoId] = { ...producto, cantidad: 1 };
    } else {
        carrito[productoId].cantidad++;
    }

    mostrarNotificacion(`"${carrito[productoId].nombre}" fue agregado al carrito.`);
    actualizarCarrito();
}

function actualizarCarrito() {
    const carritoContenedor = document.getElementById("carrito-container");
    carritoContenedor.innerHTML = "";

    if (Object.keys(carrito).length === 0) {
        carritoContenedor.innerHTML = "<p>El carrito está vacío.</p>";
        return;
    }

    let total = 0;

    Object.values(carrito).forEach(producto => {
        total += producto.precio * producto.cantidad;

        const productoDiv = document.createElement("div");
        productoDiv.classList.add("producto");
        productoDiv.innerHTML = `
            <h3>${producto.nombre}</h3>
            <p>Precio: $${producto.precio}</p>
            <p>Cantidad: ${producto.cantidad}</p>
            <button onclick="eliminarDelCarrito(${producto.id})">Eliminar</button>
        `;
        carritoContenedor.appendChild(productoDiv);
    });

    const totalDiv = document.createElement("div");
    totalDiv.classList.add("total");
    totalDiv.innerHTML = `<h3>Total: $${total}</h3>`;
    carritoContenedor.appendChild(totalDiv);
}

function eliminarDelCarrito(productoId) {
    if (carrito[productoId]) {
        carrito[productoId].cantidad--;
        if (carrito[productoId].cantidad === 0) {
            delete carrito[productoId];
        }
    }

    mostrarNotificacion(`Producto eliminado del carrito.`);
    actualizarCarrito();
}

function mostrarNotificacion(mensaje) {
    const notificacion = document.createElement("div");
    notificacion.classList.add("notificacion");
    notificacion.textContent = mensaje;

    document.body.appendChild(notificacion);

    setTimeout(() => {
        notificacion.remove();
    }, 3000);
}
