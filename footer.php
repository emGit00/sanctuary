<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package sanctuary
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer nav-background" role="contentinfo">
        <div class="content-wrapper">
            <ul id="social-media">
                <li><a href="#"><img src="<?php bloginfo('url'); ?>/wp-content/uploads/2014/03/tumblr_44x44.png" alt="Tumblr" /></a></li>
                <li><a href="#"><img src="<?php bloginfo('url'); ?>/wp-content/uploads/2014/03/twitter_44x36.png" alt="Twitter" /></a></li>
                <li><a href="#"><img src="<?php bloginfo('url'); ?>/wp-content/uploads/2014/03/pinterest_44x44.png" alt="Pinterest" /></a></li>
                <li><a href="#"><img src="<?php bloginfo('url'); ?>/wp-content/uploads/2014/03/facebook_44x44.png" alt="Facebook" /></a></li>
            </ul>
        </div>
		<div class="site-info content-wrapper">
            <p>&copy; copyright Sanctuary Eco-Retreat <?php echo date('Y');?></p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>