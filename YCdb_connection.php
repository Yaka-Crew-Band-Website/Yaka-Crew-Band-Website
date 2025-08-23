<?php
// Database connection configuration
$host = 'localhost';
$dbname = 'yaka_crew_band';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    // Ensure bookings table exists (create if missing) so booking pages work even if SQL was imported into a different DB
    try {
        $createBookingsSQL = "CREATE TABLE IF NOT EXISTS `bookings` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `first_name` varchar(100) DEFAULT NULL,
            `last_name` varchar(100) DEFAULT NULL,
            `email` varchar(100) DEFAULT NULL,
            `mobile_number` varchar(15) DEFAULT NULL,
            `booking_date` date DEFAULT NULL,
            `booking_time` time DEFAULT NULL,
            `other_info` text DEFAULT NULL,
            `booking_status` varchar(50) DEFAULT 'Pending',
            `payment_status` varchar(50) DEFAULT 'Unpaid',
            `admin_notes` varchar(255) DEFAULT '',
            `admin_note_updated_at` datetime DEFAULT NULL,
            `payment_status_updated_at` datetime DEFAULT NULL,
            `booking_status_updated_at` datetime DEFAULT NULL,
            `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
        $pdo->exec($createBookingsSQL);
    } catch (PDOException $e) {
        // Log but don't stop the application — admin pages will show DB errors if further issues exist
        error_log('Could not ensure bookings table exists: ' . $e->getMessage());
    }
} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
