<?php get_header(); ?>

<main>
    <section class="single-article">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article>
                <h1 class="article-title"><?php the_title(); ?></h1>
                <div class="article-meta">
                    <span class="article-date"><?php echo get_the_date('d.m.Y'); ?></span>
                </div>
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large', ['class' => 'article-image']); ?>
                <?php endif; ?>
                <div class="article-content">
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
