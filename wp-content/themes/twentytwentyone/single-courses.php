<?php

$template_path = "http://localhost/eduhelp/wp-content/themes/twentytwentyone/";


get_header(); ?>

<!-- SPECIFIC CSS -->
    <link href="<?php echo $template_path; ?>css/contacts.css" rel="stylesheet">
<main>
		
		<div class="container margin_detail">
		    <div class="row">
		        <div class="col-lg-8">
		            <div class="detail_page_head clearfix">
		                
		                <div class="title">
		                    <h1><?php echo get_the_title( get_the_ID() );?></h1>
		                    
		                    <ul class="tags">
		                    	 	<?php
										$term_array = array();
										$term_list = wp_get_post_terms($post->ID, 'course_category', array("fields" => "all"));
										foreach($term_list as $term_single) {
										    $term_array[] = $term_single->name ; ?>
										    <li><a href=""><?php echo $term_single->name ; ?></a></li>
										    <?php 
										}
										//echo implode(", ",$term_array);
									?>
									<?php
										$term_array = array();
										$term_list = wp_get_post_terms($post->ID, 'locations', array("fields" => "all"));
										foreach($term_list as $term_single) {
										    $term_array[] = $term_single->name ; ?>
										    <li><a href=""><?php echo $term_single->name ; ?></a></li>
										    <?php 
										}
										//echo implode(", ",$term_array);
									?>
									<?php
										$term_array = array();
										$term_list = wp_get_post_terms($post->ID, 'study_pace', array("fields" => "all"));
										foreach($term_list as $term_single) {
										    $term_array[] = $term_single->name ; ?>
										    <li><a href=""><?php echo $term_single->name ; ?></a></li>
										    <?php 
										}
										//echo implode(", ",$term_array);
									?>
									<?php
										$term_array = array();
										$term_list = wp_get_post_terms($post->ID, 'program_level', array("fields" => "all"));
										foreach($term_list as $term_single) {
										    $term_array[] = $term_single->name ; ?>
										    <li><a href=""><?php echo $term_single->name ; ?></a></li>
										    <?php 
										}
										//echo implode(", ",$term_array);
									?>
									<?php
										$term_array = array();
										$term_list = wp_get_post_terms($post->ID, 'course_duration', array("fields" => "all"));
										foreach($term_list as $term_single) {
										    $term_array[] = $term_single->name ; ?>
										    <li><a href=""><?php echo $term_single->name ; ?></a></li>
										    <?php 
										}
										//echo implode(", ",$term_array);
									?>
		                    </ul>
		                </div>
		            </div>
		            <!-- /detail_page_head -->

		            <div class="owl-carousel owl-theme carousel_1 magnific-gallery">
		            	<?php 
							$wpblog_fetrdimg = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
						?>
						<?php if( $wpblog_fetrdimg ) : ?>
						 
						 	<div class="item">
					            <a href="<?php echo $wpblog_fetrdimg; ?>" title="Photo title" data-effect="mfp-zoom-in"><img src="<?php echo $wpblog_fetrdimg; ?>" alt=""></a>
					        </div>
						<?php endif; ?>
		                
		            </div>
		            <!-- /carousel -->
					<!-- <?php
			            $terms = get_the_terms( get_the_ID(), 'course_category' );
					    if ( is_array( $terms ) ) {
					        print_r($terms);
					        echo "<br>";
					        echo $terms->name;
					    }
					?> -->
					

					

					<?php
						$term_array = array();
						$term_list = wp_get_post_terms($post->ID, 'locations', array("fields" => "all"));
						foreach($term_list as $term_single) {
						    $term_array[] = $term_single->name ; //do something here
						    //echo $term_single->name ;
						}
						//echo implode(", ",$term_array);
					?>

		            <div class="tabs_detail">
		            	<div class="bg_gray">
						    <div class="container margin_60_40">
						        <div class="row justify-content-center">
						            <div class="col-lg-4">
						                <div class="box_contacts">
						                    <i class="icon_lifesaver"></i>
						                    <?php
												$term_array = array();
												$term_list = wp_get_post_terms($post->ID, 'course_category', array("fields" => "all"));
												foreach($term_list as $term_single) {
												    $term_array[] = $term_single->name ; ?>
												    <h2><?php echo $term_single->name ; ?></h2>
												    <?php 
												}
												//echo implode(", ",$term_array);
											?>
						                    <!-- 
						                    <a href="#0">+94 423-23-221</a> - <a href="#0">help@foogra.com</a>
						                    <small>MON to FRI 9am-6pm SAT 9am-2pm</small> -->
						                </div>
						            </div>
						            <div class="col-lg-4">
						                <div class="box_contacts">
						                    <i class="icon_lifesaver"></i>
						                    <?php
												$term_array = array();
												$term_list = wp_get_post_terms($post->ID, 'course_duration', array("fields" => "all"));
												foreach($term_list as $term_single) {
												    $term_array[] = $term_single->name ; ?>
												    <h2><?php echo $term_single->name ; ?></h2>
												    <?php 
												}
												//echo implode(", ",$term_array);
											?>
						                    <div>Course Duration</div>
						                </div>
						            </div>
						            <div class="col-lg-4">
						                <div class="box_contacts">
						                    <i class="icon_lifesaver"></i>
						                    <?php
												$term_array = array();
												$term_list = wp_get_post_terms($post->ID, 'study_pace', array("fields" => "all"));
												foreach($term_list as $term_single) {
												    $term_array[] = $term_single->name ; ?>
												    <h2><?php echo $term_single->name ; ?></h2>
												    <?php 
												}
												//echo implode(", ",$term_array);
											?>
						                    <div>Study Pace</div>
						                </div>
						            </div> 
						        </div>
						        <!-- /row -->
						    </div>
						    <!-- /container -->
						</div>
						<!-- /bg_gray -->


		                <ul class="nav nav-tabs" role="tablist">
		                    <li class="nav-item">
		                        <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab">Information</a>
		                    </li>
		                </ul>
		                <p><?php the_field('course_overview'); ?></p>

		                <div class="tab-content" role="tablist">
		                    <div id="pane-A" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="tab-A">
		                    	<h2>Career Oppurtunities</h2>

		                        <!-- <div class="card-header" role="tab" id="heading-A">
		                            <h5>
		                                <a class="collapsed" data-toggle="collapse" href="#collapse-A" aria-expanded="true" aria-controls="collapse-A">
		                                    Information
		                                </a>
		                            </h5>
		                        </div> -->
		                        <!-- from home last -->
		                        <div class="owl-carousel owl-theme carousel_4">
		                        	<?php

									// Check rows exists.
									if( have_rows('career_opportunities') ):

									    // Loop through rows.
									    while( have_rows('career_opportunities') ) : the_row(); ?>

									    	<div class="item">
										        <div class="strip">
										            <figure>
										                <img src="<?php echo get_sub_field('image'); ?>" data-src="<?php get_sub_field('image'); ?>" class="owl-lazy" alt="">
										                    <!-- <small>Pizza</small> -->
										                    <div class="item_title">
										                        <h3><?php echo get_sub_field('oppertunity'); ?></h3>
										                        <!-- <small>27 Old Gloucester St</small> -->
										                    </div>
										                
										            </figure>
										            
										        </div>
										    </div>
									    <?php 
									    // End loop.
									    endwhile;

									// No value.
									else :
									    // Do something...
									endif; 

									?>
								    
								    
								</div>
								<!-- /carousel -->
		                        <!-- end of homr last -->

		                        
		                        <!-- <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A"> -->
		                        	<h2>Course Modules</h2>
		                            <div class="card-body info_content">
		                            	<style>
											table {
											  font-family: arial, sans-serif;
											  border-collapse: collapse;
											  width: 100%;
											}

											td, th {
											  border: 1px solid #dddddd;
											  text-align: left;
											  padding: 8px;
											}

											tr:nth-child(even) {
											  background-color: #dddddd;
											}
										</style>

										<table>
											<tr>
												<th>Period</th>
												<th>Majors</th>
												<th>Units & Overview</th>
											</tr>

											<?php if( have_rows('course_modules') ): ?>
												<?php while( have_rows('course_modules') ): the_row(); ?>
											<tr>
												<td><?php the_sub_field('period'); ?></td>

												<?php 
													// check for rows (sub repeater)
													if( have_rows('majors') ): ?>
														<td>
														<?php 
															// loop through rows (sub repeater)
															while( have_rows('majors') ): the_row();
															// display each item as a list - with a class of completed ( if completed ) ?>
																<li><?php the_sub_field('module_name'); ?></li>
															<?php endwhile; ?>
														</td>
												<?php endif; //if( get_sub_field('majors') ): ?>

												<?php 
													// check for rows (sub repeater)
													if( have_rows('units_&_overview') ): ?>
														<td>
														<?php 
															// loop through rows (sub repeater)
															while( have_rows('units_&_overview') ): the_row();
															// display each item as a list - with a class of completed ( if completed ) ?>
																<li><?php the_sub_field('module_names'); ?></li>
															<?php endwhile; ?>
														</td>
												<?php endif; //if( get_sub_field('units_&_overview') ): ?>

												

											<?php endwhile; // end of the loop. ?>
											<?php endif; // if( get_field('to-do_lists') ): ?>
												
											</tr>
										</table>

										<br>
		                                <h2>Invesment & Payment Plans</h2>
		                                <p><?php the_field('investment_and_payment_plans'); ?></p>

		                                <h3>Minimum Requirements</h3>
		                                <li>fdggggggggggggggggg</li>
		                                <li>fdggggggggggggggggg</li>
		                                <li>fdggggggggggggggggg</li>
		                                <li>fdggggggggggggggggg</li>
		                                <!-- /content_more -->
		                                
		                                <hr>
		                                <h3>Dessert</h3>
		                                <div class="menu_item">
		                                    <em>€15.90</em>
		                                    <h4>Oriental</h4>
		                                    <p>Cama de tabule con taquitos de pollo a la mostaza light</p>
		                                </div>
		                                <div class="menu_item">
		                                    <em>€11.90</em>
		                                    <h4>Vegan Burguer</h4>
		                                    <p>Medio pollo asado acompañado de arroz o patatas al toque masala</p>
		                                </div>
		                                <div class="menu_item">
		                                    <em>€10.90</em>
		                                    <h4>Indio Fit</h4>
		                                    <p>lechuga, tomate, espinacas, pollo asado, picatostes, queso proteínico y salsa césar 0%</p>
		                                </div>
		                                <div class="content_more">
		                                    <div class="menu_item">
		                                        <em>€15.90</em>
		                                        <h4>Oriental</h4>
		                                        <p>Cama de tabule con taquitos de pollo a la mostaza light</p>
		                                    </div>
		                                    <div class="menu_item">
		                                        <em>€11.90</em>
		                                        <h4>Vegan Burguer</h4>
		                                        <p>Medio pollo asado acompañado de arroz o patatas al toque masala</p>
		                                    </div>
		                                    <div class="menu_item">
		                                        <em>€10.90</em>
		                                        <h4>Indio Fit</h4>
		                                        <p>lechuga, tomate, espinacas, pollo asado, picatostes, queso proteínico y salsa césar 0%</p>
		                                    </div>
		                                </div>
		                                <!-- /content_more -->
		                                <a href="#0" class="show_hide" data-content="toggle-text">Read More</a>

		                                <div class="add_bottom_45"></div>
		                                <h2>Facilities</h2>

		                                <div class="pictures magnific-gallery clearfix">

		                                	<?php
											// Check rows exists.
											if( have_rows('facility') ):

											    // Loop through rows.
											    while( have_rows('facility') ) : the_row();

											        // Load sub field value.
											        $sub_value = get_sub_field('facility_image');
											        $sub_value = get_sub_field('facility_description'); ?>

											        <figure>
		                                    			<a href="<?php echo $facility_image; ?>" title="<?php echo $facility_description; ?>" data-effect="mfp-zoom-in">
		                                    			<img src="<?php echo $facility_image; ?>" data-src="<?php echo $facility_image; ?>" class="lazy" alt=""></a>
		                                    		</figure>
											<?php
											    // End loop.
											    endwhile;

											// No value.
											else :
											    // Do something...
											endif;
											?>


		                                    
		                                </div>
		                                <!-- /pictures -->

		                                <div class="special_offers add_bottom_45">
		                                    <h2>Special Offers</h2>
		                                    <div class="menu_item">
		                                        <em>€10.90</em>
		                                        <h4>Indio Fit</h4>
		                                        <p>lechuga, tomate, espinacas, pollo asado, picatostes, queso proteínico y salsa césar 0%</p>
		                                    </div>
		                                    <div class="menu_item">
		                                        <em>€15.90</em>
		                                        <h4>Oriental</h4>
		                                        <p>Cama de tabule con taquitos de pollo a la mostaza light</p>
		                                    </div>
		                                    <div class="menu_item">
		                                        <em>€11.90</em>
		                                        <h4>Vegan Burguer</h4>
		                                        <p>Medio pollo asado acompañado de arroz o patatas al toque masala</p>
		                                    </div>
		                                    <div class="menu_item">
		                                        <em>€10.90</em>
		                                        <h4>Indio Fit</h4>
		                                        <p>lechuga, tomate, espinacas, pollo asado, picatostes, queso proteínico y salsa césar 0%</p>
		                                    </div>
		                                </div>
		                                <!-- /special_offers -->

		                                <div class="other_info">
		                                <h2>How to get to Pizzeria Alfredo</h2>
		                                <div class="row">
		                                	<div class="col-md-4">
		                                		<h3>Address</h3>
		                                		<p>27 Old Gloucester St, 4530<br><a href="https://www.google.com/maps/dir//Assistance+%E2%80%93+H%C3%B4pitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x47e66e1de36f4147:0xb6615b4092e0351f!2sAssistance+Publique+-+H%C3%B4pitaux+de+Paris+(AP-HP)+-+Si%C3%A8ge!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361" target="blank"><strong>Get directions</strong></a></p>
		                                		<strong>Follow Us</strong><br>
		                                		<p class="follow_us_detail"><a href="#0"><i class="social_facebook_square"></i></a><a href="#0"><i class="social_instagram_square"></i></a><a href="#0"><i class="social_twitter_square"></i></a></p>
		                                	</div>
		                                	<div class="col-md-4">
		                                		<h3>Opening Time</h3>
		                                		<p><strong>Lunch</strong><br> Mon. to Sat. 11.00am - 3.00pm<p>
		                                		<p><strong>Dinner</strong><br> Mon. to Sat. 6.00pm- 1.00am</p>
		                                		<p><span class="loc_closed">Sunday Closed</span></p>
		                                	</div>
		                                	<div class="col-md-4">
		                                		<h3>Services</h3>
		                                		<p><strong>Credit Cards</strong><br> Mastercard, Visa, Amex</p>
		                                		<p><strong>Other</strong><br> Wifi, Parking, Wheelchair Accessible</p>
		                                	</div>
		                                </div>
		                                <!-- /row -->
		                            	</div>
		                            </div>
		                       <!--  </div> -->
		                    </div>
		                    <!-- /tab -->

		                    

		                </div>
		                <!-- /tab-content -->
		            </div>
		            <!-- /tabs_detail -->
		        </div>
		        <!-- /col -->

		        <div class="col-lg-4" id="sidebar_fixed">
		            <div class="box_booking">
		                <div class="head">
		                    <h3>Book your table</h3>
		                    <div class="offer">Up to -40% off</div>
		                </div>
		                <!-- /head -->
		                <div class="main">
		                    <input type="text" id="datepicker_field">
		                    <div id="DatePicker"></div>
		                    <div class="dropdown time">
		                        <a href="#" data-toggle="dropdown">Hour <span id="selected_time"></span></a>
		                        <div class="dropdown-menu">
		                            <div class="dropdown-menu-content">
		                                <h4>Lunch</h4>
		                                <div class="radio_select add_bottom_15">
		                                    <ul>
		                                        <li>
		                                            <input type="radio" id="time_1" name="time" value="12.00am">
		                                            <label for="time_1">12.00<em>-40%</em></label>
		                                        </li>
		                                        <li>
		                                            <input type="radio" id="time_2" name="time" value="08.30pm">
		                                            <label for="time_2">12.30<em>-40%</em></label>
		                                        </li>
		                                        <li>
		                                            <input type="radio" id="time_3" name="time" value="09.00pm">
		                                            <label for="time_3">1.00<em>-40%</em></label>
		                                        </li>
		                                        <li>
		                                            <input type="radio" id="time_4" name="time" value="09.30pm">
		                                            <label for="time_4">1.30<em>-40%</em></label>
		                                        </li>
		                                    </ul>
		                                </div>
		                                <!-- /time_select -->
		                                <h4>Dinner</h4>
		                                <div class="radio_select">
		                                    <ul>
		                                        <li>
		                                            <input type="radio" id="time_5" name="time" value="08.00pm">
		                                            <label for="time_1">20.00<em>-40%</em></label>
		                                        </li>
		                                        <li>
		                                            <input type="radio" id="time_6" name="time" value="08.30pm">
		                                            <label for="time_2">20.30<em>-40%</em></label>
		                                        </li>
		                                        <li>
		                                            <input type="radio" id="time_7" name="time" value="09.00pm">
		                                            <label for="time_3">21.00<em>-40%</em></label>
		                                        </li>
		                                        <li>
		                                            <input type="radio" id="time_8" name="time" value="09.30pm">
		                                            <label for="time_4">21.30<em>-40%</em></label>
		                                        </li>
		                                    </ul>
		                                </div>
		                                <!-- /time_select -->
		                            </div>
		                        </div>
		                    </div>
		                    <!-- /dropdown -->
		                    <div class="dropdown people">
		                        <a href="#" data-toggle="dropdown">People <span id="selected_people"></span></a>
		                        <div class="dropdown-menu">
		                            <div class="dropdown-menu-content">
		                                <h4>How many people?</h4>
		                                <div class="radio_select">
		                                    <ul>
		                                        <li>
		                                            <input type="radio" id="people_1" name="people" value="1">
		                                            <label for="people_1">1<em>-40%</em></label>
		                                        </li>
		                                        <li>
		                                            <input type="radio" id="people_2" name="people" value="2">
		                                            <label for="people_2">2<em>-40%</em></label>
		                                        </li>
		                                        <li>
		                                            <input type="radio" id="people_3" name="people" value="3">
		                                            <label for="people_3">3<em>-40%</em></label>
		                                        </li>
		                                        <li>
		                                            <input type="radio" id="people_4" name="people" value="4">
		                                            <label for="people_4">4<em>-40%</em></label>
		                                        </li>
		                                    </ul>
		                                </div>
		                                <!-- /people_select -->
		                            </div>
		                        </div>
		                    </div>
		                    <!-- /dropdown -->
		                    <a href="#0" class="btn_1 full-width mb_5">Reserve Now</a>
		                    <a href="wishlist.html" class="btn_1 full-width outline wishlist"><i class="icon_heart"></i> Add to wishlist</a>
		                </div>
		            </div>
		            <!-- /box_booking -->
		            <ul class="share-buttons">
		                <li><a class="fb-share" href="#0"><i class="social_facebook"></i> Share</a></li>
		                <li><a class="twitter-share" href="#0"><i class="social_twitter"></i> Share</a></li>
		                <li><a class="gplus-share" href="#0"><i class="social_googleplus"></i> Share</a></li>
		            </ul>
		        </div>

		    </div>
		    <!-- /row -->
		</div>
		<!-- /container -->
		
	</main>
	<!-- /main -->

	
 <?php 
get_footer();
?> 