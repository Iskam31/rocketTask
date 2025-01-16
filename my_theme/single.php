<?php get_header(); ?>

<main class="site-content single">
    <section class="single-article">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article>
                <div class="single-article-wrapper">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large', ['class' => 'single-article-image']); ?>
                    <?php endif; ?>
                    <div class="single-article-box-content">
                        <h1 class="single-article-title"><?php the_title(); ?></h1>
                        <div class="single-article-content"><?php the_content(); ?></div>
                        <div class="single-article-meta"><span class="article-date"><?php echo get_the_date('d.m.Y'); ?></span></div>
                    </div>
                </div>
            </article>
        <?php endwhile; endif; ?>

    </section>
    <button id="show-form-btn" class="show-form-btn">Связаться с нами</button>
    <!-- Форма обратной связи -->
    <section class="contact-form hidden">
        <h2>Свяжитесь с нами</h2>
        <?php echo do_shortcode('[contact-form-7 id="3f647b6" title="Обратная связь статей"]'); ?>
    </section>
</main>
<?php get_footer(); ?>
