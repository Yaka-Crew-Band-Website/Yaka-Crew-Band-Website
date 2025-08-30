# Yaka Crew Band Website - Complete File Overview

This README lists and briefly describes all files and folders in the main project directory, including subfolders for admin, assets, CSS, JS, database, source, tools, and uploads.

## Root Directory Files
- **README-all-pages.md**: Overview of all main website files.
- **README-gallery-posts-admin-login.md**: Docs for gallery, posts, admin, like, and login modules.
- **README.txt**: Additional documentation.
- **YCBlogs-config.php**: Blog configuration.
- **YCBlogs-index.php**: Blog listing page.
- **YCBlogs-post.php**: Single blog post display.
- **YCBlogs-savemessage.php**: Handles blog message saving.
- **YCBooking-index.php**: Booking page for users.
- **YCEvents-admin.php**: Admin events page.
- **YCEvents-all-events.php**: All events listing.
- **YCEvents-cart.html / YCEvents-cart.php**: Event cart (HTML and PHP versions).
- **YCEvents-payment.php**: Event payment page.
- **YCEvents.php**: Main events page.
- **YCGallery.php**: Public gallery page.
- **YCHome-admin.php**: Admin home page.
- **YCHome.php**: Website homepage.
- **YCMerch-admin.php**: Admin merchandise page.
- **YCMerch-cartproducts.php**: Merchandise cart.
- **YCMerch-checkout.php**: Merchandise checkout.
- **YCMerch-createpayment.php**: Merchandise payment creation.
- **YCMerch-hoodies.php, YCMerch-merch1.php, YCMerch-posters.php, YCMerch-product.php, YCMerch-productband.php, YCMerch-producthoodies.php, YCMerch-productposters.php, YCMerch-tshirts.php, YCMerch-wristband.php**: Merchandise category/product pages.
- **YCPosts-like.php**: Handles AJAX post likes.
- **YCPosts.php**: Displays posts/events.
- **YCdb_connection.php**: Database connection.
- **YClogin.php**: Login page.
- **footer.php**: Common footer.
- **debug.log**: Debug log file.

## Folders
- **admin/**: Admin dashboard and management scripts (see below).
- **assets/**: Images and static assets.
- **css/**: All CSS stylesheets.
- **database/**: SQL files and database scripts.
- **js/**: JavaScript files.
- **source/**: Source images and content for posts, events, gallery, home, and merch.
- **tools/**: Utility scripts (e.g., css_audit.php).
- **uploads/**: Uploaded images and files (organized by type).
- **YCEvent-vendor/**: Third-party libraries (Stripe, PHPMailer, etc.).
- **YCEvents-api/**: API endpoints for events.

## admin/ Folder
- **YCBlogs-admin.php, YCBlogs-blogedit.php, YCBlogs-deleteblog.php, YCBlogs-messageread.php**: Blog admin management.
- **YCBooking-payment-booking.php, YCBooking-payment.php, YCBooking_admin.php, YCBooking_edit.php**: Booking admin management.
- **YCEvents-Edit.php, YCEvents-add_event.php, YCEvents-delete-image.php, YCEvents-get-cart-items.php, YCEvents-sliders.php**: Event admin utilities.
- **YCGalleryadmin.php**: Gallery admin dashboard.
- **YCGalleryedit_media.php, YCGalleryedit_post.php, YCGalleryedit_song.php**: Edit gallery content.
- **YCGallerydelete_media.php, YCGallerydelete_post.php, YCGallerydelete_song.php**: Delete gallery content.
- **YCGalleryupload_media.php, YCGalleryupload_posts.php, YCGalleryupload_song.php**: Upload gallery content.
- **PHPMailer/**, **stripe-php/**: Third-party libraries for email and payments.

## assets/images/
- **Yaka Crew Logo.JPG, facebook.png, instagram.png, youtube.png, image6.JPG, 1.jpg**: Site images and icons.

## css/
- All CSS files for styling the website, admin, gallery, events, merch, and footer.

## js/
- **YCEvents.js, YCHome-script.js, YClogin-script.js, custom.js**: JavaScript for interactivity and features.
- **composer.json, composer.lock**: JS package management files.

## database/
- **add_likes_column_posts.sql, yaka_crew_band.sql**: SQL scripts for database setup and updates.

## source/
- **Blogs/, Events/, Gallery/, Home/, YCMerch-images/**: Source images and content for each section.

## tools/
- **css_audit.php**: Tool for auditing CSS usage.

## uploads/
- **Blogs/, Events/, Gallery/, YCHome-uploads/, YCMerch-uploads/**: Uploaded images and files for each section.

---
This README provides a complete overview of all files and folders in the project. For more details, see comments in each file or the specific module documentation.
