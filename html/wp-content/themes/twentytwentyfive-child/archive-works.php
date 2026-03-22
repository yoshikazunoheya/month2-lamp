<?php get_header(); ?>

<main>
    <h1>実績一覧</h1>
    
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post(); ?>
            <article>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php if(get_field('achievements__project_name')): ?>
                    <p>案件名：<?php the_field('achievements__project_name'); ?></p>
                <?php endif; ?>
            </article>
        <?php endwhile; ?>
    <?php else: ?>
        <p>実績はまだありません。</p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>