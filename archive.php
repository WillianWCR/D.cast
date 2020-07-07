<?php
    get_header();
?>

<div class="content">
    <div class="sub-header">
        <span class="divider"></span>
        <span class="title">Últimos episódios</span>
    </div>
    <section class="episodes">
        <ul class="list vertical">
            <?php if(have_posts()):while(have_posts()): the_post(); ?>
                <li class="item">
                    <a href="#">
                        <div class="cover">
                            <img src="<?php the_post_thumbnail_url('medium'); ?>" class="item-cover rounded shadow">
                        </div>
                    </a>
                    <div class="details">
                        <span class="item-date"><?php the_date(); ?></span>
                        <a href="<?php the_permalink(); ?>">
                            <h3 class="item-title"><?php the_title(); ?></h3>
                        </a>
                        <p class="item-description"><?php the_excerpt_embed(); ?></p>
                        <div class="button">
                            <a class="btn btn-primary" href="<?php the_permalink(); ?>">
                                <i class="fas fa-volume-up icon"></i>
                                Ouvir agora
                            </a>
                        </div>
                    </div>
                </li>
            <?php endwhile; else: endif; ?>
        </ul>
    </section>
    <div class="pagination">
        <?php 
            if(get_previous_posts_link()):
        ?>
        <div class="previous">
            <?php previous_posts_link('Página anterior'); ?>
        </div>
        <?php
            endif;
            if(get_next_posts_link()):
        ?>
        <div class="next">
            <?php next_posts_link('Próxima página'); ?>
        </div>
        <?php
            endif;
        ?>
    </div>
</div>

<?php
    get_footer();
?>