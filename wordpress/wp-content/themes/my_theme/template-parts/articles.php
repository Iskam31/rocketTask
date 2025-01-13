<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 5
);
$query = new WP_Query($args);

if ($query->have_posts()) : ?>
    <section class="articles">
        <span>Статьи</span>
        <div class="articles-grid">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <article class="article-item">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium', ['class' => 'article-image']); ?>
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>./assets/images/article1.png" class="article-image" alt="Нет изображения">
                        <?php endif; ?>
                    </a>
                    <h3 class="article-title"><?php the_title(); ?></h3>
                    <p class="article-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                    <p class="article-date"><?php echo get_the_date('d.m.Y'); ?></p>
                </article>
            <?php endwhile; ?>
        </div>
    </section>
<?php endif;
wp_reset_postdata();
?>
