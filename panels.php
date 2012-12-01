<?php
/*
Template Name: xx- Panel View
*/

// if you are not using this in a child of Twenty Eleven, you need to replicate the html structure of your own theme.

get_header(); ?>

<?php if ( have_posts() ) : ?>
		<?php $args = array(
			'post_type'=> 'post',
			'orderby' => 'title',
			'order'    => 'ASC'
			);
			query_posts( $args );
		?>

		<?php while ( have_posts() ) : the_post(); ?>

<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
<a href="<?php the_permalink(); ?>"><img src="<?php 
	$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail', false, '' );
	if ( $src[0] == null ) { 
		echo "http://test.jschleuss.com/wp-content/uploads/2011/11/no_image.png";
		} 
	else { echo $src[0];
		}
		?>" alt="<?php the_title(); ?>" /></a>

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>


<?php get_footer(); ?>


