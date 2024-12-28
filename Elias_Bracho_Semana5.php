<?php
session_start();

if (session_status() === PHP_SESSION_ACTIVE) {
    session_regenerate_id(true);
}

if (PHP_SAPI !== 'cli') {


    if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') {
        ini_set('session.cookie_secure', 1); 
    } else {
        error_log("Advertencia: 'session.cookie_secure' no se aplicó porque el sitio no usa HTTPS.");
    }


}

if (!isset($_SESSION['CREATED'])) {
    $_SESSION['CREATED'] = time();
} else {
    $timeElapsed = time() - $_SESSION['CREATED'];
    if ($timeElapsed > 1800) { 
        session_unset(); 
        session_destroy();
        session_start(); 
        session_regenerate_id(true); 
        $_SESSION['CREATED'] = time(); 
    }
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $product_id = htmlspecialchars($_POST['product_id']); 
    if (!isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] = 1; 
    } else {
        $_SESSION['cart'][$product_id]++; 
    }
}

function displayCart()
{
    if (empty($_SESSION['cart'])) {
        echo "<p>El carrito está vacío.</p>";
    } else {
        echo "<ul>";
        foreach ($_SESSION['cart'] as $product_id => $quantity) {
            echo "<li>Producto ID: " . htmlspecialchars($product_id) . " | Cantidad: $quantity</li>";
        }
        echo "</ul>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilos.css">
  <title>Carrito de compras</title>
</head>
<body>

  <div class="search-container">
    <input type="text" id="product-search" placeholder="Buscar producto">
    <button onclick="searchProducts()">Buscar</button>
  </div>

  <section id="results-container">

  </section>

  <section id="carrito-container">
    <h2>Tu Carrito</h2>
    <p>Los productos que agregues aparecerán aquí.</p>
  </section>

  <div class="notificacion"></div>

  <script src="productos.js"></script>
</body>
</html>
