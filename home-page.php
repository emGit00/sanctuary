<?php
/**
 * Template Name: Home page
 */

get_header(); ?>

<div id="primary">
    <main id="main" class="site-main" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

            <?php //get_template_part( 'content', 'page' ); ?>

        <?php endwhile; // end of the loop. ?>

          <?php
         //function displays all images using its ID to grab the source url and alt information
         function get_image_altTag($acf_image = 'photo_image') {

                $attachment_id = get_field($acf_image);
                $size = "full"; // (thumbnail, medium, large, full or custom size)

                $image = wp_get_attachment_image_src( $attachment_id, $size );
                // url = $image[0];
                // width = $image[1];
                // height = $image[2];

                $attachment = get_post( get_field($acf_image) );
                $alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);

                echo "<img class='hp-image' src='" . $image[0] . "' alt='" .  $alt . "' />";
        }

        for( $i = 1; $i <= 5; $i++ ){
            $scrolling_photo = 'scrolling_photo'.$i;
            $photo_caption = 'photo_caption' . $i;
            $photo_subcaption = 'photo_subcaption' . $i;

            echo "<div class='scroll-section parallax' data-velocity='.8' id='" . $scrolling_photo . "' />";
            get_image_altTag($scrolling_photo);

            echo "<section id ='captions" . $i . "' class='content-wrapper'>";

            echo "<h3 class='photo-caption'>" . get_field($photo_caption) . "</h3>";
            echo "<h3 class='photo-subcaption'>" . get_field($photo_subcaption) . "</h3></section></div>";
         }

        ?>

    </main><!-- #main -->

</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
