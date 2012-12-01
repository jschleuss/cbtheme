<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="description" content="<?php if ( is_single() ) {
									the_title();
									echo '&nbsp;by&nbsp;';
									$category = get_the_category();
									echo $category[0]->cat_name;
									echo '&nbsp;from&nbsp;';
									$postmeta = get_post_custom($post->ID);
									echo $postmeta["year"][0];
									echo '&nbsp;made&nbsp;of&nbsp;';
									echo $postmeta["medium"][0];
									} else { echo 'A list of works owned by Crystal Bridges Museum of American Art with photos of the collection.'; }?>." />
<meta name="keywords" content="museum, crystal bridges, artwork, art, collection, bentonville, arkansas, gallery, galleries, photos, alice walton" />
<!-- Open Graph -->
<meta property="og:title" content="<?php wp_title( '|', true, 'right' ); ?>"/>
<meta property="og:type" content="article"/>
<meta property="og:locale" content="en_US"/>
<meta property="og:url" content="http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>"/>
<!--IF THUMBNAIL--><meta property="og:image" content="<?php 
			    										$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium', false, '' );
			    										if ( $src[0] == null ) { 
			    											echo bloginfo( 'template_directory' );
			    											echo "/images/no_image.png";
			    											} 
		    											else { echo $src[0];
			    											}
			    											?>"/>
<meta property="og:site_name" content="Crystal Bridges Museum Collection"/>
<meta property="og:description" content="<?php if ( is_single() ) {
									the_title();
									echo '&nbsp;by&nbsp;';
									$category = get_the_category();
									echo $category[0]->cat_name;
									echo '&nbsp;from&nbsp;';
									$postmeta = get_post_custom($post->ID);
									echo $postmeta["year"][0];
									echo '&nbsp;made&nbsp;of&nbsp;';
									echo $postmeta["medium"][0];
									} else { echo 'A list of works owned by Crystal Bridges Museum of American Art with photos of the collection.'; }?>."/>
<meta property="fb:admins" content="schleuss"/>
<meta name="viewport" content="width=device-width, user-scalable = no" />

<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 * We filter the output of wp_title() a bit -- see
	 * twentyten_filter_wp_title() in functions.php.
	 */
	wp_title( '|', true, 'right' );
	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />

<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo( 'stylesheet_url' ); ?>?version=2" /><!--mobile first-->
<link rel="stylesheet" type="text/css" media="screen and (min-width:500px)" href="<?php bloginfo( 'template_directory' ); ?>/css/desktop.css?version=2" /><!--desktops-->


<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico?version=2" />

<?php if ( is_single() ) {?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=111735765616444";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<?php } ?>

<!-- JQUERY -->
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.js" type="text/javascript"></script>

<!-- IF FOR LARGE THUMBS -->
<?php if ( is_page_template('large-thumbs.php') ) {?>
<!-- LAZY LOAD -->
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.lazyload.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
  $("img.lazy").lazyload({
      effect : "fadeIn"
	});
});
</script>
<!-- MASONRY -->
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.masonry.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
  $('#masonry_container').masonry({
    // options
    itemSelector : '.masonry_item',
    columnWidth : 280
  });
});
</script>
<?php } ?>
<!-- END IF FOR LARGE THUMBS -->

<!-- DATA TABLES -->
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.dataTables.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
	$('#datatable').dataTable( {
		"bPaginate": false,
		"bLengthChange": false,
		"bFilter": true,
		//"bSort": true,
		//"bInfo": false,
		//"bAutoWidth": false,
		"oLanguage": { "sSearch": "Filter: " },
		"aoColumnDefs": [
      { "iDataSort": 1, "aTargets": [ 2 ] }
    ]
	} );	
} );
</script>




<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>


<div id="page_wrap">
	<div id="header">
		<h1>
			<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" id="site_header"><?php bloginfo( 'name' ); ?></a>
		</h1>
		<p>A sortable database of art at the Bentonville, Arkansas museum</p>
	</div>

	<div id="navigation">
			<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
			<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>

			<div class="site_search">
				  <?php get_search_form(); ?> 
			</div>

		<div class="clr"></div>
	</div><!-- #navigation -->

	

		<div class="clr"></div>


	<div id="main">


