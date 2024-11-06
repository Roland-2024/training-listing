<?php
/*
Template Name: Application Page
*/
get_header();
?>

<div class="container my-5 d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-lg-6 col-md-8">
        <div class="bg-white p-5 rounded shadow-lg">
            <h2 class="text-primary fw-bold mb-4 text-center">Submit Your Application</h2>

            <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="POST" class="p-4">
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
                <button type="submit" name="submit_application" class="btn btn-success w-100">Submit Application</button>
            </form>
        </div>
    </div>
</div>

<?php
get_footer();
?>
