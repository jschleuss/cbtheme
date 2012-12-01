<?php
/*
Template Name: DataTables
*/

get_header(); ?>

<p>Select a column header to re-sort the list. Click twice to reverse the sort.</p>

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

</div><!--#social-->

<div id="view_buttons">
<!--	<div id="view_text">View</div>-->
	<div id="list_view"><a href="/">List View</a></div>
	<div id="thumb_view"><a href="/?page_id=2132">Thumbnail View</a></div>
</div>
<div class="clr"></div>

  <table id="datatable" class="sortable" width="100%" style="clear:both;">
	  <thead>
	    <tr>
		    <th class="thumbnail"></th>
		    <th class="slug">Slug</th>
		    <th class="title">Title<span class="sort_buttons"></span></th>
		    <th class="artist">Artist<span class="sort_buttons"></span></th>
		    <th class="year">Year<span class="sort_buttons"></span></th>
		    <th class="medium">Media<span class="sort_buttons"></span></th>
		    <!--<th class="height"><a>Height (in)</a></th>
		    <th class="width"><a>Width (in)</a></th>-->
	    </tr>

	  </thead>
	  <tbody>


		<?php if (have_posts()) : ?>		
		<?php query_posts(array('category_name' => 'artist', 'orderby' => 'post name', 'order' => 'ASC' )); ?>
			  <?php while (have_posts()) : the_post(); ?>
			    <?php $postmeta = get_post_custom($post->ID); $post_slug = $post->post_name; ?>
			      <tr <?php post_class() ?>>
			    	<td class="thumbnail"><a href="<?php the_permalink(); ?>"><img src="<?php 
			    										$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail', false, '' );
			    										if ( $src[0] == null ) { 
			    											echo bloginfo( 'template_directory' );
			    											echo "/images/no_image.png";
			    											} 
		    											else { echo $src[0];
			    											}
			    											?>" alt="<?php the_title(); ?>" /></a></td>
			    	<td class="slug"><?php echo $post_slug; ?></td>
			    	<td class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
			    	<td class="artist"><?php the_category(' '); ?></td>
			    	<td class="year"><?php echo $postmeta["year"][0]; ?></td>
			    	<td class="medium"><?php echo $postmeta["medium"][0]; ?></td>
			    	<? /* <td class="height"><?php echo $postmeta["height"][0]; ?></td>
			    	<td class="width"><?php echo $postmeta["width"][0]; ?></td> */ ?>
				  </tr>
			<?php endwhile; ?>
		
		
		
		<?php else : ?>
		
			<h2>Not Found</h2>
			<p>Sorry, but you are looking for something that isn't here.</p>
			<?php get_search_form(); ?>
		  
		
		<?php endif; ?>	  
	  </tbody>
	  <tfoot></tfoot>

  </table>
  <p>Source: <a href="http://www.crystalbridges.org/">Crystal Bridges Museum of American Art</a></p>





<?php get_footer(); ?>