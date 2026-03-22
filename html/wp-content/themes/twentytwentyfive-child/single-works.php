<?php get_header(); ?>

<main>
    <h1><?php the_title(); ?></h1>
    
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
    
    <?php if(get_field('achievements__project_name')): ?>
        <p>案件名：<?php the_field('achievements__project_name'); ?></p>
    <?php endif; ?>
    
    <?php if(get_field('achievements__cliant_name')): ?>
        <p>クライアント：<?php the_field('achievements__cliant_name'); ?></p>
    <?php endif; ?>
    
    <?php if(get_field('achievements__date')): ?>
        <p>制作年：<?php the_field('achievements__date'); ?></p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>