<?php
    get_header();
?>

<?php

    if(isset($_POST['submit'])){
        if($_POST['from'] == "frontpage_newsletter"){

            $data = [
                'email_address' => $_POST['email'],
                'status' => 'subscribed'
            ];

            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://us19.api.mailchimp.com/3.0/lists/58d01bc4fe/members",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: Basic YW55c3RyaW5nOjNmNTQ3OTllNmI5ZTY3ZDkzNWRhMjcxNjgxODdmYzA2LXVzMTk="
            ),
            ));

            $response = json_decode(curl_exec($curl), true);

            curl_close($curl);
            
            if($response['status'] == "subscribed"){
                echo "<script>alert('Obrigado por se inscrever!');</script>";
            }

        }
    }

?>

<div class="content-banner">

    <?php 
        // the query
        $last_episode = new WP_Query( array(
            'category_name' => 'Podcast',
                'posts_per_page' => 1,
        )); 
    ?>
    <div class="banner">
        <?php while ( $last_episode->have_posts() ) : $last_episode->the_post(); ?>
        <div class="episode-info">
            <span class="badge dark-purple">NEW!</span>
            <a href="<?php the_permalink(); ?>" class="header"><?php the_title(); ?></a>
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
            <p class="description">
            <?php the_excerpt_embed(); ?>
            </p>
            <div class="button">
                <a class="btn btn-primary" href="<?php the_permalink(); ?>">
                    <i class="fas fa-volume-up icon"></i>
                    Ouvir agora
                </a>
            </div>
        </div>
        <div class="episode-cover">
            <a href="<?php the_permalink(); ?>">
                <img src="<?php the_post_thumbnail_url('large'); ?>" class="cover-img rounded shadow">
            </a>
        </div>
        <?php endwhile; ?>
    </div>
</div>
<div class="content">
    <div class="sub-header">
        <span class="divider"></span>
        <span class="title">Últimos episódios</span>
    </div>
    <section class="episodes">
        <ul class="list horizontal">
            <?php if(have_posts()):while(have_posts()): the_post(); ?>
                <li class="item">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php the_post_thumbnail_url('medium'); ?>" class="item-cover rounded shadow">
                        <h3 class="item-title"><?php the_title(); ?></h3>
                        <span class="item-date"><?php the_date(); ?></span>
                    </a>
                </li>
            <?php endwhile; else: endif; ?>
        </ul>
    </section>
    <div class="sub-header">
        <span class="divider"></span>
        <span class="title">Hosts</span>
    </div>
    <section class="hosts">
        <div class="card align-left">
            <div class="cover">
                <img src="<?php echo get_template_directory_uri(); ?>/img/FotoWillian.jpg" class="rounded shadow">
            </div>
            <div class="details right">
                <h1 class="title">Willian Rodrigues</h1>
                <h3 class="subtitle">Host & Co-fundador</h3>
                <p class="description">I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                <ul class="socials inline-list">
                    <li class="social">
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    <li class="social">
                        <a href="#">
                            <i class="fab fa-dribbble"></i>
                        </a>
                    </li>
                    <li class="social">
                        <a href="#">
                            <i class="fab fa-flickr"></i>
                        </a>
                    </li>
                    <li class="social">
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li class="social">
                        <a href="#">
                            <i class="fab fa-behance"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card align-right">
            <div class="details left">
                <h1 class="title">João</br>Ricardo</h1>
                <h3 class="subtitle">Host & Co-fundador</h3>
                <p class="description">I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                <ul class="socials inline-list">
                    <li class="social">
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    <li class="social">
                        <a href="#">
                            <i class="fab fa-dribbble"></i>
                        </a>
                    </li>
                    <li class="social">
                        <a href="#">
                            <i class="fab fa-flickr"></i>
                        </a>
                    </li>
                    <li class="social">
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li class="social">
                        <a href="#">
                            <i class="fab fa-behance"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="cover">
                <img src="<?php echo get_template_directory_uri(); ?>/img/FotoJoão.jpeg" class="rounded shadow">
            </div>
        </div>
    </section>
    <div class="sub-header">
        <span class="divider"></span>
        <span class="title">Newsletter</span>
    </div>
    <section class="newsletter">
        <div class="full-card rounded">
            <h1 class="title">
                Fique dentro das novidades!
            </h1>
            <form class="full-width" action="" method="POST">
                <div class="input-group">
                    <input type="email" name="email" class="input rounded" placeholder="seu@email.com">
                    <input type="hidden" name="from" value="frontpage_newsletter">
                    <button class="btn btn-primary" name="submit" type="submit"><i class="fas fa-chevron-right"></i></button>
                </div>
            </form>
        </div>
    </section>
</div>
<?php
    get_footer();
?>
    