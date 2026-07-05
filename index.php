<?php
/**
 * The main template file
 */

// Intercept /blog URL if page is not created in backend
if (strpos($_SERVER['REQUEST_URI'], '/blog') !== false) {
    include(get_template_directory() . '/page-blog.php');
    exit;
}

get_header();
?>
<div class="blog-page-container" style="padding-top: 130px; padding-bottom: 80px; background-color: #f8f9fa; min-height: 50vh;">
    <div class="container" style="text-align: center;">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <div style="margin-bottom: 40px; text-align: left;">
                    <h1><?php the_title(); ?></h1>
                    <div><?php the_content(); ?></div>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <h2>Halaman Tidak Ditemukan (404)</h2>
            <p>Maaf, halaman yang Anda cari tidak tersedia atau belum dibuat.</p>
            <a href="<?php echo home_url(); ?>" class="btn" style="margin-top: 20px; display: inline-block; background: #0095ff; color: #fff; padding: 10px 25px; border-radius: 5px; text-decoration: none;">Kembali ke Beranda</a>
        <?php endif; ?>
    </div>
</div>
<?php
get_footer();
?>
