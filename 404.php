<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12 m-5 p-5">
            <h1>404 - Page Not Found</h1>
            <p>Sorry, the page you are looking for does not exist. You can go back to the <a href="<?php echo home_url(); ?>">home page</a> or try searching for something else.</p>
            <?php get_search_form(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
