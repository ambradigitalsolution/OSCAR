<?php 
/* Template Name: Blog */
get_header(); 
?>

<div class="blog-page-container" style="padding-top: 130px; padding-bottom: 80px; background-color: #f8f9fa;">
    <div class="container">
        <div class="blog-layout">
            
            <!-- Main Content Area -->
            <div class="blog-main">
                <?php 
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                $blog_query = new WP_Query( array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'paged' => $paged
                ) );

                $count = 0;
                if ( $blog_query->have_posts() ) :
                    while ( $blog_query->have_posts() ) : $blog_query->the_post(); 
                        $count++;
                        
                        // First post is the Hero Card
                        if ($count == 1) : 
                ?>
                            <article class="blog-hero-card" style="background-image: url('<?php echo get_the_post_thumbnail_url(null, 'large') ?: get_template_directory_uri() . '/assets/images/placeholder.jpg'; ?>');">
                                <div class="hero-overlay"></div>
                                <div class="hero-content">
                                    <div class="hero-meta">
                                        <span><i class="fa-solid fa-circle-check"></i> <?php the_author(); ?></span>
                                        <span>&bull;</span>
                                        <span><?php echo get_the_date(); ?></span>
                                    </div>
                                    <h2 class="hero-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <div class="hero-excerpt">
                                        <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                                    </div>
                                </div>
                            </article>
                        
                        <?php else : // Remaining posts are list items ?>
                            
                            <article class="blog-list-card">
                                <div class="list-card-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <?php the_post_thumbnail('medium'); ?>
                                        <?php else : ?>
                                            <div class="placeholder-img"><i class="fa-regular fa-image"></i></div>
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <div class="list-card-content">
                                    <h3 class="list-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <div class="list-excerpt">
                                        <?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?>
                                    </div>
                                    <div class="list-meta">
                                        <span><?php the_author(); ?></span> &bull; <span><?php echo get_the_date(); ?></span>
                                    </div>
                                </div>
                            </article>
                            
                        <?php endif; ?>
                    <?php endwhile; ?>
                    
                    <div class="pagination" style="margin-top: 40px; display: flex; justify-content: center; gap: 10px;">
                        <?php 
                        echo paginate_links(array(
                            'total' => $blog_query->max_num_pages,
                            'prev_text' => '« Sebelumnya', 
                            'next_text' => 'Selanjutnya »'
                        )); 
                        ?>
                    </div>
                    <?php wp_reset_postdata(); ?>
                    
                <?php else : ?>
                    <p style="text-align: center; width: 100%;">Belum ada artikel yang diterbitkan.</p>
                <?php endif; ?>
            </div>
            
            <!-- Sidebar Area -->
            <aside class="blog-sidebar">
                <div class="widget search-widget">
                    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <input type="search" class="search-field" placeholder="Search Post" value="<?php echo get_search_query(); ?>" name="s" />
                        <button type="submit" class="search-submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                
                <div class="widget recent-posts-widget">
                    <h3 class="widget-title">Artikel Pilihan</h3>
                    <div class="widget-posts-list">
                        <?php
                        // Fetch some featured or random recent posts for sidebar
                        $sidebar_args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 4,
                            'post_status' => 'publish',
                        );
                        $sidebar_query = new WP_Query($sidebar_args);
                        if ($sidebar_query->have_posts()) :
                            while ($sidebar_query->have_posts()) : $sidebar_query->the_post();
                        ?>
                            <div class="widget-post-item">
                                <div class="widget-post-img">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <?php the_post_thumbnail('thumbnail'); ?>
                                        <?php else : ?>
                                            <div class="placeholder-img-small"><i class="fa-regular fa-image"></i></div>
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <div class="widget-post-info">
                                    <h4 class="widget-post-title"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 8, '...'); ?></a></h4>
                                    <div class="widget-post-date"><i class="fa-regular fa-clock"></i> <?php echo get_the_date(); ?></div>
                                </div>
                            </div>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div>
            </aside>
            
        </div>
    </div>
</div>

<?php get_footer(); ?>
