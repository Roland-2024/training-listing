<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>Search Results for: <?php echo get_search_query(); ?></h1>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p><?php the_excerpt(); ?></p>
                </article>
            <?php endwhile; else : ?>
                <p><?php _e('Sorry, no results matched your search.'); ?></p>
            <?php endif; ?>
            <div class="pagination">
                <?php the_posts_pagination(); ?>
            </div>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>