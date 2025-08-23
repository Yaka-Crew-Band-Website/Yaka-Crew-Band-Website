<?php
require_once 'YCdb_connection.php';

// Handle delete post request
if (isset($_GET['delete_post_id'])) {
    $delete_id = intval($_GET['delete_post_id']);
    $stmt = $pdo->prepare('DELETE FROM posts WHERE id = ?');
    $stmt->execute([$delete_id]);
    // Redirect to avoid resubmission
    header('Location: YCPosts.php');
    exit();
}

// Get all posts from database
$stmt = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
$posts = $stmt->fetchAll();

// Get filter categories
$category_stmt = $pdo->query("SELECT DISTINCT category FROM posts");
$categories = $category_stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Yaka Crew - Posts & Events</title>
  <?php $cssv = @filemtime(__DIR__ . '/css/YCGalleryposts-style.css') ?: time(); ?>
  <link rel="stylesheet" href="css/YCGalleryposts-style.css?v=<?php echo $cssv; ?>">
</head>
<body>
  <!-- Top Navigation Bar -->
  <div class="navbar">
    <div class="logo">
      <img src="assets/images/Yaka Crew Logo.JPG" alt="Yaka Crew Logo">
    </div>
    <ul class="nav-links">
  <li><a href="YCHome.php">Home</a></li>
    <li class="gallery-dropdown">
  Gallery <span class="arrow">&#9662;</span>
  <ul class="dropdown">
    <li><a href="YCPosts.php">Music</a></li>      <!-- ✅ Correct PHP file -->
    <li><a href="YCGallery.php">Video</a></li>     <!-- ✅ Correct PHP file -->
  </ul>
   <li><a href="YCBlogs-index.php">Blogs</a></li>
    <li><a href="YCBooking-index.php">Bookings</a></li>
      <li><a href="YCEvents.php">Events</a></li>
       <li><a href="YCMerch-merch1.php">Merchandise Store</a></li>
    </ul>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <div class="posts-header">
      <h1>Band Events Gallery</h1>
    </div>

    <!-- All Events Gallery -->
    <div class="event-gallery-grid">
      <?php 
      if (!empty($posts) && is_array($posts) && count($posts) > 0) {
        $layouts = ['large-image-left', 'small-images-right', 'medium-image', 'small-images-left', 'wide-image'];
        $layout_index = 0;
        foreach ($posts as $post) {
          $layout_class = $layouts[$layout_index % count($layouts)];
          $layout_index++;
          $event_date = $post['event_date'] ? date('F j, Y', strtotime($post['event_date'])) : date('F j, Y', strtotime($post['created_at']));
          if ($layout_class == 'small-images-right') {
            echo '<div class="small-images-right">';
            echo '<div class="image-container">';
          } else {
            echo '<div class="' . $layout_class . '">';
          }
          echo '<div class="image-hover-overlay">';
          echo '<h3>' . htmlspecialchars($post['title']) . '</h3>';
          echo '<p>' . $event_date . '</p>';
          if (!empty($post['location'])) {
            echo '<p>' . htmlspecialchars($post['location']) . '</p>';
          }
          echo '</div>';
          if (!empty($post['image_path'])) {
            // Check for post image in source/Gallery/YCposts first, then uploads/Gallery/YCposts
            $image_exists = false;
            $final_image_path = '';
            $filename = basename($post['image_path']);
            $source_image = 'source/Gallery/YCposts/' . $filename;
            $uploads_image = 'uploads/Gallery/YCposts/' . $filename;
            
            if (file_exists($source_image)) {
              $final_image_path = $source_image;
              $image_exists = true;
            } elseif (file_exists($uploads_image)) {
              $final_image_path = $uploads_image;
              $image_exists = true;
            }
            
            if ($image_exists) {
              echo '<img src="' . htmlspecialchars($final_image_path) . '" alt="' . htmlspecialchars($post['title']) . '">';
            } else {
              echo '<img src="assets/images/image3.jpeg" alt="' . htmlspecialchars($post['title']) . '">';
            }
          } else {
            // Fallback to default image if no image path
            echo '<img src="assets/images/image3.jpeg" alt="' . htmlspecialchars($post['title']) . '">';
          }
          if ($layout_class == 'small-images-right') {
            echo '</div></div>';
          } else {
            echo '</div>';
          }
        }
      }
      // If there are no posts, nothing is shown
      ?>
    </div>
  </div>

</body>
</html>

