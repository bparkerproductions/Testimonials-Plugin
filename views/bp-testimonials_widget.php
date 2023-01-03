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
    ?>
      <div class="testimonial col card">
        <div class="head blue">
          <h5 class="category"><?= get_field('name', $testimonial) ?></h5>
        </div>
        <div class="content body">
          <div class="inner-content">
            <div class="left-quote-container">
              <i class="fas fa-quote-left"></i>
            </div>
            <div class="inner-content">
              <p class="<?= get_field('classes', $testimonial) ?>">
                <?= get_field('text', $testimonial) ?>
              </p>
            </div>
          </div>
            <div class="client-info ">
              <a 
                class="client-company <?= get_field('company', $testimonial) == "" ? 'disabled' : ''?>"
                href="<?= get_field('company', $testimonial) ?>"
              >
                <i class="fas fa-briefcase"></i>
                <span class="link">
                  Website
                </span>
              </a>

              <!-- Project Link -->
              <?php if (get_field('project', $testimonial) && !(get_post_type() == "projects")): ?>
                <a 
                  class="project-link" 
                  href="<?= get_permalink(get_field('project', $testimonial)[0]) ?>"
                >
                  <i class="fas fa-laptop-code"></i>
                  <span class="link">See Project</span>
                </a>
              <?php endif; ?>
            </div>

        </div>
      </div>

      <?php 
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