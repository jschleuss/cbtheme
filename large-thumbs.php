<?php
/*
Template Name: Thumbnails
*/

get_header(); ?>

<? get_template_part( 'include-legal' ); ?>
<? get_template_part( 'include-view' ); ?>


<div id="masonry_container">
<?php query_posts(array('category_name' => 'artist', 'orderby' => 'post name', 'order' => 'ASC' )); ?>
<?php while (have_posts()) : the_post(); ?>
  <?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'larger-thumb', false, '' );
  	if ( $src[0] == null ) {}
  	else { 
  	$scaledHeight = round($src[2]/($src[1]/260));
  ?>
      <div class="masonry_item" style="min-height: <?php echo $scaledHeight; ?>px">
	      	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
	      	  <img  class="lazy" src="<?php bloginfo('stylesheet_directory'); ?>/images/white_holder.jpg" data-original="<?php echo $src[0]; ?>" width="260" height="<?php echo $scaledHeight; ?>" alt="<?php the_title(); ?>" /><noscript><img src="<?php echo $src[0]; ?>" width="260" heigh="<?php echo $scaledHeight; ?>" /></noscript>
	      	</a>
	      	<p class="comment_count"><a href="<?php the_permalink(); ?>"><?php comments_number( 'No comments', '1 comment', '% comments' ); ?></a></p>
	      	<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> by <?php the_category(' '); ?></p>
	      	
      </div>
  	<?php } ?>
<?php endwhile; ?>




<div class="clr"></div>

</div>


<?php get_footer(); ?>