<?php
/**
 * Template Name: Home
 */

get_header(); ?>

<div id="primary">
    <main id="main" class="site-main" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

            <?php //get_template_part( 'content', 'page' ); ?>

        <?php endwhile; // end of the loop. ?>

        <?php

        //function displays all images using its ID to grab the source url and alt information
        function get_image_altTag($acf_image) {

            $attachment_id = get_sub_field($acf_image);

            $size = "full"; // (thumbnail, medium, large, full or custom size)

            $image = wp_get_attachment_image_src( $attachment_id, $size );
            // url = $image[0];
            // width = $image[1];
            // height = $image[2];

            $attachment = get_post( get_sub_field($acf_image) );
            $alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);

            echo "<img class='hp-image' src='" . $image[0] . "' alt='" .  $alt . "' />";
        }

        if( get_field('home_textual_photo_sections') ): ?>
        <?php while( has_sub_field('home_textual_photo_sections') ):

                // gets image's id number
                $image_id = get_sub_field('home_image');

            echo "<div data-type='background' data-speed='10' class='scroll-section pages' id='imgID_" . $image_id . "'>";
            get_image_altTag('home_image'); //runs function and gets image's src and alt info
        ?>
                    <section class='headlines' >
                        <h3 class='headline content-wrapper'><?php the_sub_field('home_headline'); ?></h3>
                        <h3 class='subheadline content-wrapper'><?php the_sub_field('home_subheadline'); ?></h3>
                    </section>
            </div>

        <?php endwhile; ?>
        <?php endif; ?>

    </main><!-- #main -->

</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
