<?php
/**
 * Template Name Posts: Cabins
 *
 */

get_header(); ?>

    <div id="primary" class="content-area cabin-content">
        <main id="main" class="site-main" role="main">
            <!-- cabin background  -->
            <?php

            $bgImage = get_field('cabin_background'); ?>

            <div id="cabinBG">
                 <img id="cabin-bg" src="<?php echo $bgImage['url']; ?>" alt="<?php echo $bgImage['alt']; ?>" />
            </div>

            <div id="cabin-details-slider">
                <section class="content-wrapper">
                <!-- cabin slider and thumbnail images -->
                <?php

                $images = get_field('cabin_images');

                if( $images ):
                ?>
                <div  id="cabin_images" class=”flex-container”>
                    <div id="cabin-carousel" class="flexslider">
                       <ul class="slides">
                        <?php foreach( $images as $image ): ?>
                           <li data-thumb="<?php echo $image['sizes']['cabin_thumb']; ?>"><img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['caption']; ?>" /></li>
                        <?php endforeach; ?>
                        </ul>
                    </div>

                <?php endif; ?>
                </div>

                <!-- cabin details  -->
                <div id="cabin-details">
                        <h2 class="cabin_title"><?php echo get_the_title(); ?></h2>
                        <p><?php the_field('cabin_description'); ?></p>
                        <h3>Art making features:</h3>

                        <?php

                        // check for art making features
                        if( have_rows('art_making_features') ):
                            echo "<ul>";
                            // loop through the rows of data
                            while ( have_rows('art_making_features') ) : the_row();

                                // display a sub field value
                              echo "<li>";
                              the_sub_field('art_features');
                              echo "</li>";

                            endwhile;

                            echo "</ul>";

                        else :

                            // no rows found

                        endif;

                        ?>

                        <h3>Standard cabin features include:</h3>
                        <?php

                        // check for standard cabin features
                        if( have_rows('standard_cabin_features') ):
                            echo "<ul>";
                            // loop through the rows of data
                            while ( have_rows('standard_cabin_features') ) : the_row();

                                // display a sub field value
                                echo "<li>";
                                the_sub_field('cabin_feature');
                                echo "</li>";

                            endwhile;

                            echo "</ul>";

                        else :
                            // no rows found
                        endif;
                        ?>
                        <h4>Once accepted <span class="green_type">(application process):</span></h4>
                        <ul>
                            <li><span class="meal_cost">$<?php the_field('nightly_rate_w/o_meal_plan') ?></span>&nbsp;per night without <span class="green_type">meal plan</span></li>
                            <li><span class="meal_cost">$<?php the_field('nightly_rate_with_meal_plan') ?></span>&nbsp;per night with meal plan</li>
                        </ul>

                        <form action="#">
                            <input type="button" value="Check Availability" />
                        </form>

                </div>
            </section>
        </div>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php // get_sidebar(); ?>
<?php get_footer(); ?>