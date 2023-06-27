
<?php get_header(); ?>
    <section id="banner">
        <div class="container py-5">
            <div class="d-flex flex-column flex-lg-row flex-lg-row-reverse justify-content-between align-items-center">
                <img src="<?php echo get_theme_mod('banner_image'); ?>" class="rounded-lg w-100"/>
                <div class="w-100">
                    <h1 class="fs-1 fw-bold">
                        <?php echo nl2br(get_theme_mod('banner_title')); ?>
                        <br />
                        Next Career Move <br />
                        <span class="fw-bold text-primary">with JobMingle</span>
                    </h1>
                    <p class="py-3 text-success">
                        <?php echo nl2br(get_theme_mod('banner_description')); ?>
                    </p>
                    <button class="btn btn-primary capitalize fw-bold"><?php echo get_theme_mod('banner_button_text'); ?></button>
                </div>
            </div>
        </div>
    </section>

    <section id="category">
        <div class="text-center py-5">
            <h5 class=""><?php echo nl2br(get_theme_mod('job_category_title')); ?></h5>
            <p class="text-secondary"><?php echo nl2br(get_theme_mod('job_category_description')); ?></p>
        </div>
        <div class="container">
            <div class="row">
                <?php
                $categories = get_categories(array('hide_empty' => false)); // Retrieve all categories, including empty ones
                foreach ($categories as $category) {
                    if ($category->slug === 'uncategorized') {
                        continue; // Skip the "Uncategorized" category
                    }

                    $category_image = get_field('category_image', 'category_' . $category->term_id);

                    if ($category_image) {
                        $category_image_url = $category_image['url']; // Get the URL of the image
                        $category_image_alt = $category_image['alt']; // Get the alt text of the image
                    } else {
                        // Set default image URL and alt text if no image is found
                        $category_image_url = 'path-to-default-image.jpg';
                        $category_image_alt = 'Default Image';
                    }

                    $category_name = $category->name;
                    $category_jobs_available = $category->count;
                ?>
                    <div class="col-md-3 mt-2">
                        <div class="border p-3 rounded">
                            <img src="<?php echo $category_image_url; ?>" alt="<?php echo $category_image_alt; ?>" />
                            <p><?php echo $category_name; ?></p>
                            <p class="text-secondary fw-bold"><?php echo $category_jobs_available; ?> Jobs Available</p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <section id="job-post">
        <div class="text-center py-5">
            <h5 class=""><?php echo nl2br(get_theme_mod('latest_job_title')); ?></h5>
            <p class="text-secondary"><?php echo nl2br(get_theme_mod('latest_job_description')); ?></p>
        </div>
        <div class="container">
            <div class="row">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 10, // Set the number of posts to display initially
                );

                $query = new WP_Query($args);

                $count = 1;

                if ($query->have_posts()) :
                    while ($query->have_posts()) :
                        $query->the_post();

                        $id = get_the_ID();
                        $job_title = get_the_title();
                        $company_name = get_field('company_name');
                        $company_logo = get_field('company_logo');
                        $remote_or_onsite = get_field('remote_or_onsite');
                        $fulltime_or_parttime = get_field('fulltime_or_parttime');
                        $location = get_field('location');
                        $salary = get_field('salary');
                ?>
                        <div class="col-md-6 job-post-item" style="height: 370px;">
                            <div class="border bg-white p-4 rounded-md">
                                <?php if ($company_logo) : ?>
                                    <img style="height: 56px;" src="<?php echo $company_logo['url']; ?>" alt="<?php echo $company_logo['alt']; ?>" />
                                <?php endif; ?>
                                <p><?php echo $job_title; ?></p>
                                <p class="text-info text-xs py-2">
                                    <?php echo $company_name; ?>
                                </p>
                                <span class="text-info text-xs border px-2 py-2 bg-white"><?php echo $remote_or_onsite; ?></span>
                                <span class="text-info text-xs border px-2 py-2 bg-white ml-2"><?php echo $fulltime_or_parttime; ?></span>
                                <div class="d-flex flex-col md:flex-row gap-5 pt-2">
                                    <div class="d-flex gap-2">
                                        <i class="fa-solid fa-location-dot pt-2"></i>
                                        <p class="pt-1 text-gray-400 text-xs"><?php echo $location; ?></p>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <i class="fas fa-dollar-sign text-gray-300 pt-2"></i>
                                        <p class="text-gray-400 text-xs pt-1">Salary: <?php echo $salary; ?></p>
                                    </div>
                                </div>
                                 <!-- Modify the button to link to the post permalink -->
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary mx-auto mt-2">View Details</a>
                            </div>
                        </div>
                <?php
                    endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>

        </div>
    </section>

    <?php get_footer(); ?>

</body>

</html>