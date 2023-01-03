<?php $testimonials = new WP_Query(
    array(
      'post_type' => 'testimonials',
      'posts_per_page' => $number,
      'post_status' => 'publish'
    )
  );
?>

<section class="testimonials column-center">
  <div class="testimonials-container">

    <!-- Testimonials -->
    <div class="slider-container layout-two-columns">
    <?php 
    if ( $testimonials->have_posts() ):
      while ($testimonials->have_posts() ):
        $testimonials->the_post();
        require('bp-single-testimonial.php');
      endwhile;
      wp_reset_postdata();
      endif;
      ?>
    </div>

    <p class="testimonials-toggle">
      <i class="fas fa-caret-down"></i> <span class="toggle-text">See All Testimonials</span>
    </p>
  </div>
</section>