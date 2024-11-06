<?php
/* Template Name: Front Page */
get_header(); 
?>

<main>
    <!-- ***** Main Banner Area Start ***** -->
    <section class="section main-banner" id="section1">
        <video autoplay muted loop id="bg-video">
            <source src="<?php echo get_template_directory_uri(); ?>/assets/images/course-video.mp4" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="caption">
                <h6>Transforming Communication for Success</h6>
                <h2><em>Schedule</em> a Consultation</h2>
                <div class="main-button">
                    <div class="scroll-to-section"><a href="#section2">More</a></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Main Banner Area End ***** -->

    <section class="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12">
                    <div class="features-post">
                        <div class="features-content">
                            <div class="content-show">
                                <h4><i class="fa fa-pencil"></i>Corporate Training Programs</h4>
                            </div>
                            <div class="content-hide">
                                <p>Team Communication Workshops.</p>
                                <p>Collaboration and Leadership Development.</p>
                                <!-- <div class="scroll-to-section"><a href="#section2">Më shumë</a></div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="features-post second-features">
                        <div class="features-content">
                            <div class="content-show">
                                <h4><i class="fa fa-graduation-cap"></i>Speech Therapy Services</h4>
                            </div>
                            <div class="content-hide">
                                <p>One-on-one sessions for children.</p>
                                <p>Group sessions and tailored speech interventions.</p>
                                <!-- <div class="scroll-to-section"><a href="#section3">Shiko</a></div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="features-post third-features">
                        <div class="features-content">
                            <div class="content-show">
                                <h4><i class="fa fa-book"></i>Consulting for Companies</h4>
                            </div>
                            <div class="content-hide">
                                <p>Effective communication strategies.</p>
                                <p>o	Custom workshops on public speaking and conflict resolution.</p>
                                <!-- <div class="scroll-to-section"><a href="#section4">Kontakt</a></div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="features-post third-features">
                        <div class="features-content">
                            <div class="content-show">
                                <h4><i class="fa fa-book"></i>Workshops for Individuals</h4>
                            </div>
                            <div class="content-hide">
                                <p>Effective communication strategies.</p>
                                <!-- <div class="scroll-to-section"><a href="#section4">Kontakt</a></div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section why-us" id="section2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Mission Statement</h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div id='tabs'>
                        <ul>
                            <li><a href='#tabs-1'>Mission</a></li>
                            <li><a href='#tabs-2'>Values</a></li>
                            <li><a href='#tabs-3'>Kualiteti</a></li>
                        </ul>
                        <section class='tabs-content'>
                            <article id='tabs-1'>
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/choose-us-image-01.png" alt="">
                                    </div>
                                    <div class="col-md-6">
                                        <h4>Mission Statement</h4>
                                        <p>To empower individuals and communities through tailored communication strategies and speech therapy interventions, fostering inclusive environments where every voice is heard, valued, and nurtured. Committed to promoting personal and social growth, I strive to bridge gaps in understanding, enhance team collaboration, and inspire meaningful change through compassionate practice, innovative education, and a dedication to lifelong learning.</p>
                                    </div>
                                </div>
                            </article>
                            <article id='tabs-2'>
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/choose-us-image-02.png" alt="">
                                    </div>
                                    <div class="col-md-6">
                                        <h4>Values</h4>
                                        <p>Empathy and Compassion: Effective communication starts with understanding and genuinely listening to others to foster trust and openness.</p>
                                        <p>Inclusivity: Embracing diversity, creating safe spaces for everyone to express themselves freely, and receive personalized support.</p>
                                        <p>Excellence and Professionalism: Upholding the highest standards with evidence-based methods and extensive experience.</p>
                                        <p>Integrity and Ethics: Prioritizing honesty, transparency, confidentiality, and ethical practices.</p>                                  
                                    </div>
                                </div>
                            </article>
                            <article id='tabs-3'>
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/choose-us-image-03.png" alt="">
                                    </div>
                                    <div class="col-md-6">
                                        <h4>Approach</h4>
                                        <p>Collaboration and Teamwork: Promoting cooperative environments for open idea-sharing and stronger team interactions.</p>
                                        <p>Continuous Growth and Learning: Staying informed about the latest research and techniques in communication and therapy for effective and current practices.</p>
                                        <p>Empowerment: Helping individuals find and use their voices confidently, from children in speech development to teams needing better collaboration.</p>
                                    </div>
                                </div>
                            </article>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section courses" id="section3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Schedule a Consultation</h2>
                    </div>
                </div>
                <div class="owl-carousel owl-theme">
                    <?php
                    // Set up the query to fetch the latest 10 'training' posts
                    $args = array(
                        'post_type' => 'training',
                        'posts_per_page' => 10, // Set to display the 10 latest training posts
                        'orderby' => 'date', // Order by date (latest first)
                        'order' => 'DESC'    // Descending order
                    );
                    $trainings = new WP_Query($args);

                    // Loop through each training post
                    if ($trainings->have_posts()) :
                        while ($trainings->have_posts()) : $trainings->the_post(); 
                            // Get custom meta fields (like organization name and logo)
                            $organization_name = get_post_meta(get_the_ID(), 'organization_name', true);
                            $organization_logo = get_post_meta(get_the_ID(), 'organization_logo', true);
                    ?>
                    <div class="item">
                        <!-- Display Featured Image -->
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="card-image-container">
                                <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>" class="img-fluid card-image"></a>
                            </div>
                        <?php else : ?>
                            <div class="card-image-container">
                                <a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/default-course.webp" alt="Default Image" class="img-fluid card-image"></a>
                            </div>
                        <?php endif; ?>

                        <!-- Course Content -->
                        <div class="down-content p-3">
                            <!-- Course Title -->
                            <h4><a href="<?php the_permalink(); ?>" style="color:#f5a425;"><?php the_title(); ?></a></h4>

                            <!-- Course Excerpt or Description -->
                            <p><?php echo wp_trim_words(get_the_excerpt(), 40); ?></p>

                            <!-- Organization Logo and Name -->
                            <?php if ($organization_logo || $organization_name): ?>
                                <div class="author-image d-flex align-items-center">
                                    <?php if ($organization_logo): ?>
                                        <img src="<?php echo esc_url($organization_logo); ?>" alt="<?php echo esc_attr($organization_name); ?>" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                    <?php endif; ?>
                                    <p class="mb-0 ms-2"><?php echo esc_html($organization_name); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php else: ?>
                        <p>No courses available at the moment.</p>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); // Reset the query ?>
                </div>
            </div>
        </div>
    </section>

    <section class="section contact" id="section4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Na shkruani</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Your Contact Form -->
                    <form id="contact" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                        <input type="hidden" name="action" value="handle_contact_form">
                        <?php wp_nonce_field('contact_form_action', 'contact_form_nonce'); ?>

                        <div class="row">
                            <div class="col-md-6">
                                <fieldset>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Emri" required>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <input name="email" type="email" class="form-control" id="email" placeholder="Email" required>
                                </fieldset>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <textarea name="message" rows="6" class="form-control" id="message" placeholder="Mesazhi juaj..." required></textarea>
                                </fieldset>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <button type="submit" class="button" name="submit_contact_form">Dërgo mesazhin</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>

                    <!-- Display Feedback Message Below Form -->
                    <?php if (isset($_GET['status'])): ?>
                        <div class="mt-3 alert text-center <?php echo $_GET['status'] === 'success' ? 'alert-success' : 'alert-danger'; ?>">
                            <?php
                                if ($_GET['status'] === 'success') {
                                    echo "Mesazhi juaj u dërgua me sukses!";
                                } elseif ($_GET['status'] === 'failed') {
                                    echo "Mesazhi nuk u dërgua, ju lutemi provoni përsëri më vonë!";
                                } elseif ($_GET['status'] === 'missing_fields') {
                                    echo "Ju lutemi plotësoni të gjitha fushat e detyrueshme.";
                                } elseif ($_GET['status'] === 'nonce_failed') {
                                    echo "Verifikimi i formularit dështoi. Ju lutemi provoni përsëri.";
                                }
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-6">
                    <div id="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d64848.35699490693!2d19.817823200000003!3d41.3331847!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1350310470fac5db%3A0x40092af10653720!2sTirana!5e1!3m2!1sen!2s!4v1730118032448!5m2!1sen!2s" width="100%" height="422px" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
