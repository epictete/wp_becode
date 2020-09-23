<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset= "<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: <?php the_field('body_background_color', 'option'); ?>;
            width: 100%;
        }
        ul {
            list-style-type: none;
            padding-left: 0;
        }

        ul li {
            display: inline-block;
            padding: 5px;
        }

        nav {
            background-color: <?php the_field('navigation_background_color', 'option'); ?>;
            border: 1px solid <?php the_field('navigation_border_color', 'option'); ?>;
            border-radius: 3px;
            padding: 5px;
            margin: 5px;
            width: 100%;
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
    <header>
        <h1><?php bloginfo('name'); ?></h1> 
        <nav>
            <h3>This is the Nav</h3>
        </nav>
    </header>