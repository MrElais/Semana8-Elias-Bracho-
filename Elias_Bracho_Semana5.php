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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    if (isset($input['metodo_pago']) && isset($input['total'])) {
        $metodoPago = $input['metodo_pago'];
        $total = $input['total'];

        if ($total <= 0) {
            echo json_encode(['success' => false, 'message' => 'El total no puede ser 0 o negativo.']);
            exit;
        }

        if (!in_array($metodoPago, ['tarjeta', 'paypal', 'transferencia'])) {
            echo json_encode(['success' => false, 'message' => 'Método de pago no válido.']);
            exit;
        }

        echo json_encode(['success' => true, 'message' => 'Pago procesado correctamente.']);
        exit;
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
    <title>Carrito de Compras</title>
</head>
<body>

<div class="search-container">
    <input type="text" id="product-search" placeholder="Buscar producto">
    <button onclick="searchProducts()">Buscar</button>
</div>

<section id="results-container"></section>

<section id="carrito-container">
    <h2>Tu Carrito</h2>
    <p>Los productos que agregues aparecerán aquí.</p>
</section>

 <section id="pago-container">
    <h2>Realizar Pago</h2>
    <form id="pago-form">
        <label for="metodo-pago">Seleccione el método de pago:</label>
        <select id="metodo-pago" name="metodo_pago" required>
            <option value="" disabled selected>Seleccione...</option>
            <option value="tarjeta">Tarjeta de crédito</option>
            <option value="paypal">PayPal</option>
            <option value="transferencia">Transferencia bancaria</option>
        </select>
        <button type="button" onclick="procesarPago()">Pagar</button>
    </form>
</section>

<div class="notificacion"></div>

<script src="productos.js"></script>
</body>
</html>   
