<?php
get_header();
?>

<div class="container my-5">
    <!-- Featured Image Section -->
    <?php if (has_post_thumbnail()): ?>
        <div class="row mb-4">
            <div class="col-12">
                <div class="featured-image d-flex justify-content-center">
                    <?php the_post_thumbnail('large', ['class' => 'img-fluid rounded shadow']); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Page Content Section -->
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="page-content">
                <h1 class="display-4 text-primary fw-bold mb-4 text-center"><?php the_title(); ?></h1>
                <div class="content">
                    <?php
                    while (have_posts()) : the_post();
                        the_content();
                    endwhile;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
