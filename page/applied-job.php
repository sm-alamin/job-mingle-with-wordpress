<?php
/*
Template Name: Applied Job
*/
get_header();
?>

<div class="container">
  <h6 class="text-center">Your applied Job List</h6>
  <?php
  // Get the current user ID
  $user_id = get_current_user_id();

  // Retrieve the value of the 'applied_job' meta key for the user
  $applied_jobs = get_user_meta($user_id, 'applied_job', true);

  if ($applied_jobs) {
    // The user has applied for jobs
    foreach ($applied_jobs as $applied_job) {
      // Retrieve the post object for the applied job ID
      $post = get_post($applied_job);

      if ($post) {
        // Retrieve the field values of the applied post
        $id = $post->ID;
        $job_title = get_the_title($id);
        $company_name = get_field('company_name', $id);
        $company_logo = get_field('company_logo', $id);
        $remote_or_onsite = get_field('remote_or_onsite', $id);
        $fulltime_or_parttime = get_field('fulltime_or_parttime', $id);
        $location = get_field('location', $id);
        $salary = get_field('salary', $id);

        if ($job_title && $company_name && $remote_or_onsite && $fulltime_or_parttime && $location && $salary) {
          // Display the details of the applied job
          echo '<div class="col col-lg-8 mx-auto job-post-item" style="height: 390px;">
                  <div class="border bg-white p-4 rounded-md">';
          if ($company_logo) {
            echo '<img style="height: 56px;" src="' . $company_logo['url'] . '" alt="Company Logo" />';
          }
          echo '<p>' . $job_title . '</p>
                <p class="text-info text-xs py-2">' . $company_name . '</p>
                <span class="text-info text-xs border px-2 py-2 bg-white">' . $remote_or_onsite . '</span>
                <span class="text-info text-xs border px-2 py-2 bg-white ml-2">' . $fulltime_or_parttime . '</span>
                <div class="d-flex flex-column flex-md-row gap-2 mt-2">
                  <div class="d-flex flex-column flex-md-row gap-2">
                  <div class="d-flex gap-2">
                    <i class="fa-solid fa-location-dot pt-2"></i>
                    <p class="pt-1 text-gray-400 text-xs">' . $location . '</p>
                  </div>
                  <div class="d-flex gap-2">
                    <i class="fas fa-dollar-sign text-gray-300 pt-2"></i>
                    <p class="text-gray-400 text-xs pt-1">Salary: ' . $salary . '</p>
                  </div>
                  </div>

                </div>
                <div>
                  <a href="' . get_permalink($id) . '" class="btn btn-primary mx-auto">View Details</a>
                  </div>
                
              </div>
            </div>';
        } else {
          echo 'Job details not found.';
        }
      } else {
        echo 'Job not found.';
      }
    }
  } else {
    // The user has not applied for any job
    echo 'No job application found.';
  }
  ?>
</div>



<?php get_footer(); ?>
