<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,600|Overlock:400,700" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body>
    <div id="nav-bar">
        <header>
            <div id="headline">
                <button id="nav-button" onClick="toggleMenu(this)">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </button>
                <h1>
                    <a class="title" href="<?php bloginfo('url'); ?>">
                        <?php bloginfo('name'); ?>
                    </a>
                </h1>
            </div>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'container_class' => 'nav-list'
            ));
            ?>
        </header>
    </div>
    <div class="main-container">
        <div class="top-pad"></div>
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post(); ?>
                <div class="post-container">
                    <?php
                        $mainImage = get_field('main_image');
                        $mainLayout = get_field('main_layout');
                    ?>
                    <div class="image-container img-<?php echo $mainLayout; ?>">
                        <img src="<?php echo $mainImage['url']; ?>" alt="<?php echo $mainImage['alt']; ?>" class="post-image" />
                    </div>
                    <article class="post-text text-<?php echo $mainLayout; ?>">
                        <h2><?php the_field('post_headline'); ?></h2>
                        <?php the_field('main_text'); ?>
                    </article>
                    <?php if (get_field('second_image') && get_field('second_text')) :
                        $secondImage = get_field('second_image');
                        $secondLayout = get_field('second_layout');
                    ?>
                        <div class="image-container img-<?php echo $secondLayout; ?>">        
                            <img src="<?php echo $secondImage['url']; ?>" alt="<?php echo $secondImage['alt']; ?>" class="post-image" />
                        </div>
                        <article class="post-text text-<?php echo $secondLayout; ?>">
                            <?php the_field('second_text'); ?>
                        </article>
                    <?php elseif (get_field('second_text')) : ?>
                        <article class="post-text text-landscape">
                            <?php the_field('second_text'); ?>
                        </article>
                    <?php endif; ?>
                    <?php if (get_field('third_text')) : ?>
                        <article class="post-text text-landscape">
                            <?php the_field('third_text'); ?>
                        </article>
                    <?php endif; ?>
                </div>
            <?php
            endwhile;
        endif;
        ?>
    </div> <!-- #main-container -->
    <?php wp_footer(); ?>
</body>

</html>