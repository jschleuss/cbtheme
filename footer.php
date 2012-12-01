</div><!--#main-->

<div id="footer">
<? get_template_part( 'include-legal' ); ?>
	
<p>There are <?php $numpost = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post'"); echo $numpost; ?> listed works here.<br />
This site was last updated on <?php if (have_posts()) : ?><?php query_posts('showposts=1'); ?><?php while (have_posts()) : the_post(); ?><?php the_modified_time('F j, Y'); ?> at <?php the_modified_time('g:i a'); ?><?php endwhile; ?><?php endif; ?>.</p>

<p><!--Crystal Bridges is a trademark Crystal Bridges Museum of American Art, Inc.<br />-->
This site was created by <a href="http://www.jschleuss.com/">Jon Schleuss</a>, an online journalist living in the northwest corner of Arkansas.<br />
Photography by Jon Schleuss.</p>

</div><!--#footer-->

</div><!--#page_wrap-->

<? /*
<?php if ( is_single() ) {
	echo '<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>';
}?> */ ?>

<?php wp_footer(); ?>

</body>
</html>