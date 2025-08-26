<?php
session_start();
// Require admin login for access
if (!isset($_SESSION['admin'])) {
    header('Location: ../YClogin.php');
    exit();
}
// YCBooking_edit.php - Edit Booking Form (styled like the provided image)
require_once '../YCdb_connection.php';

$edit_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$edit_error = '';
$edit_success = false;
$booking = null;

if ($edit_id > 0) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $first_name = trim($_POST['first_name'] ?? '');
        $last_name = trim($_POST['last_name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $mobile = trim($_POST['mobile_number'] ?? '');
        $date = $_POST['booking_date'] ?? '';
        $time = $_POST['booking_time'] ?? '';
        $other_info = trim($_POST['other_info'] ?? '');
        $booking_status = $_POST['booking_status'] ?? '';
        $payment_status = $_POST['payment_status'] ?? '';
        $admin_notes = trim($_POST['admin_notes'] ?? '');
        try {
            $stmt = $pdo->prepare("UPDATE bookings SET first_name=?, last_name=?, email=?, mobile_number=?, booking_date=?, booking_time=?, other_info=?, booking_status=?, payment_status=?, admin_notes=? WHERE id=?");
            $stmt->execute([$first_name, $last_name, $email, $mobile, $date, $time, $other_info, $booking_status, $payment_status, $admin_notes, $edit_id]);
            $edit_success = true;
        } catch (PDOException $e) {
            $edit_error = 'Database error: ' . htmlspecialchars($e->getMessage());
        }
    }
    $stmt = $pdo->prepare("SELECT * FROM bookings WHERE id = ?");
    $stmt->execute([$edit_id]);
    $booking = $stmt->fetch();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/YCBooking_admin-Edit.css">
 
</head>
<body>
      <title>Edit Booking Information</title>
    <div class="edit-box">
        <h2 class="edit-title">Edit Booking</h2>
        <div class="edit-underline"></div>
        <form method="post" autocomplete="off" class="edit-form-scroll">
            <?php if ($edit_success): ?>
                <div class="edit-success" id="edit-success-msg">Booking updated successfully!</div>
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(function() {
                        var msg = document.getElementById('edit-success-msg');
                        if(msg) msg.style.display = 'none';
                    }, 1200);
                });
                </script>
            <?php endif; ?>
            <?php if ($edit_error): ?>
                <div class="edit-error"><?= $edit_error ?></div>
            <?php endif; ?>
            <?php if ($booking): ?>
            <div class="edit-field"><label class="edit-label" for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" class="edit-input" value="<?= htmlspecialchars($booking['first_name']) ?>" required>
            </div>
            <div class="edit-field"><label class="edit-label" for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" class="edit-input" value="<?= htmlspecialchars($booking['last_name']) ?>" required>
            </div>
            <div class="edit-field"><label class="edit-label" for="email">Email:</label>
                <input type="email" id="email" name="email" class="edit-input" value="<?= htmlspecialchars($booking['email']) ?>" required>
            </div>
            <div class="edit-field"><label class="edit-label" for="mobile_number">Mobile Number:</label>
                <input type="text" id="mobile_number" name="mobile_number" class="edit-input" value="<?= htmlspecialchars($booking['mobile_number']) ?>" required>
            </div>
            <div class="edit-field"><label class="edit-label" for="booking_date">Booking Date:</label>
                <input type="date" id="booking_date" name="booking_date" class="edit-input" value="<?= htmlspecialchars($booking['booking_date']) ?>" required>
            </div>
            <div class="edit-field"><label class="edit-label" for="booking_time">Booking Time:</label>
                <input type="time" id="booking_time" name="booking_time" class="edit-input" value="<?= htmlspecialchars($booking['booking_time']) ?>" required>
            </div>
            <div class="edit-field"><label class="edit-label" for="other_info">Other Info:</label>
                <input type="text" id="other_info" name="other_info" class="edit-input" value="<?= htmlspecialchars($booking['other_info']) ?>">
            </div>
            <div class="edit-field"><label class="edit-label" for="booking_status">Booking Status:</label>
                <select id="booking_status" name="booking_status" class="edit-select">
                    <?php $statuses = ['Pending','Confirmed','Cancelled']; foreach ($statuses as $status): ?>
                        <option value="<?= $status ?>" <?= ($booking['booking_status'] ?? 'Pending') === $status ? 'selected' : '' ?>><?= $status ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="edit-field"><label class="edit-label" for="payment_status">Payment Status:</label>
                <select id="payment_status" name="payment_status" class="edit-select">
                    <?php $pay_statuses = ['Unpaid','Paid','Refunded']; foreach ($pay_statuses as $status): ?>
                        <option value="<?= $status ?>" <?= ($booking['payment_status'] ?? 'Unpaid') === $status ? 'selected' : '' ?>><?= $status ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="edit-field"><label class="edit-label" for="admin_notes">Admin Notes:</label>
                <input type="text" id="admin_notes" name="admin_notes" class="edit-input" value="<?= htmlspecialchars($booking['admin_notes'] ?? '') ?>">
            </div>
            <div class="edit-actions">
                <button type="submit" class="edit-save">Save Changes</button>
                <a href="YCBooking_admin.php?page=bookings" class="edit-cancel">Cancel</a>
            </div>
        </form>
        <?php else: ?>
            <div class="edit-error">Booking not found.</div>
        <?php endif; ?>
    </div>
</body>
</html>
