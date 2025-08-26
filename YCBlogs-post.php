<?php

require_once __DIR__ . '/YCdb_connection.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
  echo "Blog post not found.";
  exit;
}

$post_id = intval($_GET['id']);
$stmt = $pdo->prepare("SELECT * FROM blogs WHERE id = ?");
$stmt->execute([$post_id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$post) {
  echo "Blog post not found.";
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($post['title']) ?> - Yaka Crew Blog</title>
  <link rel="stylesheet" href="css/YCBlogs-style.css">
  
</head>
<body>

<header>
  <h1><?= htmlspecialchars($post['title']) ?></h1>
</header>

<div class="post-container">
  <?php if (!empty($post['image']) && file_exists('admin/uploads/' . $post['image'])): ?>
    <img src="admin/uploads/<?= htmlspecialchars($post['image']) ?>" alt="Blog Image" style="max-width: 100%; height: auto; margin-bottom: 20px;">
  <?php endif; ?>

  <p><?= nl2br(htmlspecialchars($post['full_description'])) ?></p>
  <a href="YCBlogs-index.php" class="back-link">← Back to All Posts</a>
</div>




</body>
</html>
