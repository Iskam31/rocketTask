<?php get_header(); ?>

<main>
    <section class="single-service">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article>
                <h1 class="service-title"><?php the_title(); ?></h1>
                <div class="service-meta">
                    <span class="service-type">
                        <?php
                        $types = get_the_terms(get_the_ID(), 'type');
                        if ($types) {
                            echo esc_html($types[0]->name);
                        }
                        ?>
                    </span>
                    <span class="service-price">от <?php echo get_post_meta(get_the_ID(), 'price', true); ?> р</span>
                </div>
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large', ['class' => 'service-image']); ?>
                <?php endif; ?>
                <div class="service-content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; endif; ?>
    </section>

     <!-- Форма обратной связи -->
     <section class="contact-form">
        <h2>Свяжитесь с нами</h2>
        <?php echo do_shortcode('[contact-form-7 id="e7643b6" title="Без названия"]'); ?>
    </section>
</main>

<?php get_footer(); ?>
