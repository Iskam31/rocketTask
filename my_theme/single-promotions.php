<?php get_header(); ?>

<main class="site-content single">
    <section class="single-article">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article>
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large', ['class' => 'single-article-image']); ?>
                <?php endif; ?>
                <h1 class="single-service-title"><?php the_title(); ?></h1>
                <div class="single-service-meta">
                    <?php foreach (get_the_terms(get_the_ID(), 'type') as $key => $i): ?>
                    <span class="single-service-type">
                        <?php echo $i->name;?>
                    </span>
                    <?php endforeach; ?>
                </div>
                <span class="single-service-price">от <?php echo get_post_meta(get_the_ID(), 'price', true); ?> р</span>
                
                <div class="single-service-content">
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
