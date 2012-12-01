<?php
/*
Template Name: Artists
*/

get_header(); ?>

<h1>List of Artists</h1>

<table>
	<thead>
		<tr>
			<th>Artist</th>
			<th>Number of works*</th>
			<th>Description</th>
		</tr>
	</thead>
	<tbody>
		<tr></tr>
	</tbody>
</table>

<?php $artistlist = array(
	'show_count' => 1,
	'title_li' => __( '' ),
	'child_of' => 333,
	'style' => 'none'
); ?> 
<?php wp_list_categories( $artistlist ); ?>


<?php get_footer(); ?>