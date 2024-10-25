<?php

// Enable support for Post Thumbnails
add_theme_support('post-thumbnails');
function training_list_enqueue_scripts() {
    // CSS files
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/fontawesome.css');
    wp_enqueue_style('grad-school-style', get_template_directory_uri() . '/assets/css/templatemo-grad-school.css');
    wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/css/owl.css');
    wp_enqueue_style('lightbox', get_template_directory_uri() . '/assets/css/lightbox.css');
    wp_enqueue_style('main-style', get_stylesheet_uri()); 

    // JavaScript files
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.min.js', array('jquery'), null, true); // Updated to use bootstrap.min.js
    // wp_enqueue_script('isotope', get_template_directory_uri() . '/assets/js/isotope.min.js', array('jquery'), null, true);
    wp_enqueue_script('owl-carousel-js', get_template_directory_uri() . '/assets/js/owl-carousel.js', array('jquery'), null, true);
    // wp_enqueue_script('lightbox-js', get_template_directory_uri() . '/assets/js/lightbox.js', array('jquery'), null, true);
    wp_enqueue_script('tabs', get_template_directory_uri() . '/assets/js/tabs.js', array('jquery'), null, true);
    // wp_enqueue_script('video', get_template_directory_uri() . '/assets/js/video.js', array('jquery'), null, true);
    wp_enqueue_script('slick-slider', get_template_directory_uri() . '/assets/js/slick-slider.js', array('jquery'), null, true);
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'training_list_enqueue_scripts');

function training_list_widgets_init() {
    register_sidebar(array(
        'name' => __('Main Sidebar', 'training-list'),
        'id' => 'main-sidebar',
        'description' => __('Widgets in this area will be shown on all posts and pages.', 'training-list'),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'training_list_widgets_init');

function create_training_post_type() {
    $labels = array(
        'name' => 'Trainings',
        'singular_name' => 'Training',
        'menu_name' => 'Trainings',
        'name_admin_bar' => 'Training',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Training',
        'new_item' => 'New Training',
        'edit_item' => 'Edit Training',
        'view_item' => 'View Training',
        'all_items' => 'All Trainings',
        'search_items' => 'Search Trainings',
        'not_found' => 'No trainings found.',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'trainings'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'), 
        'taxonomies'  => array('category', 'post_tag'),
        'menu_icon' => 'dashicons-welcome-learn-more',
    );

    register_post_type('training', $args);
}
add_action('init', 'create_training_post_type');

function create_training_taxonomy() {
    $labels = array(
        'name'              => 'Training Categories',
        'singular_name'     => 'Training Category',
        'search_items'      => 'Search Training Categories',
        'all_items'         => 'All Training Categories',
        'parent_item'       => 'Parent Training Category',
        'parent_item_colon' => 'Parent Training Category:',
        'edit_item'         => 'Edit Training Category',
        'update_item'       => 'Update Training Category',
        'add_new_item'      => 'Add New Training Category',
        'new_item_name'     => 'New Training Category Name',
        'menu_name'         => 'Training Categories',
    );

    $args = array(
        'hierarchical'      => true, // True for categories, false for tags
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'training-category'),
    );

    register_taxonomy('training_category', array('training'), $args);
}
add_action('init', 'create_training_taxonomy');

function add_training_meta_boxes() {
    add_meta_box(
        'training_organization',
        'Training Organization Details',
        'render_training_meta_box',
        'training',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_training_meta_boxes');

function render_training_meta_box($post) {
    // Retrieve the current values
    $organization_name = get_post_meta($post->ID, 'organization_name', true);
    $organization_logo = get_post_meta($post->ID, 'organization_logo', true);
    ?>

    <p>
        <label for="organization_name">Organization Name:</label><br>
        <input type="text" name="organization_name" id="organization_name" value="<?php echo esc_attr($organization_name); ?>" size="30">
    </p>
    
    <p>
        <label for="organization_logo">Organization Logo:</label><br>
        <input type="text" name="organization_logo" id="organization_logo" value="<?php echo esc_url($organization_logo); ?>" size="50">
        <input type="button" class="upload-logo-button" value="Upload Logo">
    </p>

    <script>
    jQuery(document).ready(function($){
        // WordPress media uploader for the logo
        $('.upload-logo-button').click(function(e) {
            e.preventDefault();
            var logoUploader = wp.media({
                title: 'Select Organization Logo',
                button: {
                    text: 'Use this logo'
                },
                multiple: false
            })
            .on('select', function() {
                var attachment = logoUploader.state().get('selection').first().toJSON();
                $('#organization_logo').val(attachment.url);
            })
            .open();
        });
    });
    </script>
    <?php
}

// Save the custom fields when the post is saved
function save_training_meta_boxes($post_id) {
    if (isset($_POST['organization_name'])) {
        update_post_meta($post_id, 'organization_name', sanitize_text_field($_POST['organization_name']));
    }
    if (isset($_POST['organization_logo'])) {
        update_post_meta($post_id, 'organization_logo', esc_url_raw($_POST['organization_logo']));
    }
}
add_action('save_post', 'save_training_meta_boxes');

// Function to handle the training application form submission
function handle_training_application_form() {
    // Check if the form is submitted
    if (isset($_POST['submit_application'])) {

        // Sanitize the submitted data
        $name = sanitize_text_field($_POST['applicant_name']);
        $email = sanitize_email($_POST['applicant_email']);
        $message = sanitize_textarea_field($_POST['applicant_message']);
        $training_id = get_the_ID(); // Get the current training post ID

        // Prepare email details
        $to = get_option('admin_email'); // Get the admin email
        $subject = "New Training Application from " . $name;
        $body = "You have received a new application for the training: " . get_the_title($training_id) . "\n\n";
        $body .= "Name: " . $name . "\n";
        $body .= "Email: " . $email . "\n\n";
        $body .= "Message:\n" . $message;

        // Set the headers for the email
        $headers = array('Content-Type: text/html; charset=UTF-8');

        // Send the email to the admin
        if (wp_mail($to, $subject, nl2br($body), $headers)) {
            // Success message
            echo '<div class="alert alert-success">Thank you! Your application has been sent successfully.</div>';
        } else {
            // Error message
            echo '<div class="alert alert-danger">There was an issue sending your application. Please try again later.</div>';
        }
    }
}

