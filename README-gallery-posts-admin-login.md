# Yaka Crew Band Website - Gallery, Posts, and Admin Modules

This README provides an overview of the main files related to the Gallery, Posts, Gallery Admin, Like Post, and Login functionality in this project.

## Gallery
- **YCGallery.php**: Displays the public gallery (videos, images, etc.) for users.
- **admin/YCGalleryadmin.php**: Admin dashboard for managing gallery content (add, edit, delete media, posts, and songs).
- **admin/YCGalleryedit_media.php**: Edit existing media items in the gallery (admin only).
- **admin/YCGalleryedit_post.php**: Edit existing posts in the gallery (admin only).
- **admin/YCGalleryedit_song.php**: Edit existing songs in the gallery (admin only).
- **admin/YCGallerydelete_media.php**: Delete media items from the gallery (admin only).
- **admin/YCGallerydelete_post.php**: Delete posts from the gallery (admin only).
- **admin/YCGallerydelete_song.php**: Delete songs from the gallery (admin only).

## Posts
- **YCPosts.php**: Displays music posts for users (public-facing).

## Like Post
- **like_post.php**: Handles AJAX requests to like a post. Used to increment the like count for posts from the frontend.


## Login
## Login
- **YClogin.php**: Handles user/admin login, session management, and redirects to admin dashboard upon successful login.

## Usage
- Public users can view the gallery and posts via `YCGallery.php` and `YCPosts.php`.
- Admin users can log in via `YClogin.php` and manage gallery and posts content through the admin files in the `admin/` directory.

## Notes
- All admin files require authentication. Unauthorized access redirects to the login page.
- Editing and deleting content is restricted to admin users only.
- For more details, see comments in each PHP file.

---
This README covers only the Gallery, Posts, Gallery Admin, Like Post, and Login modules/files. For other modules, see their respective documentation or code comments.
