<?php
/*
Template Name: Blog
*/
get_header(); ?>

<style>
/* Base Reset & Variables for Bento Grid */
:root {
    --bento-gap: 25px;
    --bento-radius: 24px;
    --bento-border: 1px solid rgba(0,0,0,0.06);
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
    display: flex;
    flex-direction: column;
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

/* Kiri: Daftar Artikel (Bento Vertikal) */
.bento-post-card {
    display: flex;
    flex-direction: column;
    background: #fff;
    border-radius: var(--bento-radius);
    overflow: hidden;
    border: var(--bento-border);
    box-shadow: 0 5px 20px rgba(0,0,0,0.03);
    text-decoration: none;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    margin-bottom: var(--bento-gap);
}
.bento-post-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.08);
}
.bento-post-img {
    width: 100%;
    aspect-ratio: 16 / 9;
    position: relative;
    background: #f8f9fa;
    overflow: hidden;
}
.bento-post-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
}
.bento-post-card:hover .bento-post-img img {
    transform: scale(1.05);
}
.bento-post-content {
    padding: 30px;
    display: flex;
    flex-direction: column;
    flex: 1;
}
.bento-post-content h3 {
    font-size: 1.4rem;
    font-weight: 700;
    color: #111;
    margin: 0 0 12px 0;
    line-height: 1.4;
    transition: color 0.2s;
}
.bento-post-card:hover .bento-post-content h3 {
    color: var(--primary-color);
}
.bento-post-excerpt {
    color: #555;
    font-size: 0.95rem;
    line-height: 1.6;
    margin-bottom: 20px;
}
.bento-post-meta {
    margin-top: auto;
    font-size: 0.85rem;
    color: #888;
    display: flex;
    align-items: center;
    gap: 15px;
}
.bento-post-meta .author {
    font-weight: 600;
    color: #444;
}

@media (max-width: 768px) {
    /* Optional: adjust any other mobile layout here if needed */
}

/* Pagination Bento */
.bento-pagination {
    background: #fff;
    border-radius: 20px;
    padding: 20px;
    border: var(--bento-border);
    box-shadow: 0 4px 15px rgba(0,0,0,0.02);
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 20px;
}
.bento-pagination .page-numbers {
    padding: 10px 18px;
    border-radius: 12px;
    background: #f4f6f8;
    color: #444;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.2s;
}
.bento-pagination .page-numbers:hover,
.bento-pagination .page-numbers.current {
    background: var(--primary-color);
    color: #fff;
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
                
                <?php 
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post(); 
                ?>
                    
                    <!-- BENTO LIST ITEM -->
                    <a href="<?php the_permalink(); ?>" class="bento-post-card">
                        <div class="bento-post-img">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail('medium_large'); ?>
                            <?php else : ?>
                                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/laptop-category.png' ); ?>" alt="Thumbnail">
                            <?php endif; ?>
                        </div>
                        
                        <div class="bento-post-content">
                            <h3><?php echo wp_trim_words(get_the_title(), 15, '...'); ?></h3>
                            <div class="bento-post-excerpt">
                                <?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?>
                            </div>
                            <div class="bento-post-meta">
                                <span class="author"><i class="fa-solid fa-user-pen" style="margin-right: 5px;"></i> <?php echo get_the_author(); ?></span>
                                <span><i class="fa-regular fa-clock" style="margin-right: 5px;"></i> <?php echo get_the_date('d M Y'); ?></span>
                            </div>
                        </div>
                    </a>
                    
                <?php 
                    endwhile;
                else : 
                ?>
                    <div class="bento-box" style="text-align: center; padding: 50px;">
                        <i class="fa-solid fa-ghost" style="font-size: 3rem; color: #ccc; margin-bottom: 20px;"></i>
                        <h3 style="color: #666; margin: 0;">Belum ada artikel yang diterbitkan.</h3>
                    </div>
                <?php endif; ?>

                <!-- PAGINATION BENTO -->
                <?php if (paginate_links()) : ?>
                    <div class="bento-pagination">
                        <?php 
                        echo paginate_links([
                            'prev_text' => '<i class="fa-solid fa-arrow-left"></i>',
                            'next_text' => '<i class="fa-solid fa-arrow-right"></i>'
                        ]); 
                        ?>
                    </div>
                <?php endif; ?>

            </div> <!-- End blog-main-content -->
            
            <!-- KOLOM KANAN: SIDEBAR -->
            <aside class="blog-right-sidebar">
                
                <!-- BENTO SEARCH -->
                <div class="bento-box" style="padding: 20px;">
                    <form role="search" method="get" style="display: flex; position: relative;" action="<?php echo esc_url(home_url('/')); ?>">
                        <input type="search" name="s" placeholder="Cari Artikel..." value="<?php echo get_search_query(); ?>" style="width: 100%; padding: 12px 15px; border: 1px solid #eaeaea; border-right: none; border-radius: 8px 0 0 8px; outline: none; font-size: 0.95rem; background: #fff; transition: all 0.2s;" onfocus="this.style.borderColor='var(--secondary-color)'" onblur="this.style.borderColor='#eaeaea'" />
                        <button type="submit" style="padding: 12px 20px; background-color: var(--secondary-color); color: white; border: 1px solid var(--secondary-color); border-radius: 0 8px 8px 0; cursor: pointer; transition: background-color 0.2s; display: flex; align-items: center; justify-content: center;" onmouseover="this.style.backgroundColor='var(--accent-color)'" onmouseout="this.style.backgroundColor='var(--secondary-color)'">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>

                <!-- BENTO SIDEBAR REKOMENDASI -->
                <div class="bento-box" style="padding: 20px;">
                    <h3 style="font-size: 1.2rem; font-weight: 800; margin: 0 0 15px 0; color: #111; padding-bottom: 15px; border-bottom: 1px solid #f0f0f0;">Artikel Terbaru</h3>
                    
                    <div class="sidebar-articles-list" style="margin-top: 15px;">
                        <?php
                        $sidebar_args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 5,
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
                                        <?php echo get_the_date('d M Y'); ?>
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



