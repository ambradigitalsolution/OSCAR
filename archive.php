<?php get_header(); ?>

<section class="section-light" style="padding-top: 120px;">
    <div class="container">
        <div class="section-title">
            <h2 style="text-transform: capitalize;">
                <?php
                    if ( is_category() ) {
                        single_cat_title('Kategori: ');
                    } elseif ( is_tag() ) {
                        single_tag_title('Tag: ');
                    } elseif ( is_author() ) {
                        echo 'Penulis: ' . get_the_author();
                    } elseif ( is_month() ) {
                        echo 'Arsip: ' . get_the_date( 'F Y' );
                    } else {
                        echo 'Arsip Blog';
                    }
                ?>
            </h2>
            <p><?php the_archive_description(); ?></p>
        </div>

        <div class="products-grid" style="grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));">
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <article class="product-card" style="text-align: left; display: flex; flex-direction: column;">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium', ['class' => 'blog-img', 'style' => 'width: 100%; height: 200px; object-fit: cover; border-radius: 6px; margin-bottom: 15px;']); ?>
                            </a>
                        <?php endif; ?>
                        
                        <div class="blog-meta" style="font-size: 0.8rem; color: var(--text-muted); margin-bottom: 10px;">
                            <i class="fa-solid fa-calendar-days"></i> <?php echo get_the_date(); ?>
                            &nbsp;&nbsp;
                            <i class="fa-solid fa-folder"></i> <?php the_category(', '); ?>
                        </div>
                        
                        <h3 style="font-size: 1.2rem; margin-bottom: 10px;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        
                        <div class="blog-excerpt" style="font-size: 0.9rem; color: #555; flex-grow: 1; margin-bottom: 15px;">
                            <?php the_excerpt(); ?>
                        </div>
                        
                        <a href="<?php the_permalink(); ?>" class="btn btn-secondary" style="align-self: flex-start; padding: 8px 16px; font-size: 0.85rem;">Baca Selengkapnya</a>
                    </article>
                <?php endwhile; ?>
            <?php else : ?>
                <p style="text-align: center; width: 100%;">Belum ada artikel di kategori ini.</p>
            <?php endif; ?>
        </div>
        
        <div class="pagination" style="margin-top: 40px; display: flex; justify-content: center; gap: 10px;">
            <?php echo paginate_links(['prev_text' => '« Sebelumnya', 'next_text' => 'Selanjutnya »']); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
