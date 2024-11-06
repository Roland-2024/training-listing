<?php get_header(); ?>

<div class="container py-5">
    <div class="text-center text-dark mt-5 mb-3">
        <h2>Tips and Insights</h2>
    </div>
    
    <div class="row">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); 
                // Get custom meta fields (like organization name and logo)
                $organization_name = get_post_meta(get_the_ID(), 'organization_name', true);
                $organization_logo = get_post_meta(get_the_ID(), 'organization_logo', true);
            ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <!-- Display Featured Image -->
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php the_post_thumbnail_url('large'); ?>" class="card-img-top img-fluid" alt="<?php the_title(); ?>" style="object-fit: cover; height: 250px;">
                        </a>
                    <?php else : ?>
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/default-course.webp" class="card-img-top img-fluid" alt="Default Image" style="object-fit: cover; height: 250px;">
                        </a>
                    <?php endif; ?>
                    
                    <div class="card-body">
                        <!-- Course Title -->
                        <h5 class="card-title">
                            <a href="<?php the_permalink(); ?>" class="text-dark"><?php the_title(); ?></a>
                        </h5>

                        <!-- Course Excerpt or Description -->
                        <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>

                        <!-- Organization Logo and Name -->
                        <?php if ($organization_logo || $organization_name): ?>
                            <div class="d-flex align-items-center mt-3">
                                <?php if ($organization_logo): ?>
                                    <img src="<?php echo esc_url($organization_logo); ?>" alt="<?php echo esc_attr($organization_name); ?>" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                <?php endif; ?>
                                <p class="mb-0 ms-2"><?php echo esc_html($organization_name); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="card-footer text-end">
                        <a href="<?php the_permalink(); ?>" class="btn btn-sm text-white" style="background-color:#f5a425 ;">Më shumë detaje</a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        <?php else : ?>
            <div class="col-12">
                <p>No posts found.</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Pagination -->
    <div class="row">
        <div class="col-12">
            <nav aria-label="Page navigation" class="d-flex justify-content-center">
                <?php 
                $pagination_args = array(
                    'mid_size'  => 2,
                    'prev_text' => '&laquo;',
                    'next_text' => '&raquo;',
                    'type'      => 'array',
                );
                $pages = paginate_links($pagination_args);

                if ($pages) {
                    echo '<ul class="pagination">';
                    foreach ($pages as $page) {
                        echo '<li class="page-item">' . str_replace('page-numbers', 'page-link', $page) . '</li>';
                    }
                    echo '</ul>';
                }
                ?>
            </nav>
        </div>
    </div>

</div>

<?php get_footer(); ?>
