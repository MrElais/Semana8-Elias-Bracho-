# Semana8-Elias-Bracho-
Proyecto: Carrito de compras

Este proyecto es una aplicación web básica para gestionar un carrito de compras. Los usuarios pueden buscar productos, agregarlos al carrito y ver un resumen de los productos seleccionados. El sistema utiliza sesiones para mantener los datos del carrito.

## Características
- **Gestión de sesiones seguras:** Utiliza cookies seguras y expira la sesión después de 30 minutos de inactividad.
- **Carrito de compras dinámico:** Permite agregar productos al carrito y visualizarlos en tiempo real.
- **Interfaz de usuario:** Incluye un campo de búsqueda de productos y una sección para mostrar los productos del carrito.

## Estructura del proyecto
```
root/
|-- index.php       # Código principal en PHP para la gestión del carrito
|-- estilos.css     # Estilos para la interfaz de usuario
|-- productos.js    # Funcionalidad JavaScript para la búsqueda y notificaciones
|-- README.md       # Descripción del proyecto
```

## Requisitos
- Servidor web con soporte para PHP 7.4 o superior.
- Navegador web moderno con soporte para JavaScript y CSS.

## Instalación y uso
1. Clona este repositorio:
   ```bash
   git clone https://github.com/MrElais/Semana8-Elias-Bracho-.git
   ```
2. Coloca los archivos en un servidor web.
3. Asegúrate de habilitar las sesiones en tu configuración de PHP.
4. Accede al archivo `index.php` desde tu navegador.

## Funcionalidades principales
### PHP
- **Sesiones:** Manejo seguro de sesiones con regeneración de IDs y limpieza automática.
- **Carrito:** Agrega productos al carrito usando el método POST.

### HTML
- Diseño de una interfaz simple con una barra de búsqueda y una lista de productos en el carrito.

### CSS y JavaScript
- **CSS:** Diseños responsivos y agradables visualmente.
- **JavaScript:** Búsqueda de productos y notificaciones en la página.

## Próximos pasos
- Integrar una base de datos para gestionar productos de manera dinámica.
- Agregar autenticación de usuarios.
- Mejorar la visualización del carrito con estilos avanzados.

## Contribuciones
Las contribuciones son bienvenidas. Por favor, abre un issue para discutir cualquier cambio importante antes de enviar un pull request.

