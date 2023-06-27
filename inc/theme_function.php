<?php
function job_mingle_customizer_register($wp_customize){
	// Add a new section for the banner
    $wp_customize->add_section('banner_section', array(
        'title' => 'Banner Section',
        'priority' => 30,
    ));

    // Add the image field
    $wp_customize->add_setting('banner_image');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'banner_image', array(
        'label' => 'Banner Image',
        'section' => 'banner_section',
        'settings' => 'banner_image',
    )));

    // Add the title field
    $wp_customize->add_setting('banner_title');
    $wp_customize->add_control('banner_title', array(
        'label' => 'Banner Title',
        'section' => 'banner_section',
        'type' => 'text',
    ));

    // Add the description field
    $wp_customize->add_setting('banner_description');
    $wp_customize->add_control('banner_description', array(
        'label' => 'Banner Description',
        'section' => 'banner_section',
        'type' => 'textarea',
    ));

    // Add the button text field
    $wp_customize->add_setting('banner_button_text');
    $wp_customize->add_control('banner_button_text', array(
        'label' => 'Button Text',
        'section' => 'banner_section',
        'type' => 'text',
    ));


    //Job Category List
    // Add a new section for the Job Category List
    $wp_customize->add_section('job_category_section', array(
        'title' => 'Job Category Section',
        'priority' => 30,
    ));
    //job category title
    $wp_customize->add_setting('job_category_title');
    $wp_customize->add_control('job_category_title', array(
        'label' => 'Job Category Title',
        'section' => 'job_category_section',
        'type' => 'text',
    ));

    //job category description
    $wp_customize->add_setting('job_category_description');
    $wp_customize->add_control('job_category_description', array(
        'label' => 'Job Category Description',
        'section' => 'job_category_section',
        'type' => 'text',
    ));
    //Latest Job Post
    // Add a new section for the Latest Job Post
    $wp_customize->add_section('latest_job_section', array(
        'title' => 'Latest Job Post Section',
        'priority' => 30,
    ));
    //job category title
    $wp_customize->add_setting('latest_job_title');
    $wp_customize->add_control('latest_job_title', array(
        'label' => 'Latest Post Section Title',
        'section' => 'latest_job_section',
        'type' => 'text',
    ));

    //job category description
    $wp_customize->add_setting('latest_job_description');
    $wp_customize->add_control('latest_job_description', array(
        'label' => 'Latest Job Post Description',
        'section' => 'latest_job_section',
        'type' => 'text',
    ));
//Footer
// Add a new section for the footer
$wp_customize->add_section('job_mingle_footer_section', array(
    'title' => 'Footer',
    'priority' => 200,
  ));

  // Add setting for Job Mingle content
  $wp_customize->add_setting('job_mingle_content', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));

  // Add control for Job Mingle content
  $wp_customize->add_control('job_mingle_content', array(
    'label' => 'Job Mingle Content',
    'section' => 'job_mingle_footer_section',
    'type' => 'textarea',
  ));

  // Add setting for social media links
  $wp_customize->add_setting('job_mingle_social_links', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));

  // Add control for social media links
  $wp_customize->add_control('job_mingle_social_links', array(
    'label' => 'Social Media Links',
    'description' => 'Enter the social media links separated by commas',
    'section' => 'job_mingle_footer_section',
    'type' => 'text',
  ));

    
}
add_action('customize_register', 'job_mingle_customizer_register');