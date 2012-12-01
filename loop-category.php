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
		<?php global $query_string;
			query_posts( $query_string . '&order=ASC' . '&orderby=post name') ?>
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