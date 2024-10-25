<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Roland Aga">
    <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="main-header clearfix" role="header">
    <div class="logo">
        <a href="<?php echo home_url(); ?>"><em>Grad</em> School</a>
    </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
        <ul class="main-menu">
            <li><a href="#section1">Home</a></li>
            <li><a href="#section2">About Us</a></li>
            <li><a href="/trainings">Courses</a></li>
            <li><a href="#section4">Contact</a></li>
        </ul>
    </nav>
</header>
