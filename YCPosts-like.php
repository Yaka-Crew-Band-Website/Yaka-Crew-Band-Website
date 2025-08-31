<?php
// YCPosts-like.php: increments the like count for a post via AJAX
header('Content-Type: application/json');
require_once 'YCdb_connection.php';

// Helper: check if user is admin (session must be started and admin set)
function is_admin() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    return isset($_SESSION['admin']) && $_SESSION['admin'] === true;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postId = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;
    if ($postId > 0) {
        // Check if user already liked (cookie)
        $cookieName = 'liked_post_' . $postId;
        if (!isset($_COOKIE[$cookieName])) {
            // Increment likes atomically
            $stmt = $pdo->prepare('UPDATE posts SET likes = likes + 1 WHERE id = ?');
            $stmt->execute([$postId]);
            // Set cookie for 1 year
            setcookie($cookieName, '1', time() + 31536000, "/");
            $userLikes = 1;
        } else {
            $userLikes = 1; // Already liked, keep showing 1
        }
        // Get new like count for admin
        $stmt2 = $pdo->prepare('SELECT likes FROM posts WHERE id = ?');
        $stmt2->execute([$postId]);
        $likes = $stmt2->fetchColumn();
        echo json_encode([
            'success' => true,
            'userLikes' => $userLikes,
            'adminLikes' => (int)$likes,
            'isAdmin' => is_admin() ? 1 : 0
        ]);
        exit;
    }
}
// For GET: show like count for user (0 if not liked, 1 if liked, real count for admin)
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['post_id'])) {
    $postId = intval($_GET['post_id']);
    $cookieName = 'liked_post_' . $postId;
    $userLikes = isset($_COOKIE[$cookieName]) ? 1 : 0;
    $stmt2 = $pdo->prepare('SELECT likes FROM posts WHERE id = ?');
    $stmt2->execute([$postId]);
    $likes = $stmt2->fetchColumn();
    echo json_encode([
        'success' => true,
        'userLikes' => $userLikes,
        'adminLikes' => (int)$likes,
        'isAdmin' => is_admin() ? 1 : 0
    ]);
    exit;
}
echo json_encode(['success' => false]);
