<?php
$args = array(
    'post_type' => 'promotions',
    'posts_per_page' => 5
);
$query = new WP_Query($args);

if ($query->have_posts()) : ?>
    <section class="services">
        <h2>Услуги</h2>
        <div class="services-slider">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="service-item">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium', ['class' => 'service-image']); ?>
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/my-themes-assets/default-image.jpg" class="service-image" alt="Нет изображения">
                        <?php endif; ?>
                    </a>
                    <h3 class="service-title"><?php the_title(); ?></h3>
                    <p class="service-price">от <?php echo get_post_meta(get_the_ID(), 'price', true); ?> р</p>
                    <a href="<?php echo get_post_type_archive_link('promotions'); ?>?type=<?php echo get_the_terms(get_the_ID(), 'type')[0]->slug; ?>" class="service-type">
                        <?php echo get_the_terms(get_the_ID(), 'type')[0]->name; ?>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
<?php endif;
wp_reset_postdata();
?>
