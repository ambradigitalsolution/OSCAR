<?php
/*
Template Name: Template Detail Artikel
Template Post Type: post, page
*/
get_header(); ?>

<style>
/* Base Reset & Variables for Bento Grid */
:root {
    --bento-gap: 25px;
    --bento-radius: 24px;
    --bento-border: 1px solid rgba(0,0,0,0.06);
}

.post-tags a {
    display: inline-block;
    padding: 6px 16px;
    background: #f1f3f5;
    color: #444;
    border-radius: 30px;
    font-size: 0.85rem;
    font-weight: 500;
    transition: all 0.3s ease;
}
.post-tags a:hover {
    background: var(--primary-color);
    color: #fff;
}

/* Bento Box General Style */
.bento-box {
    background: #ffffff;
    border-radius: var(--bento-radius);
    padding: 30px;
    border: var(--bento-border);
    box-shadow: 0 6px 20px rgba(0,0,0,0.03);
    margin-bottom: var(--bento-gap);
    transition: box-shadow 0.3s ease, transform 0.3s ease;
    overflow: hidden;
    position: relative;
}
.bento-box:hover {
    box-shadow: 0 10px 30px rgba(0,0,0,0.06);
}
.bento-box.no-padding {
    padding: 0;
}

/* Layout 2 Kolom */
.blog-2col-layout {
    display: flex;
    gap: var(--bento-gap);
    align-items: flex-start;
}
.blog-main-content {
    flex: 1;
    min-width: 0;
}
.blog-right-sidebar {
    width: 360px;
    flex-shrink: 0;
    position: sticky;
    top: 130px;
}

@media (max-width: 992px) {
    .blog-2col-layout {
        flex-direction: column;
    }
    .blog-right-sidebar {
        width: 100%;
        position: static;
        margin-top: 20px;
    }
}

/* Kiri: Bento Hero (Judul & Meta) */
.bento-hero-header {
    margin-bottom: 25px;
}
.bento-hero-header h1 {
    font-size: 2.4rem;
    font-weight: 800;
    line-height: 1.25;
    color: #111;
    margin: 15px 0 0 0;
    letter-spacing: -0.5px;
}
.traveloka-meta-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top: 1px solid #f0f0f0;
    padding-top: 20px;
    flex-wrap: wrap;
    gap: 15px;
}

/* Kiri: Bento Thumbnail */
.bento-thumbnail img {
    width: 100%;
    height: auto;
    max-height: 500px;
    object-fit: cover;
    display: block;
    transition: transform 0.5s ease;
}
.bento-thumbnail:hover img {
    transform: scale(1.02);
}

/* Kiri: Content Area */
.post-content h2 {
    font-size: 1.7rem;
    margin-top: 40px;
    margin-bottom: 20px;
    color: var(--primary-color);
    font-weight: 700;
}
.post-content h3 {
    font-size: 1.4rem;
    margin-top: 30px;
    margin-bottom: 15px;
    color: #333;
    font-weight: 600;
}
.post-content img {
    max-width: 100%;
    height: auto;
    border-radius: 12px;
    margin: 25px 0;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
}
.post-content p {
    margin-bottom: 20px;
    line-height: 1.9;
    font-size: 1.15rem;
    color: #333;
}
.post-content ul, .post-content ol {
    margin-bottom: 20px;
    padding-left: 20px;
    line-height: 1.8;
    font-size: 1.15rem;
    color: #333;
}
.post-content li {
    margin-bottom: 8px;
}

/* Kiri: Post Navigation */
.post-navigation-bento {
    display: flex;
    justify-content: space-between;
    gap: 20px;
}
.post-nav-card {
    flex: 1;
    padding: 20px;
    border-radius: 16px;
    background: #f8f9fa;
    transition: background 0.3s ease;
    display: flex;
    flex-direction: column;
    text-decoration: none;
}
.post-nav-card:hover {
    background: #f0f4f8;
}
.post-nav-card .nav-label {
    color: var(--primary-color);
    font-size: 0.8rem;
    text-transform: uppercase;
    font-weight: 700;
    letter-spacing: 1px;
    margin-bottom: 8px;
}
.post-nav-card .nav-title {
    margin: 0;
    font-size: 1.05rem;
    color: #111;
    line-height: 1.4;
    font-weight: 600;
}

@media (max-width: 768px) {
    .post-navigation-bento {
        flex-direction: column;
    }
}

