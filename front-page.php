<?php get_header() ?>	
		<?php 	    	// Get any existing copy of our transient data
	    	if ( false === ( $my_accordion_query = get_transient( 'ksas_accordion_query' ) ) ) {
        	// It wasn't there, so regenerate the data and save the transient
        	$my_accordion_query = new WP_Query(array(
			'post_type' => 'accordion',
			'posts_per_page' => '4'));
        	set_transient( 'ksas_accordion_query', $my_accordion_query, 86400 );
	    	}  ?>
		
		<?php if ($my_accordion_query->have_posts()) : ?>				
				<div id="accordion_background">
				<div id="accordion-container-wrapper">
				<div id="accordion-container">		
				
			<?php while ($my_accordion_query->have_posts()) : $my_accordion_query->the_post(); ?>

				<div id="as<?php echo the_ID() ?>" class="slide">
        			<a id="slideimg<?php echo the_ID() ?>" class="image async-img" href="<?php echo get_post_meta($post->ID, 'ecpt_accordion_destination', true); ?>">
        				<img alt="" src="<?php echo get_post_meta($post->ID, 'ecpt_accordion_photo', true); ?>">
        			<div class="text-back"></div>
        				<div class="text">
        					<h3><?php the_title() ?></h3>
        					<?php the_content() ?>
        				</div>
        			</a>
        			<img alt="" src="<?php echo get_post_meta($post->ID, 'ecpt_accordion_strip', true); ?>">
        		</div>
        		
		<?php endwhile; ?>
        	
    </div> <!-- accordion-container -->
	</div> <!-- accordion-container-wrapper --> 
	</div> <!-- accordion background -->
	<?php endif; ?>	 
	
	    <div id="container-mid">
	    	<div id="homepage">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> <!--Start the loop -->
						<?php the_content() ?>
					<?php endwhile; endif; ?>
					
					
					<?php //limit posts to 3 and start the loop
        					$recentPosts = new WP_Query();
        					$recentPosts->query('showposts=6');
	    					if ($recentPosts->have_posts() ) : ?> 
	    					<h2 class="clearleft">News and Announcements</h2>
	    					<?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?> 
	    				
	    			<div class="snippet">
	    			    
	    			    <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
	    			    
	    			    <?php if ( has_post_thumbnail()) { ?> 
	    			    	<div class="thumbnail">
	    			    		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
	    			    		<img src="<?php $image_id = get_post_thumbnail_id();
	    			    						$image_url = wp_get_attachment_image_src($image_id,'thumbnail', true);
	    			    						echo $image_url[0];  ?>" align="left" height="75" /></a>
	    			    	</div> <!--end thumbnail-->
	    			    <?php	} ?>
	    			    
	    			    <?php the_excerpt() ?>
	    			
	    			</div><!--End snippet -->
	    			
	    			<?php endwhile; //End loop ?>
	    		<div class="morenews"><p><a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">More News and Announcements &gt;&gt;</a></div>
	    		<? endif; ?>
	    		</div> <!--End blogfeed -->	

	    		<div class="clearboth"></div> <!--to have background work properly -->
	    	</div> <!--End homepage -->
	    		
		</div> <!--End container-mid -->		
	
<?php get_footer() ?>