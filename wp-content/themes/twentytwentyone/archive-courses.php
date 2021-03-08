<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

get_header();

//$description = get_the_archive_description();
?>



<div class="collapse filters_2" id="collapseFilters">
		    <div class="container margin_detail">
		        
		        <!-- /row -->
		    </div>
		</div>
		<!-- /filters -->

		<div class="container margin_30_40">
	    <div class="row">
	    	<?php
				$args = array(
				        'post_type' => 'courses',
				        'posts_per_page' => -1
				    );
				$query = new WP_Query($args);
				if ($query->have_posts() ) : 
				    while ( $query->have_posts() ) : $query->the_post();?>
				    	<?php
	       //                      $category_detail= get_the_terms(get_the_ID(), 'taxonomy');//$post->ID
								// foreach($category_detail as $cd){
								// echo $cd->cat_name;
								// }
				    	foreach (get_the_terms(get_the_ID(), 'taxonomy') as $cat) {
   							echo $cat->name;
						}

						$taxonomy = get_the_terms( get_the_ID(), 'taxonomy' );

						foreach ( $taxonomy as $tax ) {
						   echo esc_html( $tax->name ); 
						}
								?>
	        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
	            <div class="strip">
	                <figure>
	                    <!-- <span class="ribbon off">-30%</span> -->
	                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" data-src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-fluid lazy" alt="">
	                    <a href="<?php echo the_permalink(); ?>" class="strip_info">
	                        <!-- <small>Pizza</small> -->
	                        <div class="item_title">
	                            <h3><?php echo the_title(); ?>
	                            </h3>
	                        </div>
	                    </a>
	                </figure>
	                <ul>
	                    <li><span>Avg. Price 24$</span></li>
	                    <li>
	                        <div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div>
	                    </li>
	                </ul>
	            </div>
	        </div>

	        <?php endwhile;
						    wp_reset_postdata();
						endif;


						?>
	        <!-- /strip grid -->
	        
	    </div>
	    <!-- /row -->
	    <!-- <div class="pagination_fg">
	        <a href="#">&laquo;</a>
	        <a href="#" class="active">1</a>
	        <a href="#">2</a>
	        <a href="#">3</a>
	        <a href="#">4</a>
	        <a href="#">5</a>
	        <a href="#">&raquo;</a>
	    </div> -->
	</div>
	<!-- /container -->
		
	</main>
	<!-- /main -->

	
<?php get_footer(); ?>
