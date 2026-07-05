<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

    <!-- Header Navigation -->
    <header class="navbar">
        <div class="container nav-container">
            <div class="logo">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Oscar Network Logo" class="logo-img">
            </div>
            <nav class="nav-links">
                <a href="<?php echo home_url('/#beranda'); ?>" <?php echo is_front_page() ? 'class="active"' : ''; ?>>Beranda</a>
                <a href="<?php echo home_url('/tentang-kami'); ?>" <?php echo is_page('tentang-kami') ? 'class="active"' : ''; ?>>Tentang Kami</a>
                <a href="<?php echo home_url('/#layanan'); ?>">Layanan</a>
                <a href="<?php echo home_url('/blog'); ?>" <?php echo (is_home() || is_single() || is_archive()) ? 'class="active"' : ''; ?>>Blog</a>
                <a href="<?php echo home_url('/#kontak'); ?>">Kontak</a>
            </nav>
            <div class="nav-actions">
                <a href="https://wa.me/6285800436222?text=Halo%20Oscar%20Network%2C%20saya%20punya%20server%20dan%20perangkat%20data%20center%20bekas%20yang%20ingin%20saya%20jual%20atau%20lelang.%20mau%20diskusi%20lebih%20lanjut%20Terima%20kasih." class="nav-btn">
                    <i class="fa-brands fa-whatsapp"></i> <span class="phone-text">Hubungi Kami</span>
                </a>
                <button class="mobile-menu-btn" aria-label="Toggle menu">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </div>
    </header>
