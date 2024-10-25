<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>
                <?php 
                if (is_category()) {
                    single_cat_title();
                } elseif (is_tag()) {
                    single_tag_title();
                } elseif (is_author()) {
                    the_post();
                    echo 'Author Archives: ' . get_the_author();
                    rewind_posts();
                } elseif (is_day()) {
                    echo 'Daily Archives: ' . get_the_date();
                } elseif (is_month()) {
                    echo 'Monthly Archives: ' . get_the_date('F Y');
                } elseif (is_year()) {
                    echo 'Yearly Archives: ' . get_the_date('Y');
                } else {
                    echo 'Archives';
                }
                ?>
            </h1>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p><?php the_excerpt(); ?></p>
                </article>
            <?php endwhile; ?>
            <?php else : ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
            <div class="pagination">
                <?php the_posts_pagination(); ?>
            </div>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>
