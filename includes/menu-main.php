<header id="main-header">
    <div class="desktop">
        <div class="logo">
            <img src="<?php echo get_template_directory_uri(); ?>/img/Logo - color - black - 300px.png" class="logo-img">
        </div>
        <input id="menu-hamburguer" type="checkbox">
        <label for="menu-hamburguer" class="label-hamburguer">
            <div class="menu-test">
                <span class="hamburguer"></span>
            </div>
        </label>
        <?php
            wp_nav_menu( array(
                'theme_location' => 'top-menu',
                'menu-class' => 'menu',
                'container_class' => 'menu-container'
            ) );
        ?>
    </div>
</header>