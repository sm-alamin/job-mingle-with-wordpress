<?php get_header(); ?>

<?php
// Get post details
$id = get_the_ID();
$job_description = get_field('job_description');
$job_responsibility = get_field('job_responsibility');
$educational_requirements = get_field('educational_requirements');
$experiences = get_field('experiences');
$salary = get_field('salary');
$phone = get_field('phone');
$email = get_field('email');
$location = get_field('location');

// Handle job application form submission
if (isset($_POST['apply_job'])) {
    // Get the current user ID
    $user_id = get_current_user_id();

    // Retrieve the existing applied job IDs for the user
    $applied_jobs = get_user_meta($user_id, 'applied_job', true);

    // If no applied jobs exist or it's not an array, initialize an empty array
    if (empty($applied_jobs) || !is_array($applied_jobs)) {
        $applied_jobs = array();
    }

    // Check if the current job ID already exists in the applied jobs array
    if (in_array($id, $applied_jobs)) {
        // The user has already applied for this job
        $error_message = 'You have already applied for this job.';
    } else {
        // Add the current job ID to the applied jobs array
        $applied_jobs[] = $id;

        // Save the updated applied jobs array in the user's meta
        update_user_meta($user_id, 'applied_job', $applied_jobs);

        // Display a success message
        $success_message = 'Thank you for applying!';
    }

    // Reset the form data
    $_POST = array();
}
?>

<div class="container py-5">
    <div class="d-flex flex-column gap-3 flex-md-row">
        <div>
            <p class="text-black">Job Description: <span class="text-info"><?php echo esc_html($job_description); ?></span></p>
            <p class="text-black">Job Responsibility: <span class="text-info text-xs"><?php echo esc_html($job_responsibility); ?></span></p>
            <p class="text-black">Educational Requirement: <span class="text-info text-xs"><?php echo esc_html($educational_requirements); ?></span></p>
            <p class="text-black">Experiences: <span class="text-info text-xs"><?php echo esc_html($experiences); ?></span></p>
        </div>
        <div class="card bg-white shadow" style="width: 100%;">
            <div class="card-body p-3">
                <?php if (isset($success_message)) : ?>
                    <div class="alert alert-success"><?php echo esc_html($success_message); ?></div>
                <?php endif; ?>
                <div>
                    <h6 class="card-title">Job Details</h6>
                    <hr />
                    <div class="">
                        <div class="d-flex gap-2">
                            <i class="fas fa-dollar-sign mt-2"></i>
                            <p class="text-info text-xs pt-1">
                                Salary: <?php echo esc_html($salary); ?>
                            </p>
                        </div>
                        <div class="d-flex gap-2">
                            <i class="fas fa-calendar-alt mt-2"></i>
                            <p class="text-info text-xs pt-1">
                                Job Title: <?php the_title(); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div>
                    <h6 class="card-title">Contact Information</h6>
                    <hr />
                    <div class="">
                        <div class="d-flex gap-2">
                            <i class="fas fa-phone-alt mt-2"></i>
                            <p class="text-info text-xs pt-1">
                                Phone: <?php echo esc_html($phone); ?>
                            </p>
                        </div>
                        <div class="d-flex gap-2">
                            <i class="fas fa-envelope mt-2"></i>
                            <p class="text-info text-xs pt-1">
                                Email: <?php echo esc_html($email); ?>
                            </p>
                        </div>
                        <div class="d-flex gap-2">
                            <i class="fas fa-map-marker-alt mt-2"></i>
                            <p class="text-info text-xs pt-1">
                                Address: <?php echo esc_html($location); ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card-actions justify-end">
                    <?php if (isset($error_message)) : ?>
                        <div class="alert alert-danger"><?php echo esc_html($error_message); ?></div>
                    <?php elseif (!isset($success_message)) : ?>
                        <form method="POST">
                            <input type="hidden" name="apply_job" value="1">
                            <button type="submit" class="btn btn-primary w-full capitalize fw-bold mx-auto">Apply Now</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>