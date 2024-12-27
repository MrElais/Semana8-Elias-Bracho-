# Semana8-Elias-Bracho-
Proyecto: Carrito de compras

Este proyecto es una aplicación web básica para gestionar un carrito de compras. Los usuarios pueden buscar productos, agregarlos al carrito y ver un resumen de los productos seleccionados. El sistema utiliza sesiones para mantener los datos del carrito.

## Características
- **Manejo de sesiones para garantizar la seguridad del usuario.
- **Funcionalidad de agregar productos al carrito.
- **Interfaz de usuario para buscar productos y visualizar el carrito
- **No requiere una base de datos, lo que lo hace ligero y fácil de implementar.

## Estructura del proyecto
```
/carrito-compras
│
├── src/
│   ├── index.php         # Código principal en PHP
│   ├── estilos.css       # Archivo de estilos CSS
│   ├── productos.js      # Archivo de scripts JavaScript
│
├── README.md             # Documentación del proyecto
└── .gitignore            # Configuración para Gitto
```

## Requisitos
- PHP 7.4 o superior instalado en tu sistema.
- Visual Studio Code con la extensión PHP Server para ejecutar el proyecto.

## Instalación y uso
1. Clona este repositorio:
   ```bash
   git clone https://github.com/MrElais/Semana8-Elias-Bracho-.git
   ```
2. Abre el proyecto en Visual Studio Code.
3. Presiona clip derecho en el proyecto y selecciona PHP Server: Serve Project.

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
- Integrar metodo de pago para el carrito de compras.

## Contribuciones
Las contribuciones son bienvenidas para ayudar en este proyecto.
