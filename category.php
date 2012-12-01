<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>

<p>Select a header to re-sort the list. Click twice to reverse the sort. Hold shift to sort multiple columns.</p>

				<h1><?php $category = get_the_category(); 
					echo $category[0]->cat_name; 
				?></h1>
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '' . $category_description . '';
				?>
				

				<div id="artist_info">
					<?php // cache of 1 day
				 		//$data = json_decode( file_get_contents("http://test.crystalbridgescollection.com/wp-content/themes/crystal-bridges/artist-info.json") ); // needs to use php to get url // needs to dynamic
						//$artist_bio = $data;->{'1370087'}->{'extract'};
						//->{'1370087'}; 
						//echo $artist_bio;
						
						//->{'current_observation'}->{'icon_url'}
					?>
					
				
				</div>
				
				<?php
				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				get_template_part( 'loop', 'category' );
				?>

<?php get_footer(); ?>