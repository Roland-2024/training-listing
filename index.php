<?php get_header(); ?>

<!-- Main Content Section -->
<section class="section blog-posts">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Latest Blog Posts</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <!-- Start the Loop for Blog Posts -->
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="blog-post">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p class="post-meta">
                                Posted on <?php echo get_the_date(); ?> by <?php the_author(); ?>
                            </p>
                            <div class="post-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
                        </div>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p><?php esc_html_e('No posts found.', 'training-list'); ?></p>
                <?php endif; ?>
                <!-- Pagination -->
                <div class="pagination">
                    <?php
                    the_posts_pagination(array(
                        'mid_size' => 2,
                        'prev_text' => __('&laquo; Previous', 'training-list'),
                        'next_text' => __('Next &raquo;', 'training-list'),
                    ));
                    ?>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
