<?php
get_header(); 
// Get custom meta values
$organization_name = get_post_meta(get_the_ID(), 'organization_name', true);
$organization_logo = get_post_meta(get_the_ID(), 'organization_logo', true);
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Featured Image -->
            <?php if (has_post_thumbnail()): ?>
                <div class="mb-5 text-center">
                    <?php the_post_thumbnail('large', ['class' => 'img-fluid rounded shadow']); ?>
                </div>
            <?php endif; ?>

            <!-- Post Title -->
            <h1 class="display-4 text-primary fw-bold mb-4 text-center"><?php the_title(); ?></h1>

            <!-- Organization Name and Logo -->
            <?php if ($organization_name || $organization_logo): ?>
                <div class="organization-details mb-5 d-flex align-items-center">
                    <?php if ($organization_logo): ?>
                        <div class="me-3">
                            <img src="<?php echo esc_url($organization_logo); ?>" alt="<?php echo esc_attr($organization_name); ?> logo" class="rounded-circle" style="width: 75px; height: 75px;">
                        </div>
                    <?php endif; ?>
                    <div class="mx-3">
                        <h4 class="text-secondary mb-0"><?php echo esc_html($organization_name); ?></h4>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Post Content -->
            <div class="post-content mb-5">
                <?php while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            </div>

            <!-- Apliko Button with Collapsible Form -->
            <div class="application-form mb-5 text-center">
                <button class="btn btn-apliko btn-application__submit w-50 btn-application btn-lg text-white" type="button" data-bs-toggle="collapse" data-bs-target="#applicationForm" aria-expanded="false" aria-controls="applicationForm">
                    Apply
                </button>

                <div class="collapse mt-4" id="applicationForm">
                    <!-- Form starts here -->
                    <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="POST" class="p-4 rounded shadow-sm bg-light">
                        <!-- Nonce for security -->
                        <?php wp_nonce_field('submit_application_action', 'submit_application_nonce'); ?>
                        
                        <!-- Form fields -->
                        <div class="mb-3">
                            <label for="applicant_name" class="form-label">Full Name:</label>
                            <input type="text" class="form-control" id="applicant_name" name="applicant_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="applicant_email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="applicant_email" name="applicant_email" required>
                        </div>
                        <div class="mb-3">
                            <label for="applicant_message" class="form-label">Message:</label>
                            <textarea class="form-control" id="applicant_message" name="applicant_message" rows="4" required></textarea>
                        </div>
                        
                        <!-- Submit button -->
                        <button type="submit" name="submit_application" class="btn btn-apliko btn-application__submit btn-success w-100">Submit Application</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>