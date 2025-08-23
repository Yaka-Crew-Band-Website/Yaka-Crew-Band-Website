<?php
// YCMerch-cartproducts.php
// This page displays the products added to the cart, calculates total cost, and matches the style of other product pages.


session_start();
require_once __DIR__ . '/YCdb_connection.php';

// Fetch cart items from session
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$total = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Your Cart - YAKA Crew</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/YCMerch-product.css">
    <style>
        body {
            background-color: #000 !important;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
        }
        main.container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding-top: 100px;
            box-sizing: border-box;
        }
        .cart-shell {
            margin-top: 0;
        }
        .cart-shell {
            max-width: 900px;
            margin: 0 auto;
            margin-top: 40px;
            background: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));
            border-radius: 18px;
            box-shadow: 0 8px 40px rgba(0,0,0,0.6);
            padding: 36px 32px 32px 32px;
            border: 1px solid rgba(149,110,47,0.12);
        }
        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 24px;
            background: #000000ff;
            color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 12px rgba(0,0,0,0.15);
        }
        .cart-table th, .cart-table td {
            padding: 14px 18px;
            border-bottom: 1px solid #654922;
            text-align: left;
        }
        .cart-table th {
            background: #654922;
            color: #fff;
            font-size: 1.08rem;
            font-family: 'Orbitron', sans-serif;
            letter-spacing: 0.5px;
        }
        .cart-table tr:last-child td {
            border-bottom: none;
        }
        .cart-total {
            text-align: right;
            font-size: 1.2rem;
            color: #fff;
            margin-top: 18px;
            font-weight: 700;
        }
        .btn {
            background-color: var(--accent);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 12px 28px;
            font-size: 1rem;
            font-weight: 700;
            margin-top: 18px;
            transition: background 0.2s;
            text-decoration: none;
            display: inline-block;
        }
        .btn:hover {
            background-color: #7d5620;
            color: #fff;
        }
        .empty-cart {
            color: #bfb2a2;
            font-size: 1.1rem;
            margin: 32px 0 24px 0;
            text-align: center;
        }
    </style>
</head>
<body>

<header>
    <div class="navbar">
        <div class="logo">
            <a href="YCMerch-tshirts.php">
                <img src="source/YCMerch-images/logo.jpg" alt="Yaka Crew Logo" />
            </a>
        </div>
    </div>
</header>

<main class="container">
    <section class="cart-shell">
        <h1 class="product-title" style="margin-bottom: 18px;">Your Cart</h1>
        <?php if (empty($cart)): ?>
            <div class="empty-cart">Your cart is empty.</div>
        <?php else: ?>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($cart as $item): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['name']); ?></td>
                        <td>₹<?php echo number_format($item['price'], 2); ?></td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td>₹<?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                    </tr>
                    <?php $total += $item['price'] * $item['quantity']; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
            <div class="cart-total">
                Total Cost: ₹<?php echo number_format($total, 2); ?>
            </div>
        <?php endif; ?>
        <a href="YCMerch-product.php" class="btn">Continue Shopping</a>
    </section>
</main>

</body>
</html>
