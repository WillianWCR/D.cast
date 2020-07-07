<?php
    get_header();
?>

<div class="content">
    <div class="sub-header">
        <span class="divider"></span>
        <span class="title"><?php the_title(); ?></span>
    </div>
    <div class="page-content">
        <?php get_template_part('includes/section', 'content'); ?>
    </div>
</div>

<?php
    get_footer();
?>