<?php include 'YCdb_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Yaka Crew - Our History</title>
  <style>
 /* Global */
body {
  margin: 0;
  font-family: Arial, sans-serif;
  background-color: #000000;
  color: white;
  padding-top: 80px; /* Add space for fixed navbar */
}
/* Navbar */
.navbar {
  display: flex;
  align-items: center;
  background-color: #000 !important;
  background: #000 !important;
  padding: 10px 20px;
  box-shadow: none;
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
  color: white;
  text-decoration: none;
}

.nav-links > li:hover {
  border-bottom: 2px solid white;
  color: white;
}

.nav-links > li.active {
  border-bottom: 2px solid white;
  color: white;
}

/* Remove default underline from top-level nav anchors (e.g., Events) */
.nav-links > li > a,
.nav-links > li > a:hover,
.nav-links > li > a:focus,
.nav-links > li > a:active {
  text-decoration: none !important;
  color: white;
}

/* Specifically target Blogs to ensure no yellow underline */
.nav-links > li:nth-child(3) {
  border-bottom: 2px solid transparent !important;
}

.nav-links > li:nth-child(3):hover {
  border-bottom: 2px solid white !important;
}

/* Remove persistent underline from Events (5th item) but keep hover underline */
.nav-links > li:nth-child(5) {
  border-bottom: 2px solid transparent !important; /* default state: no underline */
}

/* Keep Events non-active by default; hover will still apply from generic rule above */
.nav-links > li:nth-child(5).active {
  border-bottom: 2px solid transparent !important;
}

/* Ensure hover underline shows for Events even with the default !important above */
.nav-links > li:nth-child(5):hover {
  border-bottom: 2px solid white !important;
}

/* Override any potential yellow styling from other stylesheets */
.nav-links > li * {
  border-color: white !important;
  color: white !important;
}

.nav-links > li:hover * {
  border-color: white !important;
  color: white !important;
}

/* Dropdown */
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
  list-style: none; /* Remove bullet points */
}

.dropdown li {
  padding: 8px 15px;
  white-space: nowrap;
  cursor: pointer;
  transition: background-color 0.3s ease;
  list-style: none; /* Remove bullet points from list items */
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
    <link rel="stylesheet" href="css/YCBlogs-style.css">
  
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
      <li>Blogs</li>
  <li><a href="YCBooking-index.php">Bookings</a></li>
      <li><a href="YCEvents.php">Events</a></li>
       <li><a href="YCMerch-merch1.php">Merchandise Store</a></li>
    </ul>
  </div>


<section class="history-intro">
  <header>
  <h1>Yaka Crew - Our History</h1>
</header>
  <h2>Our Journey</h2>
  <div class="image-slider">
  <div class="image-slider" id="historySlider">
  <div class="slides">
    <div class="slide"><img src="assets/images/1.jpg" alt="Slide 1"></div>

  </div>
</div>


  <p style="font-size: 20px;">“We pander to not just teenagers, but also 
their parents.” 
— Chanuka Moragoda 

The tastes and preferences of the Sinhala youth are changing, and the young Sinhala artist is making those changes happen fast. Some of the most exciting changes to impact the arts have been due to the efforts of young adolescents working with feverish intensity. They start out relatively penniless, and although most of them hail from the suburban middle class they are, it must be noted, certainly not rich enough to indulge in the sort of luxuriant wastefulness that the English speaking classes indulge in. Plebeian and democratic in their outlook, they pander to the majority without insulting their intelligence, and they resort to what little they have at their disposal: YouTube, the patronage of friends, relatives, acquaintances, and the media. To a considerable extent, this explains the rise of Yaka Crew and the person behind it, Chanuka Moragoda. If the image of young, suburban, middle class Sinhala artists is real, Chanuka and his crew bear out much of the stereotypes associated with those artists.   


I haven’t been to many shows, but two Saturdays ago, I attended one where they performed: Adawwa. If it wasn’t quite the mega show that TV and radio outlets organise to draw massive crowds and boost their ratings, it was definitely the kind I was clamouring for. You know it’s a Yaka Crew event the moment you see the yak beraya onstage and it is used for every other item. The band didn’t actually pioneer the use of that beraya in their performances, but – and to me this is what distinguishes them – they were the first to incorporate it in their skits along with songs and dances. It brings out the traditional element of what they are doing, and more significantly the reverence of the past that has become, today, an integral part of their oeuvre. To understand why and how, it’s instructive to revisit Chanuka’s story. 

</p>
</section>

<section class="blog-section">
  <h2>Blog Posts</h2>

<div class="blog-container">

<?php
$query = "SELECT id, title, short_description FROM blogs ORDER BY created_at DESC";
$stmt = $pdo->query($query);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (count($rows) > 0):
    foreach ($rows as $row):
?>
  <div class="blog-card">
    <h3><?= htmlspecialchars($row['title']) ?></h3>
    <p><?= htmlspecialchars($row['short_description']) ?></p>
    <a href="YCBlogs-post.php?id=<?= $row['id'] ?>" class="read-more">Read More</a>
  </div>
<?php endforeach; ?>
</div>
<?php else: ?>
  <p>No blog posts available.</p>
<?php endif; ?>

   
</section>

<script>
//document.addEventListener("DOMContentLoaded", function () {
  //const slider = document.getElementById("historySlider");
//  const track  = slider.querySelector(".slides");
//  const slides = Array.from(track.children);

//  if (slides.length <= 1) return; // nothing to slide

//  let index = 0;
//  let timer;

  //function goTo(i) {
  //  index = (i + slides.length) % slides.length;
  //  track.style.transform = `translateX(-${index * 100}%)`;
//  }

//  function start() {
//    stop();
  //  timer = setInterval(() => goTo(index + 1), 5000); // every 5s
// }

  //function stop() {
   // if (timer) clearInterval(timer);
// }

  // start + pause on hover (optional, nice UX)
 // start();
//  slider.addEventListener("mouseenter", stop);
//  slider.addEventListener("mouseleave", start);
//});
//</script>


<footer>
  <div class="footer-content">
    <h2>Contact Us</h2>
    <form action="#" method="post">
      <input type="email" name="email" placeholder="Your Email" required>
      <textarea name="message" rows="4" placeholder="Your Message" required></textarea>
      <button type="submit">Send</button>
    </form>
  </div>
</footer>

</body>
</html>








