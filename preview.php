<?php
// ==========================================
// FILE PREVIEW KHUSUS UNTUK MELIHAT DESAIN
// TANPA PERLU INSTALL WORDPRESS
// ==========================================

// 1. Mocking fungsi-fungsi dasar WordPress agar tidak error
function get_header() { include 'header.php'; }
function get_footer() { include 'footer.php'; }
function get_template_directory_uri() { return '.'; }
function wp_head() { 
    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">' . "\n";
    echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap">' . "\n";
    echo '<link rel="stylesheet" href="style.css">' . "\n";
}
function wp_footer() {
    echo '<script src="js/main.js"></script>' . "\n";
}
function wp_body_open() {}
function language_attributes() { echo 'lang="id"'; }
function bloginfo($show) { 
    if($show == 'charset') echo 'UTF-8'; 
    if($show == 'name') echo 'OSCAR Network'; 
}
function body_class() { echo 'class="home"'; }
function home_url($path = '') { return '#'; }
function site_url($path = '') { return '#'; }
function the_permalink() { echo '#'; }
function the_title() { echo 'Judul Artikel'; }
function the_content() { echo 'Konten artikel ada di sini.'; }
function the_author() { echo 'Admin'; }
function get_the_date($format) { echo '10 Jul 2026'; }
function get_the_excerpt() { return 'Ini adalah contoh cuplikan artikel...'; }
function wp_trim_words($text, $num, $more) { return $text . $more; }
function has_post_thumbnail() { return false; }
function the_post_thumbnail($size) {}
function get_the_category() { return []; }
function is_front_page() { return true; }
function is_page($page = '') { return false; }
function is_home() { return false; }
function is_single() { return false; }
function is_archive() { return false; }

// Mocking WP_Query class agar tidak error di bagian Blog
class WP_Query {
    public function have_posts() { return false; }
}

// 2. Muat halaman utama (front-page.php)
include 'front-page.php';
?>
