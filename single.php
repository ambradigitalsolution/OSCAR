<?php get_header(); ?>

<div class="blog-page-container" style="padding-top: 130px; padding-bottom: 80px; background-color: #f8f9fa;">
    <div class="container">
        <div class="blog-layout">
            <!-- Main Content Area -->
            <div class="blog-main">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <article class="single-post-card" style="background: white; padding: 40px; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.05);">
                        
                        <div class="blog-meta" style="font-size: 0.9rem; color: var(--text-muted); margin-bottom: 15px; display: flex; gap: 15px; align-items: center;">
                            <span style="background: var(--primary-color); color: white; padding: 4px 10px; border-radius: 4px; font-weight: bold;"><?php the_category(', '); ?></span>
                            <span><i class="fa-solid fa-user"></i> <?php the_author(); ?></span>
                            <span><i class="fa-solid fa-calendar-days"></i> <?php echo get_the_date(); ?></span>
                        </div>
                        
                        <h1 style="font-size: 2.5rem; color: var(--primary-color); margin-bottom: 25px; font-weight: 800; line-height: 1.3;"><?php the_title(); ?></h1>
                        
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div style="margin-bottom: 30px;">
                                <?php the_post_thumbnail('large', ['style' => 'width: 100%; height: auto; border-radius: 8px;']); ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="post-content" style="line-height: 1.8; font-size: 1.1rem; color: #444;">
                            <?php the_content(); ?>
                        </div>
                        
                        <!-- Share Section -->
                        <div class="post-share" style="margin-top: 40px; padding: 20px 0; border-top: 1px solid #eee; display: flex; align-items: center; gap: 15px;">
                            <h4 style="margin: 0; font-size: 1.1rem;">Bagikan:</h4>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" style="width: 35px; height: 35px; background: #3b5998; color: white; display: flex; align-items: center; justify-content: center; border-radius: 50%;"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" style="width: 35px; height: 35px; background: #1da1f2; color: white; display: flex; align-items: center; justify-content: center; border-radius: 50%;"><i class="fa-brands fa-twitter"></i></a>
                            <a href="https://wa.me/?text=<?php echo urlencode(get_the_title() . ' ' . get_permalink()); ?>" target="_blank" style="width: 35px; height: 35px; background: #25d366; color: white; display: flex; align-items: center; justify-content: center; border-radius: 50%;"><i class="fa-brands fa-whatsapp"></i></a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>" target="_blank" style="width: 35px; height: 35px; background: #0077b5; color: white; display: flex; align-items: center; justify-content: center; border-radius: 50%;"><i class="fa-brands fa-linkedin-in"></i></a>
                        </div>
                        
                        <!-- Tags Section -->
                        <?php if(has_tag()) : ?>
                        <div class="post-tags" style="margin-top: 20px;">
                            <?php the_tags('<span style="font-weight: bold; margin-right: 10px;">Tags:</span> <span style="display:inline-block; padding:3px 10px; background:#f1f1f1; border-radius:4px; font-size:0.85rem; margin-right:5px;">', '</span> <span style="display:inline-block; padding:3px 10px; background:#f1f1f1; border-radius:4px; font-size:0.85rem; margin-right:5px;">', '</span>'); ?>
                        </div>
                        <?php endif; ?>
                        
                        <!-- Author Box -->
                        <div class="author-box" style="margin-top: 40px; padding: 25px; background: #f8f9fa; border-radius: 8px; display: flex; gap: 20px; align-items: flex-start;">
                            <div class="author-avatar" style="flex-shrink: 0;">
                                <?php echo get_avatar( get_the_author_meta('ID'), 80, '', '', ['style' => 'border-radius: 50%;'] ); ?>
                            </div>
                            <div class="author-info">
                                <h4 style="margin: 0 0 10px 0; font-size: 1.2rem;"><?php the_author(); ?></h4>
                                <p style="margin: 0; color: #666; font-size: 0.95rem; line-height: 1.6;">
                                    <?php 
                                    $author_desc = get_the_author_meta('description'); 
                                    echo !empty($author_desc) ? $author_desc : 'Penulis yang membagikan wawasan seputar teknologi, lelang, dan pengelolaan aset IT perusahaan di Oscar Network.';
                                    ?>
                                </p>
                            </div>
                        </div>
                        
                    </article>
                    
                    <!-- Post Navigation (Prev/Next) -->
                    <div class="post-navigation" style="margin-top: 30px; display: flex; justify-content: space-between; gap: 20px;">
                        <div class="nav-prev" style="flex: 1; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 3px 10px rgba(0,0,0,0.03);">
                            <span style="color: #888; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px;"><i class="fa-solid fa-arrow-left"></i> Artikel Sebelumnya</span>
                            <div style="margin-top: 10px; font-weight: bold;"><?php previous_post_link('%link', '%title'); ?></div>
                        </div>
                        <div class="nav-next" style="flex: 1; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 3px 10px rgba(0,0,0,0.03); text-align: right;">
                            <span style="color: #888; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px;">Artikel Selanjutnya <i class="fa-solid fa-arrow-right"></i></span>
                            <div style="margin-top: 10px; font-weight: bold;"><?php next_post_link('%link', '%title'); ?></div>
                        </div>
                    </div>



                <?php endwhile; endif; ?>
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
