<?php
// YCMerch-posterorders.php: Order summary for posters only (PDO version)
require_once __DIR__ . '/YCdb_connection.php';


// --- POST/REDIRECT/GET pattern to prevent duplicate order on refresh ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $poster_id = isset($_POST['poster_id']) ? (int)$_POST['poster_id'] : (isset($_POST['id']) ? (int)$_POST['id'] : 0);
  $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
  $price = isset($_POST['price']) ? floatval($_POST['price']) : 0.00;

  // Fetch poster details
  $poster_name = '';
  $poster_image = '';
  $stmt = $pdo->prepare("SELECT name, image FROM posters WHERE id = ? LIMIT 1");
  $stmt->execute([$poster_id]);
  $row = $stmt->fetch();
  if ($row) {
    $poster_name = $row['name'];
    $poster_image = $row['image'];
  } else {
    die("Poster not found.");
  }

  $total_cost = $price * $quantity;

  // Insert order into poster_orders table (create table if not exists)
  $pdo->exec("CREATE TABLE IF NOT EXISTS poster_orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    poster_id INT NOT NULL,
    poster_name VARCHAR(100) NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    total_cost DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

  $stmt = $pdo->prepare("INSERT INTO poster_orders (poster_id, poster_name, quantity, price, total_cost) VALUES (?, ?, ?, ?, ?)");
  $stmt->execute([$poster_id, $poster_name, $quantity, $price, $total_cost]);
  $order_id = (int)$pdo->lastInsertId();

  // Redirect to self with GET params to prevent resubmission
  header("Location: " . $_SERVER['PHP_SELF'] . "?order_id=$order_id&poster_id=$poster_id&quantity=$quantity&price=$price");
  exit;
}

// GET: Show order summary only (no DB insert)

