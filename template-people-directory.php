<?php
/*
Template Name: Directory
*/
	get_header() ?>	
		
		<div id="container-mid">
			<div id="main">				
				<div id="content">
									<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> <!--Start the loop -->
					
					<?php if ( get_post_meta($post->ID, 'extra_javascript', true) ) : ?><?php echo get_post_meta($post->ID, 'extra_javascript', true); ?><?php endif; ?>
					
						<?php if ( has_post_thumbnail()) { ?> 
						<img src="<?php $image_id = get_post_thumbnail_id();
										$image_url = wp_get_attachment_image_src($image_id,'page-image', true);
										echo $image_url[0];  ?>" />
						<?php	} ?>
						
						<h2><?php the_title() ?></h2>
						
						<?php the_content() ?>
			
					<?php endwhile; else: ?>
						<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
					<?php endif; ?>
					<div class="directory-table">
					<table>

<?php
global $wpdb;
$affiliationname = $ksascent_option['ksascent_select_input'];
$facultymembers = $wpdb->get_results(
	"
	SELECT post_title, guid, ecpt_people_photo, ecpt_position, ecpt_degrees, ecpt_expertise, ecpt_phone, ecpt_email, ecpt_office, ecpt_people_alpha
	FROM kr13g3rd3v_global_people
	WHERE slugs LIKE '%faculty%'
	AND slugs LIKE '%$affiliationname%'
	ORDER BY ecpt_people_alpha ASC
	"
);

foreach ($facultymembers as $facultymember) {
echo '<tr>
		<td><a href="' . $facultymember->guid;
echo '" target="_blank"><img src="' . $facultymember->ecpt_people_photo;
echo '" width="200" /></a></td>
						<td><h4><a href="' . $facultymember->guid;
echo '" target="_blank">' . $facultymember->post_title;
echo '</a></h4>
							<p>' . $facultymember->ecpt_position;
echo '<br>' . $facultymember->ecpt_degrees;
echo '<br>' . $facultymember->ecpt_expertise;
echo '</p></td><td><p class="contact-info">' . $facultymember->ecpt_phone;
echo '<br><a href="mailto:' . $facultymember->ecpt_email;
echo '">' . $facultymember->ecpt_email;
echo '</a><br>' . $facultymember->ecpt_office;
echo '<br></p></td></tr>';
};?>

</table></div>		
				</div> <!--End content -->		
				<div class="clearboth"></div> <!--to have background work properly -->
			</div> <!--End main -->
			
		</div> <!--End container-mid -->
	
<?php get_footer() ?>