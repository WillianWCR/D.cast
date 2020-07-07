<?php
    get_header();
?>

<div class="content">
    <div class="episode-header">
        <div class="episode-cover">
            <img src="<?php the_post_thumbnail_url('large'); ?>" class="cover-img rounded shadow">
        </div>
        <div class="episode-info">
            <a href="#" class="header"><?php the_title(); ?></a>
            <div class="details">
                <div class="info">
                    <i class="far fa-calendar icon"></i>
                    <span class="text"><?php the_date(); ?></span>
                </div>
                <?php if(get_post_meta($post->ID, 'episode_duration', true)):?>
                <div class="info">
                    <i class="far fa-clock icon"></i>
                    <span class="text"><?php echo get_post_meta($post->ID, 'episode_duration', true); ?></span>
                </div>
                <?php endif; ?>
            </div>
            <div class="tags">
                <?php print_r(the_category(' ')); ?>
            </div>
            <?php if(get_post_meta($post->ID, 'episode_url', true)):?>
            <audio controls>
                <source src="<?php echo get_post_meta($post->ID, 'episode_url', true); ?>" type="audio/mpeg">
                Seu navegador não suporta áudio
            </audio>
            <?php endif; ?>
        </div>
    </div>
    <div class="episode-description">
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
        <span class="title">Últimos episódios</span>
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