if (isset($_GET['order_id'], $_GET['poster_id'], $_GET['quantity'])) {
  $order_id = (int)$_GET['order_id'];
  $poster_id = (int)$_GET['poster_id'];
  $quantity = (int)$_GET['quantity'];

  $poster_name = '';
  $poster_image = '';
  $price = 0.00;
  require_once __DIR__ . '/YCdb_connection.php';
  if ($poster_id > 0) {
    $stmt = $pdo->prepare("SELECT name, image, price FROM posters WHERE id = ? LIMIT 1");
    $stmt->execute([$poster_id]);
    $row = $stmt->fetch();
    if ($row) {
      $poster_name = $row['name'];
      $poster_image = $row['image'];
      // Some DBs may store price as string, so always cast
      $price = isset($row['price']) ? (float)$row['price'] : 0.00;
    }
    $total_cost = $price * $quantity;
  } else {
    $price = 0.00;
    $total_cost = 0.00;
  }
} else {
  die("Invalid request method.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Poster Order Summary - YAKA Crew</title>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
  :root {
    --bg: #000000;
    --accent: #956E2F;
    --input-bg: #1a1a1a;
    --input-border: #444444;
    --text-light: #ddd;
    --text-dark: #111;
    --success: #27ae60;
    --error: #e74c3c;
    --transition: 0.3s ease;
  }
  * { box-sizing: border-box; }
  body {
    margin: 0;
    background: var(--bg);
    font-family: 'Poppins', sans-serif;
    color: var(--text-light);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
  }
  .container {
    max-width: 900px;
    width: 100%;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
    background: #000000ff;
    border-radius: 15px;
    padding: 40px 50px;
  }
  @media (max-width: 700px) {
    .container {
      grid-template-columns: 1fr;
      padding: 30px 25px;
    }
  }
  .card {
    background: var(--input-bg);
    border-radius: 12px;
    padding: 30px 25px;
  }
  h1, h2 {
    color: var(--accent);
    margin-bottom: 25px;
    font-weight: 600;
  }
  .order-details p {
    display: flex;
    justify-content: space-between;
    border-bottom: 1px solid #333;
    padding: 8px 0;
    font-weight: 500;
    font-size: 1rem;
  }
  .order-details p strong {
    color: var(--accent);
    min-width: 140px;
  }
  .total {
    font-size: 1.4rem;
    font-weight: 700;
    margin-top: 20px;
    text-align: right;
    color: var(--accent);
  }
  .payment-methods {
    display: flex;
    flex-direction: column;
    gap: 16px;
    margin-bottom: 30px;
  }
  .payment-methods label {
    display: flex;
    align-items: center;
    gap: 16px;
    background: var(--bg);
    padding: 12px 20px;
    border-radius: 12px;
    cursor: pointer;
    border: 2.5px solid transparent;
    transition: border-color var(--transition);
    font-weight: 600;
    font-size: 1.1rem;
  }
  .payment-methods label:hover {
    border-color: var(--accent);
  }
  .payment-methods input[type="radio"] {
    display: none;
  }
  .payment-methods input[type="radio"]:checked + img {
    filter: drop-shadow(0 0 5px var(--accent));
  }
  .payment-methods input[type="radio"]:checked + img + span {
    color: var(--accent);
    font-weight: 700;
  }
  .payment-methods img {
    width: 60px;
    border-radius: 8px;
    background: #fff;
  }
  input[type="tel"],
  input[type="text"] {
    width: 100%;
    background: var(--input-bg);
    border: 2px solid var(--input-border);
    border-radius: 12px;
    color: var(--text-light);
    font-size: 1.1rem;
    padding: 14px 18px;
    font-weight: 500;
    outline-offset: 3px;
    transition: border-color var(--transition);
  }
  input[type="tel"]:focus,
  input[type="text"]:focus {
    border-color: var(--accent);
    outline: none;
  }
  button {
    margin-top: 20px;
    background: var(--accent);
    border: none;
    border-radius: 14px;
    padding: 14px 0;
    font-weight: 700;
    font-size: 1.1rem;
    color: var(--text-dark);
    cursor: pointer;
    transition: background-color var(--transition), transform 0.2s ease;
  }
  button:hover:not(:disabled) {
    background: #a17a3c;
    transform: scale(1.05);
  }
  button:disabled {
    background: #444;
    cursor: not-allowed;
    transform: none;
  }
  #otpSection {
    margin-top: 30px;
    display: flex;
    flex-direction: column;
    gap: 14px;
  }
  .message {
    margin-top: 15px;
    padding: 12px 18px;
    border-radius: 14px;
    font-weight: 600;
    font-size: 1rem;
    text-align: center;
  }
  .message.success {
    background: var(--success);
    color: #e7f9e7;
  }
  .message.error {
    background: var(--error);
    color: #fceaea;
  }

  /* Remove margin-top and match navbar style to YCMerch-merch1.php */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }
    body {
      background-color: #000;
      color: white;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      padding-top: 120px; /* Increased to ensure nav bar doesn't overlap */
      overflow-x: hidden;
    }
    .navbar {
      display: flex;
      align-items: center;
      background-color: #000000ff;
      padding: 10px 20px;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
    }
    .logo img {
      width: 120px;
      height: auto;
    }
    .nav-links {
      list-style: none;
      display: flex;
      margin-left: 300px;
      gap: 40px;
      position: relative;
    }
    .nav-links > li {
      position: relative;
      cursor: pointer;
      padding: 5px 10px;
      border-bottom: 2px solid transparent;
      transition: border 0.3s;
    }
    .nav-links > li:hover {
      border-bottom: 2px solid white;
    }
    .nav-links > li.active {
      border-bottom: 2px solid white;
    }
    .gallery-dropdown {
      position: relative;
    }
    .arrow {
      margin-left: 5px;
      cursor: pointer;
      transition: transform 0.3s ease;
    }
    .gallery-dropdown.active .arrow {
      transform: rotate(180deg);
    }
    .gallery-dropdown:hover .dropdown,
    .gallery-dropdown.active .dropdown {
      display: block;
    }
    .dropdown {
      display: none;
      position: absolute;
      top: 35px;
      left: 0;
      background-color: #222;
      padding: 10px 0;
      border-radius: 5px;
      min-width: 120px;
      z-index: 1000;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
      list-style: none;
    }
    .dropdown li {
      padding: 8px 15px;
      white-space: nowrap;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    .dropdown li:hover {
      background-color: #333;
    }
    .dropdown li a {
      color: white;
      text-decoration: none;
      display: block;
      width: 100%;
      height: 100%;
    }
    .dropdown li a:hover {
      color: white;
    }
</style>
</head>
<body>

<header>
  <div class="frame">
    <div class="navbar">
      <div class="logo">
        <a href="YCMerch-merch1.php">
          <img src="source/YCMerch-images/logo.jpg" alt="Yaka Crew Logo">
        </a>
      </div>
      <ul class="nav-links">
        <li>Home</li>
        <li class="gallery-dropdown">
          Gallery <span class="arrow">&#9662;</span>
          <ul class="dropdown">
            <li><a href="YCPosts.php">Music</a></li>
            <li><a href="YCGallery.php">Video</a></li>
          </ul>
        </li>
        <li>Blogs</li>
  <li><a href="YCBooking-index.php">Bookings</a></li>
        <li>Events</li>
        <li>Merchandise Store</li>
      </ul>
    </div>
  </div>
</header>

<div class="container" role="main" aria-label="Poster Order Summary">
  <!-- ORDER SUMMARY -->
  <section class="card" aria-labelledby="order-summary-title" tabindex="0">
    <h1 id="order-summary-title">Order Summary</h1>
    <div style="text-align:center; margin-bottom:24px;">
      <?php if (!empty($poster_image) && file_exists("uploads/YCMerch-uploads/" . $poster_image)): ?>
        <img src="uploads/YCMerch-uploads/<?= htmlspecialchars($poster_image) ?>" alt="Poster Image" style="max-width:180px; max-height:180px; border-radius:12px; box-shadow:0 4px 18px #0007; margin-bottom:12px;" />
      <?php else: ?>
        <div style="width:180px;height:180px;background:#222;display:inline-flex;align-items:center;justify-content:center;color:#aaa;font-size:16px;border-radius:12px;">No Image</div>
      <?php endif; ?>
    </div>
    <div class="order-details" role="region" aria-live="polite" aria-atomic="true">
      <p><strong>Order ID:</strong> <span><?= isset($order_id) ? htmlspecialchars($order_id) : '-' ?></span></p>
      <p><strong>Poster ID:</strong> <span><?= htmlspecialchars($poster_id) ?></span></p>
      <p><strong>Poster Name:</strong> <span><?= htmlspecialchars($poster_name) ?></span></p>
      <p><strong>Quantity:</strong> <span><?= htmlspecialchars($quantity) ?></span></p>
      <p><strong>Price per item:</strong> <span>Rs. <?= number_format($price, 2) ?></span></p>
      <p class="total">Total: Rs. <?= number_format($total_cost, 2) ?></p>
    </div>
  </section>

  <!-- PAYMENT & OTP -->
  <section class="card" aria-labelledby="payment-title" tabindex="0">
    <h2 id="payment-title">Payment</h2>
    <form id="paymentForm" novalidate>
      <div class="payment-methods" role="radiogroup" aria-label="Select payment method">
        <label tabindex="0" aria-checked="true" role="radio">
          <input type="radio" name="payment" value="visa" checked hidden>
          <img src="https://upload.wikimedia.org/wikipedia/commons/4/41/Visa_Logo.png" alt="Visa logo" />
          <span>Visa</span>
        </label>
        <label tabindex="0" aria-checked="false" role="radio">
          <input type="radio" name="payment" value="mastercard" hidden>
          <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Mastercard-logo.png" alt="Mastercard logo" />
          <span>Mastercard</span>
        </label>
        <label tabindex="0" aria-checked="false" role="radio">
          <input type="radio" name="payment" value="amex" hidden>
          <img src="https://upload.wikimedia.org/wikipedia/commons/3/30/American_Express_logo.svg" alt="American Express logo" style="width:50px;" />
          <span>Amex</span>
        </label>
      </div>

      <h2>Mobile OTP Verification</h2>
      <input
        type="tel"
        id="mobile"
        placeholder="Enter mobile number (10 digits)"
        maxlength="10"
        autocomplete="tel"
        required
        aria-required="true"
        aria-describedby="mobileHelp"
        pattern="\d{10}"
      />
      <small id="mobileHelp" style="color:#888; font-size:0.85rem; margin-bottom:18px; display:block;">
        We'll send a one-time password to verify your number.
      </small>
      <button type="button" id="sendOtpBtn">Send OTP</button>

      <div id="otpSection" style="display:none;" aria-live="polite" aria-atomic="true">
        <input
          type="text"
          id="otp"
          placeholder="Enter 6-digit OTP"
          maxlength="6"
          autocomplete="one-time-code"
          aria-describedby="otpHelp"
          pattern="\d{6}"
        />
        <small id="otpHelp" style="color:#888; font-size:0.85rem; margin-bottom:12px; display:block;">
          Enter the OTP sent to your mobile number.
        </small>
        <button type="button" id="confirmOtpBtn" disabled>Confirm OTP</button>
        <div id="otpMessage" class="message" role="alert" aria-live="assertive"></div>
      </div>
    </form>

    <div id="finalMessage" class="message" role="alert" aria-live="assertive"></div>
  </section>
</div>

<script>
  let generatedOtp = null;
  const sendOtpBtn = document.getElementById('sendOtpBtn');
  const confirmOtpBtn = document.getElementById('confirmOtpBtn');
  const mobileInput = document.getElementById('mobile');
  const otpInput = document.getElementById('otp');
  const otpSection = document.getElementById('otpSection');
  const otpMessage = document.getElementById('otpMessage');
  const finalMessage = document.getElementById('finalMessage');
  const paymentRadios = document.querySelectorAll('input[name="payment"]');
  const paymentLabels = document.querySelectorAll('.payment-methods label');

  sendOtpBtn.addEventListener('click', () => {
    const mobile = mobileInput.value.trim();
    if (!/^\d{10}$/.test(mobile)) {
      alert("Please enter a valid 10-digit mobile number.");
      mobileInput.focus();
      return;
    }
    generatedOtp = Math.floor(100000 + Math.random() * 900000);
    console.log("Simulated OTP:", generatedOtp);
    otpSection.style.display = 'flex';
    otpMessage.style.display = 'none';
    finalMessage.style.display = 'none';
    confirmOtpBtn.disabled = true;
    otpInput.value = '';
    alert(`OTP sent to ${mobile} (simulated). Check console for OTP in this demo.`);
  });

  otpInput.addEventListener('input', () => {
    confirmOtpBtn.disabled = otpInput.value.length !== 6;
  });

  confirmOtpBtn.addEventListener('click', () => {
    if (otpInput.value === generatedOtp.toString()) {
      otpMessage.style.display = 'block';
      otpMessage.className = 'message success';
      otpMessage.textContent = "✅ OTP verified successfully!";
      finalMessage.style.display = 'block';
      finalMessage.className = 'message success';
      finalMessage.textContent = "🎉 Payment successful! Your order is confirmed.";
      sendOtpBtn.disabled = true;
      confirmOtpBtn.disabled = true;
      mobileInput.disabled = true;
      otpInput.disabled = true;
      paymentRadios.forEach(el => el.disabled = true);
      paymentLabels.forEach(label => label.style.cursor = "default");
    } else {
      otpMessage.style.display = 'block';
      otpMessage.className = 'message error';
      otpMessage.textContent = "❌ Invalid OTP. Please try again.";
      otpInput.value = '';
      confirmOtpBtn.disabled = true;
      otpInput.focus();
    }
  });
</script>

</body>
</html>
