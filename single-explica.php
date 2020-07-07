<?php
    get_header();
?>

<div class="artigo-content">
    <div class="artigo-header">
        <h1><?php the_title(); ?></h1>
    </div>
    <div class="artigo-description">
        <?php the_content(); ?>
    </div>
    <?php 
        // the query
        $recommendedEpisodes = new WP_Query( array(
            'category_name' => 'Podcast',
                'posts_per_page' => 7,
        )); 
    ?>
    <div class="sub-header">
        <span class="divider"></span>
        <span class="title">Outros artigos:</span>
    </div>
    <section class="episodes">
        <ul class="list horizontal">
            <?php if ( $recommendedEpisodes->have_posts() ) : while ( $recommendedEpisodes->have_posts() ) : $recommendedEpisodes->the_post(); ?>
                <li class="item">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php the_post_thumbnail_url('medium'); ?>" class="item-cover rounded shadow">
                        <h3 class="item-title"><?php the_title(); ?></h3>
                        <span class="item-date"><?php the_date(); ?></span>
                    </a>
                </li>
            <?php endwhile; endif; ?>
        </ul>
    </section>
</div>

<?php
    get_footer();
?>