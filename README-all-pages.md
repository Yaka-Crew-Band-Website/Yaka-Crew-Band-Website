# Yaka Crew Band Website - All Page Files Overview

This README provides a summary of the main PHP, HTML, JS, and CSS files in the Yaka Crew Band Website project. Use this as a reference for understanding the structure and purpose of each file.

## Main PHP Pages
- **YCHome.php**: Homepage for the website.
- **YCGallery.php**: Public gallery for videos and images.
- **YCPosts.php**: Displays music/event posts for users.
- **YCPosts-like.php**: Handles AJAX requests to like a post.
- **YClogin.php**: Login page for admin access.
- **footer.php**: Common footer included on most pages.
- **YCdb_connection.php**: Database connection logic.
- **YCBlogs-index.php**: Blog listing page.
- **YCBlogs-post.php**: Single blog post display.
- **YCBlogs-config.php**: Blog configuration/settings.
- **YCBlogs-savemessage.php**: Handles saving blog messages.
- **YCBooking-index.php**: Booking page for users.
- **YCEvents.php**: Main events page.
- **YCEvents-cart.php**: Shopping cart for events.
- **YCEvents-payment.php**: Payment page for events.
- **YCMerch-merch1.php**: Main merchandise store page.
- **YCMerch-product.php**: Merchandise product details.
- **YCMerch-cartproducts.php**: Merchandise cart page.
- **YCMerch-checkout.php**: Merchandise checkout page.
- **YCMerch-hoodies.php, YCMerch-tshirts.php, YCMerch-wristband.php, YCMerch-posters.php, YCMerch-productband.php, YCMerch-producthoodies.php, YCMerch-productposters.php**: Specific merchandise category/product pages.

## Admin PHP Pages (in `admin/`)
- **YCGalleryadmin.php**: Admin dashboard for managing gallery content.
- **YCGalleryedit_media.php, YCGalleryedit_post.php, YCGalleryedit_song.php**: Edit media, posts, and songs (admin only).
- **YCGallerydelete_media.php, YCGallerydelete_post.php, YCGallerydelete_song.php**: Delete media, posts, and songs (admin only).
- **YCGalleryupload_media.php, YCGalleryupload_posts.php, YCGalleryupload_song.php**: Upload new media, posts, and songs (admin only).
- **YCBooking_admin.php, YCBooking_edit.php**: Admin booking management.
- **YCEvents-get-cart-items.php, YCEvents-sliders.php**: Admin event management utilities.
- **YCBlogs-admin.php, YCBlogs-blogedit.php, YCBlogs-messageread.php, YCBlogs-deleteblog.php**: Blog admin management.

## API & Vendor
- **YCEvents-api/**: API endpoints for events (e.g., get locations, get events).
- **YCEvent-vendor/**: Third-party libraries (Stripe, PHPMailer, etc.).

## JavaScript Files (in `js/`)
- **custom.js**: Custom JS for site-wide features.
- **YCEvents.js**: JS for event-related interactivity.
- **YCHome-script.js**: JS for homepage features.
- **YClogin-script.js**: JS for login page interactivity.

## CSS Files (in `css/`)
- **YCGalleryposts-style.css**: Styles for posts/gallery pages.
- **YCGalleryadmin-style.css**: Styles for gallery admin.
- **YCEvents.css, YCEvents-all-events.css, YCEvents-cart.css, YCEvents-payment.css, YCEvents-admin-style.css, YCEvents-Edit.css, YCEvents.dashboard.css**: Styles for events and admin.
- **YCMerch-product.css, YCMerch-posters.css, YCMerch-tshirts.css, YCMerch-wristband.css, YCMerch-admin-style.css**: Styles for merchandise pages.
- **YCHome-styles.css, YCHome-admin.css**: Styles for home and admin home.
- **admin-style.css, footer.css**: General admin and footer styles.

## HTML Files
- **YCEvents-cart.html**: Static HTML version of the events cart page.

## Other
- **debug.log**: Log file for debugging.
- **README-gallery-posts-admin-login.md**: Documentation for gallery, posts, admin, like, and login modules.

---
This README covers the main website page files. For more details, see comments in each file or the specific module documentation.
