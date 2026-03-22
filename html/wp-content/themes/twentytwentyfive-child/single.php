<?php get_header(); ?>

<main>
    <h1><?php the_title(); ?></h1>
    
    <?php if(get_field('companyinfo__owner_name')): ?>
        <p>代表者名：<?php the_field('companyinfo__owner_name'); ?></p>
    <?php endif; ?>
    
    <?php if(get_field('companyinfo__established')): ?>
        <p>設立年：<?php the_field('companyinfo__established'); ?></p>
    <?php endif; ?>
    
    <?php if(get_field('companyinfo__members')): ?>
        <p>従業員数：<?php the_field('companyinfo__members'); ?></p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>