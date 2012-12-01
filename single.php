<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

					<?php /* previous_post_link( '%link', '' . _x( '&larr;', 'Previous post link', 'twentyten' ) . ' %title' ); ?>
					<?php next_post_link( '%link', '%title ' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '' ); */ ?>

					<h1>
						<?php $category = get_the_category(); 
							echo '<span class=categories>';
							echo '<a href=';
							echo site_URL();
							echo '/';
							echo $category[0]->category_nicename;
							echo '>';
							echo $category[0]->cat_name; 
							echo '</a>';
							echo '&nbsp;|&nbsp;';
						//	$category_parent_id = $category[0]->category_parent;
						//	$category_parent = get_the_category( '$category_parent_id' );
						//	echo $category_parent[0]->cat_name;
						//	echo '&nbsp;|&nbsp;';
							echo '</span><span class=art_piece_title>';
							the_title(); 
							echo '</span>';
						?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '(', ')' ); ?>
					</h1>

					<div id="post_content">
						<?php the_content(); ?>
						<div class="piece_meta">
							<?php $postmeta = get_post_custom($post->ID); ?>
							<p>Artist: <?php the_category(' '); ?><br />
							<?php if ($postmeta["year"][0] == null) {} else { echo 'Year:&nbsp;'; echo $postmeta["year"][0]; echo '<br />'; } ?>
							<?php if ($postmeta["medium"][0] == null) {} else { echo 'Medium:&nbsp;'; echo $postmeta["medium"][0]; echo '<br />'; } ?>
							<?php if ($postmeta["height"][0] == null) {} else { echo 'Size: '; echo $postmeta["height"][0]; echo '&nbsp;x&nbsp;'; echo $postmeta["width"][0]; if ($postmeta["depth"][0] == null) { echo '&nbsp;inches'; } else { echo '&nbsp;x&nbsp;'; echo $postmeta["depth"][0]; echo '&nbsp;inches'; } echo '<br />'; } ?>
							<?php if ($postmeta["price"][0] == null) {} else { echo 'Price:&nbsp;'; echo $postmeta["price"][0]; echo '<br />'; } ?>
							<?php if ($postmeta["estimate"][0] == null) {} else { echo 'Estimate:&nbsp;'; echo $postmeta["estimate"][0]; } ?></p>
						</div><!-- .piece_meta -->
						

						<div id="social">
							<div id="facebook_like" class="share_button"><div class="fb-like" data-send="false" data-layout="button_count" data-width="310" data-show-faces="false"></div></div>
							
							<div id="twitter_share" class="share_button"><a href="https://twitter.com/share" class="twitter-share-button" data-url="http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>">Tweet</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></div>					

						
							<div id="google_plus" class="share_button">
								<!-- Place this tag where you want the +1 button to render -->
								<g:plusone size="medium"></g:plusone>
								
								<!-- Place this render call where appropriate -->
								<script type="text/javascript">
								  (function() {
								    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
								    po.src = 'https://apis.google.com/js/plusone.js';
								    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
								  })();
								</script>
							</div>
							<!--<a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/pinit.png" alt="Pin It" onclick="doPinIt();"/></a>-->
						</div><!--#social-->
					</div><!--#post_content-->
					<div id="post_comments">
						<?php comments_template( '', true ); ?>
					</div><!--#post_comments-->


						<?php $categoryID = $category[0]->cat_ID ?>
						
						<?php
							$categories = get_categories(array('include' => $categoryID));
							$catcount =$categories[0]->category_count;
							if ( $catcount > 1 ){ ?>
								<div id="more_by_artist">
								<h2>More by <?php echo $category[0]->cat_name; ?>:</h2>
								
								<?php 
									// Get current post ID
									$my_ID = $post->ID; 
								?>
								<?php // wp_list_categories(array('show_count' => 1, 'include' => $categoryID, 'title_li' => __( '' ), 'depth' => 1, 'style' => 'none')); ?>
								
		
		
								<?php 
									// Query posts in same category as current post, order alphabetically by title and exclude current post
									query_posts(array('cat' => $categoryID, 'orderby' => 'title', 'order' => 'ASC', 'post__not_in' => array($my_ID) )); ?>
									<?php while (have_posts()) : the_post(); ?>
									  <div class="more_thumbnail">
										  <?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail', false, '' );
										  	if ( $src[0] == null ) {}
										  	else { 
										  ?>
									 	      <div class="item">
										  	    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $src[0]; ?>" alt="<?php the_title(); ?>" /></a>
										      </div>
										  	<?php } ?>							  
									  </div>
								    <?php endwhile; ?>
								<?php wp_reset_query(); ?>						
								</div><!--#more_by_artist-->							
							<?php } ?>						
						

						<div class="clr"></div>
						

						
						<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>
<? /*
<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyten_author_bio_avatar_size', 60 ) ); ?>
							<h2><?php printf( esc_attr__( 'About %s', 'twentyten' ), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>
							<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
								<?php printf( __( 'View all posts by %s &rarr;', 'twentyten' ), get_the_author() ); ?>
							</a>
<?php endif; ?>

						<?php twentyten_posted_in(); ?>
*/ ?>						

				<?php /* previous_post_link( '%link', '' . _x( '&larr;', 'Previous post link', 'twentyten' ) . ' %title' ); ?>
				<?php next_post_link( '%link', '%title ' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '' ); */ ?>

				<?php /* comments_template( '', true ); */ ?>


<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>