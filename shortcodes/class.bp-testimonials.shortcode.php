<?php 

if ( !class_exists( 'BP_Testimonial_Shortcode' ) ) {
  class BP_Testimonial_Shortcode {
    public function __construct() {
      add_shortcode( 'bp-testimonial', array( $this, 'add_shortcode' ));
    }

    public function add_shortcode( $atts = array(), $content = null, $tag = '' ) {
      $atts = array_change_key_case( (array) $atts, CASE_LOWER );

      extract( shortcode_atts(
        array(
          'id' => '',
        ),
        $atts,
        $tag
      ));

      if ( !empty( $id ) ) {
        $id = array_map('absint', explode( ',', $id ) );
      }

      ob_start();
      require( BP_TESTIMONIALS_PATH . '/views/test.php' );
      return ob_get_clean();
    }
  }
}