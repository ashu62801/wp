function my_testimonial() {
    $args = array(
        'post_type' => 'testimonial',
        'posts_per_page' => 1, 
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {

		$output = '<div class="row>';

        while ($query->have_posts()) {
            $query->the_post();
            $title = get_field('test_title');
            $description = get_field('description');
            $position = get_field('test_position');
			$profile = get_field('test_profile');	
			$full_img = get_field('full_img');
			$ipad_image = get_field('ipad_image');
			$mobile_image = get_field('mobile_image');

			$deskspace = 1500;


            $output .= '<div class="col-md-4">
			<div class="testimonial-box">
				 <div class="testimonial">
					 <i class="fas fa-quote-right"></i>
					 <span class="testimonial-text">' . esc_html($description) . '</span>
					 <div class="testimonial-user">
						 <img src=" ' . esc_html($profile) . ' " alt="user-img" class="user-img">
						 <div class="user-info">
							 <span class="user-name">' . esc_html($title) . '</span>
							 <div class="user-job-details">
								 <span class="user-job">' . esc_html($position) . '</span>
							 </div>
						 </div>
					 </div>
				 </div>
				 <img src=" ' . esc_html($full_img) . ' " alt="Full Image" height="350px" width="400px" class="user-img">
			 </div>
		 </div>';
        }
		$output .= '</div>';
        wp_reset_postdata(); 
    }
	
	else {
        $output = '<p>No testimonials found.</p>';
    }

    return $output;
}

add_shortcode('testimonial', 'my_testimonial');




function create_post_type(){
	register_post_type('testimonial',
	array(
		'labels'=> array(
			'name' => __('Testimonial'),
			'singular_name' => __('Testimonial'),
		),
		'public' => true,
		'supports' => array('title', 'thumbnail')
	)
);
};

add_action('init', 'create_post_type');



<!-- Service shortcode -->
// services function
// 
function create_post_type(){
	register_post_type('services',
	array(
		'labels'=> array(
			'name' => __('Services'),
			'singular_name' => __('services'),
		),
		'public' => true,
		'supports' => array('title')
	)
);
};

add_action('init', 'create_post_type');

function codobux_services() {
    $args = array(
        'post_type' => 'services',
        'posts_per_page' => 20, 
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {

		$output = '<div class="service-box" style="height:600px">';

        while ($query->have_posts()) {
            $query->the_post();
			$title = get_field('title');
			$description = get_field('description');
			$icon = get_field('icon');
			$read_more = get_field('read_more');

            $output .= ' <div class="wrap">
                  <div class="ico-wrap">
                        <img class="mbr-iconfont" src="' . esc_html($icon) . '" alt="Service icon" />
                    </div>
                    <div class="text-wrap vcenter">
                        <h2 class="mbr-bold mbr-section-title3 ">' . esc_html($title) .'</h2>
 	              <p>' . esc_html($description) . ' <a href="' . esc_html($read_more) . '">...Read More</a></p>
                  </div>
            </div>';
        }
		$output .= '</div>';
        wp_reset_postdata(); 
    }
	
	else {
        $output = '<p>No Service Found.</p>';
    }

    return $output;
}

add_shortcode('services', 'codobux_services');