/* Kanan: Sidebar Articles */
.sidebar-article-item {
    display: flex;
    gap: 15px;
    padding: 15px;
    border-radius: 12px;
    text-decoration: none;
    transition: background 0.2s;
    margin-bottom: 5px;
}
.sidebar-article-item:hover {
    background: #f8f9fa;
}
.sidebar-article-item img {
    width: 80px;
    height: 80px;
    border-radius: 10px;
    object-fit: cover;
}
.sidebar-article-info {
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.sidebar-article-info h4 {
    font-size: 1rem;
    color: #111;
    margin: 0 0 6px 0;
    line-height: 1.4;
    font-weight: 600;
    transition: color 0.2s;
}
.sidebar-article-item:hover .sidebar-article-info h4 {
    color: var(--primary-color);
}
</style>


<div class="blog-page-container" style="padding-top: 130px; padding-bottom: 100px; background-color: #f4f6f8;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; width: 100%;">
        
        <div class="blog-2col-layout">
            
            <!-- KOLOM KIRI: MAIN CONTENT -->
            <div class="blog-main-content">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    
                    <article class="single-post-article">
                        
                        <!-- 1. BENTO HERO (Judul & Meta) -->
                        <div class="bento-box">
                            <div class="bento-hero-header">
                                <!-- Breadcrumbs -->
                                <nav class="sriguna-breadcrumbs" aria-label="breadcrumb" style="font-size: 0.9rem; color: #666; font-weight: 600; display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
                                    <i class="fa-solid fa-bolt" style="color: #444;"></i>
                                    <a href="<?php echo esc_url(home_url('/')); ?>" style="color: #444; text-decoration: none; transition: color 0.2s;">Beranda</a>
                                    <span style="color: #ccc;">/</span>
                                    <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" style="color: #666; text-decoration: none; transition: color 0.2s;">Blog</a>
                                    <span style="color: #ccc;">/</span>
                                    <?php 
                                        $categories = get_the_category();
                                        if (!empty($categories)) {
                                            echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '" style="color: #111; text-decoration: none; font-weight: 700; transition: color 0.2s;">' . esc_html($categories[0]->name) . '</a>';
                                        }
                                    ?>
                                </nav>
                                <!-- Judul -->
                                <h1><?php the_title(); ?></h1>
                            </div>
                            
                            <!-- Meta Row -->
                            <div class="traveloka-meta-row">
                                <div class="meta-left" style="display: flex; align-items: center; gap: 12px;">
                                    <!-- Avatar -->
                                    <div style="width: 45px; height: 45px; border-radius: 12px; background: #ffebeb; color: #ff5e5e; display: flex; align-items: center; justify-content: center; font-size: 1.3rem;">
                                        <i class="fa-solid fa-user-pen"></i>
                                    </div>
                                    <!-- Author & Date Info -->
                                    <div style="font-size: 0.95rem; color: #777; display: flex; flex-direction: column; gap: 2px;">
                                        <div><span style="color: #111; font-weight: 700; font-size: 1.05rem;"><?php the_author(); ?></span></div>
                                        <div style="display: flex; align-items: center; gap: 8px;">
                                            <i class="fa-regular fa-calendar" style="color: #999;"></i> <?php echo get_the_date('d M Y'); ?> &middot; <?php echo ceil(str_word_count(strip_tags(get_the_content())) / 200); ?> mnt baca
                                        </div>
                                    </div>
                                </div>

                                <!-- Social Share -->
                                <div class="meta-right" style="display: flex; gap: 10px;">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" style="width: 40px; height: 40px; border-radius: 10px; background: #e7f0ff; color: #1877F2; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: transform 0.2s; font-size: 1.1rem;"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" style="width: 40px; height: 40px; border-radius: 10px; background: #eaf5fc; color: #1DA1F2; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: transform 0.2s; font-size: 1.1rem;"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="https://wa.me/?text=<?php echo urlencode(get_the_title() . ' ' . get_permalink()); ?>" target="_blank" style="width: 40px; height: 40px; border-radius: 10px; background: #e6f9ed; color: #25D366; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: transform 0.2s; font-size: 1.2rem;"><i class="fa-brands fa-whatsapp"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- 2. BENTO THUMBNAIL (Gambar Utama) -->
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="bento-box no-padding bento-thumbnail">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>

                        <!-- 3. BENTO CONTENT (Isi Artikel) -->
                        <div class="bento-box">
                            <div class="post-content">
                                <?php the_content(); ?>
                            </div>
                        </div>

                    </article>
                    
                    <!-- 4. BENTO NAVIGATION (Artikel Prev/Next) -->
                    <?php $prev_post = get_previous_post(); if (!empty($prev_post)): ?>
                    <div class="bento-box" style="padding: 20px;">
                        <div style="background: #f8f9fa; border-left: 5px solid #0095ff; padding: 18px 20px; border-radius: 8px;">
                            <span style="font-weight: 800; color: #111; font-size: 1.1rem;">Baca Juga: </span> 
                            <a href="<?php echo get_permalink($prev_post->ID); ?>" style="color: #0095ff; text-decoration: underline; font-weight: 700; font-size: 1.1rem; line-height: 1.5;">
                                <?php echo get_the_title($prev_post->ID); ?>
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php $next_post = get_next_post(); if (!empty($next_post)): ?>
                    <div class="bento-box" style="padding: 20px;">
                        <div style="display: flex; justify-content: flex-end;">
                            <a href="<?php echo get_permalink($next_post->ID); ?>" class="post-nav-card" style="text-align: right; background: #f8f9fa; padding: 20px 25px; border-radius: 12px; text-decoration: none; display: inline-block; max-width: 70%; transition: background 0.3s ease;">
                                <div class="nav-label" style="color: #0095ff; font-size: 0.85rem; text-transform: uppercase; font-weight: 800; letter-spacing: 1px; margin-bottom: 8px; display: flex; align-items: center; justify-content: flex-end; gap: 5px;">
                                    SELANJUTNYA <i class="fa-solid fa-arrow-right"></i>
                                </div>
                                <h4 class="nav-title" style="margin: 0; font-size: 1.1rem; color: #111; line-height: 1.5; font-weight: 700;">
                                    <?php echo get_the_title($next_post->ID); ?>
                                </h4>
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>

                <?php endwhile; endif; ?>
            </div> <!-- End blog-main-content -->
            
            <!-- KOLOM KANAN: SIDEBAR -->
            <aside class="blog-right-sidebar">
                
                <!-- 5. BENTO SEARCH -->
                <div class="bento-box" style="padding: 20px;">
                    <form role="search" method="get" style="display: flex; position: relative;" action="<?php echo esc_url(home_url('/')); ?>">
                        <input type="search" name="s" placeholder="Cari Artikel..." value="<?php echo get_search_query(); ?>" style="width: 100%; padding: 12px 15px; border: 1px solid #eaeaea; border-right: none; border-radius: 8px 0 0 8px; outline: none; font-size: 0.95rem; background: #fff; transition: all 0.2s;" onfocus="this.style.borderColor='#007bff'" onblur="this.style.borderColor='#eaeaea'" />
                        <button type="submit" style="padding: 12px 20px; background-color: #007bff; color: white; border: 1px solid #007bff; border-radius: 0 8px 8px 0; cursor: pointer; transition: background-color 0.2s; display: flex; align-items: center; justify-content: center;" onmouseover="this.style.backgroundColor='#0056b3'" onmouseout="this.style.backgroundColor='#007bff'">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>

                <!-- 6. BENTO SIDEBAR REKOMENDASI -->
                <div class="bento-box" style="padding: 20px;">
                    <h3 style="font-size: 1.2rem; font-weight: 800; margin: 0 0 15px 0; color: #111; padding-bottom: 15px; border-bottom: 1px solid #f0f0f0;">Rekomendasi Artikel Lainnya</h3>
                    
                    <div class="sidebar-articles-list" style="margin-top: 15px;">
                        <?php
                        $sidebar_args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 5,
                            'post__not_in' => array(get_the_ID()),
                            'post_status' => 'publish',
                        );
                        $sidebar_query = new WP_Query($sidebar_args);
                        if ($sidebar_query->have_posts()) :
                            while ($sidebar_query->have_posts()) : $sidebar_query->the_post();
                        ?>
                            <a href="<?php echo get_permalink(); ?>" class="sidebar-article-item">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail('thumbnail'); ?>
                                <?php else: ?>
                                    <div style="width: 80px; height: 80px; border-radius: 10px; background: #f1f3f5; display: flex; align-items: center; justify-content: center; color: #ccc; flex-shrink: 0;"><i class="fa-solid fa-image" style="font-size: 1.5rem;"></i></div>
                                <?php endif; ?>
                                <div class="sidebar-article-info">
                                    <h4><?php echo wp_trim_words(get_the_title(), 7, '...'); ?></h4>
                                    <div style="font-size: 0.8rem; color: #888; display: flex; align-items: center; gap: 5px;">
                                        <?php echo get_the_date('d M Y'); ?> &middot; Waktu baca <?php echo ceil(str_word_count(strip_tags(get_the_content())) / 200); ?> mnt
                                    </div>
                                </div>
                            </a>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div> <!-- End Bento Sidebar -->
                
            </aside> <!-- End blog-right-sidebar -->
            
        </div> <!-- End blog-2col-layout -->
    </div> <!-- End container -->
</div> <!-- End blog-page-container -->

<?php get_footer(); ?>
