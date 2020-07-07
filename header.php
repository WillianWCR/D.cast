<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    <?php 
        if(is_home()){
            echo get_bloginfo("name")." - ".get_bloginfo("description");
        }else{
            echo wp_title("", true, "")." - D.cast";
        }
    ?>
    </title>

    <?php wp_head(); ?>
</head>
<body>
<?php get_template_part('includes/menu', 'main'); ?>