<?php
/**
 * Create widget
 *
 * @since 1.0
 */
if( ! class_exists( 'Easy_Profile_Widget' ) ){
	class Easy_Profile_Widget extends WP_Widget {
		/**
		 * Sets up the widgets name etc
		 */
		public function __construct() {
			parent::__construct(
				'easy_profile_widget',
				__( 'Easy Profile', 'easy-profile' ),
				array( 'description' => __( 'Display User Profile Block with Gravatar on your sidebar widget', 'easy-profile' )
				),
				array( 'width' => apply_filters( 'easy_profile_widget_width', 500 )  )
			);
		}

		/**
		 * Outputs the content of the widget
		 *
		 * @param array $args
		 * @param array $instance
		 */
		public function widget( $args, $instance ) {
			extract( $args );

			$instance['uniqid'] = time() .'-'. uniqid(true);
			$small 				= apply_filters( 'easy_profile_widget_avatar_small', 50 );
			$medium 			= apply_filters( 'easy_profile_widget_avatar_medium', 70 );
			$large 				= apply_filters( 'easy_profile_widget_avatar_large', 90 );
			$extra_large 		= apply_filters( 'easy_profile_widget_avatar_extra_large', 120 );
			$classes 			= apply_filters( 'easy_profile_widget_extra_classes', array(), $instance );
			$description 		= '';
			$instance['sizes'] 	= array( 'small' => $small, 'medium' => $medium, 'large' => $large, 'extra_large' => $extra_large );
			ob_start();
			if( isset( $instance['title'] ) ){
				$title = apply_filters( 'widget_title', $instance['title'] );
			}
			// print_r($instance);
			echo $before_widget;
			// Check if title is set
			if ( $title ) {
			  echo $before_title . $title . $after_title;
			} ?>
			<div class="easy-profile-widget-wrapper easy-profile-widget-avatar-<?php echo ( isset( $instance['alignment'] ) ) ? $instance['alignment'] : ''; ?> easy-profile-widget-avatar-<?php echo ( isset( $instance['shape'] ) ) ? $instance['shape'] : ''; ?> <?php echo ( !empty($classes) ) ? implode( ' ' , $classes) : '';?>">
				<?php
					do_action( 'before_easy_profile_widget', $instance );
					echo '<div class="easy-profile-widget-inner">';
						do_action( 'before_easy_profile_widget_avatar', $instance );
						if( isset( $instance['user'] ) && !empty( $instance['user'] ) ){
							$userdata =	get_userdata( $instance['user'] );
							$gravatar =	get_avatar( $instance['user'], $$instance['size'] );
							echo apply_filters( 'easy_profile_widget_avatar', $gravatar, $instance );
							echo apply_filters( 'easy_profile_widget_name', '<h4 class="easy-profile-widget-name">'. $userdata->display_name .'</h4>', $instance );
						}
						do_action( 'after_easy_profile_widget_avatar', $instance );
						do_action( 'before_easy_profile_widget_description', $instance );
						echo '<p>';
						if( isset( $instance['description'] ) && $instance['description'] == 'custom' ){
							$description = $instance['custom_description'] ;
						}else{
							if( isset( $instance['user'] ) && !empty( $instance['user'] ) ){
								$description = $userdata->description;
							}
						}

						echo apply_filters( 'easy_profile_widget_description', $description, $instance );

						if( isset( $instance['extended_page'] ) && !empty( $instance['extended_page'] ) ){
							echo ' <a href="'. esc_url( get_permalink( $instance['extended_page'] ) ) .'">'. $instance['extended_text'] .'</a>';
						}
						echo '</p>';
						do_action( 'after_easy_profile_widget_description', $instance );
					echo '</div>';
					do_action( 'after_easy_profile_widget', $instance );?>
			</div>
			<?php
			echo $after_widget;
			$html = ob_get_clean();

			echo apply_filters( 'do_easy_profile_widget', $html, $args, $instance );
		}

		/**
		 * Ouputs the options form on admin
		 *
		 * @param array $instance The widget options
		 */
		public function form( $instance ) {
			$uniqid 	= time().'-'.uniqid(true);
			$selected 	= 'selected="selected"';
			$checked 	= 'checked="checked"';
			?>
			<div class="easy-profile-widget-form">
				<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'easy-profile' ) ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php if ( isset ( $instance['title'] ) ) {echo esc_attr( $instance['title'] );} ?>" />
				</p>
				<div class="easy-profile-tabs">
					<ul>
						<li><a href="#easy-profile-tab-<?php echo $uniqid;?>-1"><?php _e( 'Gravatar', 'easy-profile' );?></a></li>
						<li><a href="#easy-profile-tab-<?php echo $uniqid;?>-2"><?php _e( 'Description', 'easy-profile' );?></a></li>
						<?php if( !function_exists( 'easy_profile_widget_cards_cover' ) ){?>
							<li><a href="#easy-profile-tab-<?php echo $uniqid;?>-addon"><?php _e( '+', 'easy-profile' );?></a></li>
						<?php }?>
						<?php do_action( 'do_easy_profile_widget_tab', array( 'id' => $uniqid, 'instance' => $instance ) );?>
					</ul>
					<div id="easy-profile-tab-<?php echo $uniqid;?>-1">
						<?php do_action( 'before_easy_profile_widget_avatar_tab', $instance );?>
						<p><label for="<?php echo $this->get_field_id( 'user' ); ?>"><?php _e( 'Select a user. The email address for this account will be used to pull the Gravatar image.', 'easy-profile' ) ?></label>
							<?php
							wp_dropdown_users(
								array(
										'name' 		=> $this->get_field_name( 'user' ),
										'id' 		=> $this->get_field_id( 'user' ),
										'class' 	=> 'widefat',
										'selected' 	=> ( isset ( $instance['user'] ) ) ? esc_attr( $instance['user'] ) : ''
								)
							); ?>
						</p>
						<p><label for="<?php echo $this->get_field_id( 'size' ); ?>"><?php _e( 'Gravatar Size:', 'easy-profile' ); ?></label>
							<select id="<?php echo $this->get_field_id( 'size' ); ?>" name="<?php echo $this->get_field_name( 'size' ); ?>">
								<option value='small' <?php if ( isset ( $instance['size'] ) && $instance['size'] == 'small' ) { echo $selected; } ?> ><?php _e( 'Small (50px)', 'easy-profile' );?></option>
								<option value='medium' <?php if ( isset ( $instance['size'] ) && $instance['size'] == 'medium' ) { echo $selected; } ?> ><?php _e( 'Medium (70px)', 'easy-profile' );?></option>
								<option value='large' <?php if ( isset ( $instance['size'] ) && $instance['size'] == 'large' ) { echo $selected; } ?> ><?php _e( 'Large (90px)', 'easy-profile' );?></option>
								<option value='extra_large' <?php if ( isset ( $instance['size'] ) && $instance['size'] == 'extra_large' ) { echo $selected; } ?> ><?php _e( 'Extra Large (120px)', 'easy-profile' );?></option>
							</select>
						</p>
						<p><label for="<?php echo $this->get_field_id( 'alignment' ); ?>"><?php _e( 'Gravatar Alignment:', 'easy-profile' ); ?></label>
							<select id="<?php echo $this->get_field_id( 'alignment' ); ?>" name="<?php echo $this->get_field_name( 'alignment' ); ?>">
								<option value='none' <?php if ( isset ( $instance['alignment'] ) && $instance['alignment'] == 'none' ) { echo $selected; } ?> ><?php _e( 'None', 'easy-profile' );?></option>
								<option value='left' <?php if ( isset ( $instance['alignment'] ) && $instance['alignment'] == 'left' ) { echo $selected; } ?> ><?php _e( 'Left', 'easy-profile' );?></option>
								<option value='center' <?php if ( isset ( $instance['alignment'] ) && $instance['alignment'] == 'center' ) { echo $selected; } ?> ><?php _e( 'Center', 'easy-profile' );?></option>
								<option value='right' <?php if ( isset ( $instance['alignment'] ) && $instance['alignment'] == 'right' ) { echo $selected; } ?> ><?php _e( 'Right', 'easy-profile' );?></option>
							</select>
						</p>
						<p><label for="<?php echo $this->get_field_id( 'shape' ); ?>"><?php _e( 'Gravatar Shape:', 'easy-profile' ); ?></label>
							<select id="<?php echo $this->get_field_id( 'shape' ); ?>" name="<?php echo $this->get_field_name( 'shape' ); ?>">
								<option value='none' <?php if ( isset ( $instance['shape'] ) && $instance['shape'] == 'none' ) { echo $selected; } ?> ><?php _e( 'Default', 'easy-profile' );?></option>
								<option value='rounded' <?php if ( isset ( $instance['shape'] ) && $instance['shape'] == 'rounded' ) { echo $selected; } ?> ><?php _e( 'Rounded', 'easy-profile' );?></option>
								<!-- <option value='square' <?php if ( isset ( $instance['shape'] ) && $instance['shape'] == 'square' ) { echo $selected; } ?> ><?php _e( 'Square', 'easy-profile' );?></option> -->
							</select>
						</p>
						<?php do_action( 'after_easy_profile_widget_avatar_tab', array( 'id' => $uniqid, 'instance' => $instance, 'this' => ( isset( $this ) ) ? $this : array() ) );?>
					</div> <!-- end tab 1 -->
					<div id="easy-profile-tab-<?php echo $uniqid;?>-2">
						<?php do_action( 'before_easy_profile_widget_description_tab', $instance );?>
						<p><label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Choose which text you would like to use as the author description:', 'easy-profile' ); ?></label><br /><br />
						<input type="radio" id="<?php echo $this->get_field_id( 'description' ); ?>-bio" name="<?php echo $this->get_field_name( 'description' ); ?>" value="bio" <?php if ( isset ( $instance['description'] ) && $instance['description'] == 'bio' ) { echo $checked; } ?> /> <label for="<?php echo $this->get_field_id( 'description' ); ?>-bio"><?php _e( 'Author Bio', 'easy-profile' );?></label><br />
						<input type="radio" id="<?php echo $this->get_field_id( 'description' ); ?>-custom" name="<?php echo $this->get_field_name( 'description' ); ?>" value="custom" <?php if ( isset ( $instance['description'] ) && $instance['description'] == 'custom' ) { echo $checked; } ?> /> <label for="<?php echo $this->get_field_id( 'description' ); ?>-custom"><?php _e( 'Custom Description(below)', 'easy-profile' );?></label><br />
						<textarea id="<?php echo $this->get_field_id( 'custom_description' ); ?>" name="<?php echo $this->get_field_name( 'custom_description' ); ?>" class="widefat" rows="6" cols="5" ><?php if ( isset ( $instance['custom_description'] ) ) { echo esc_attr( $instance['custom_description'] ); } ?></textarea>
						</p>
						<p><label for="<?php echo $this->get_field_id( 'extended_page' ); ?>"><?php _e( 'Choose your extended "About Me" page. This will be the page linked to at the end of your author description.', 'easy-profile' ); ?></label>
							<?php
							wp_dropdown_pages(
								array(
									'name' 				=> $this->get_field_name( 'extended_page' ),
									'id' 				=> $this->get_field_id( 'extended_page' ),
									'class' 			=> 'widefat',
									'show_option_none' 	=> __( 'None', 'easy-profile'),
									'selected' 			=> ( isset ( $instance['extended_page'] ) ) ? esc_attr( $instance['extended_page'] ) : ''
								)
							); ?>
						</p>
						<p><label for="<?php echo $this->get_field_id( 'extended_text' ); ?>"><?php _e( 'Extended page link text:', 'easy-profile' ) ?></label>
						<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'extended_text' ); ?>" name="<?php echo $this->get_field_name( 'extended_text' ); ?>" value="<?php if ( isset ( $instance['extended_text'] ) ) { echo esc_attr( $instance['extended_text'] ); }else{ _e( 'Read More…', 'easy-profile' ); } ?>" />
						</p>
						<?php do_action( 'after_easy_profile_widget_description_tab', array( 'id' => $uniqid, 'instance' => $instance, 'this' => ( isset( $this ) ) ? $this : array() ) );?>
					</div> <!-- end tab 2 -->

					<?php if( !function_exists( 'easy_profile_widget_cards_cover' ) ){?>
						<div id="easy-profile-tab-<?php echo $uniqid;?>-addon">
							<p><strong><?php _e( 'Maximize your About & Profile Widget', 'easy-profile' );?></strong></p>
							<ul>
								<li><span class="dashicons dashicons-yes"></span> <?php _e( 'Layout & Styling', 'easy-profile' );?></li>
								<li><span class="dashicons dashicons-yes"></span> <?php _e( 'Custom Avatar & Cover Image', 'easy-profile' );?></li>
								<li><span class="dashicons dashicons-yes"></span> <?php _e( 'Tagline Text', 'easy-profile' );?></li>
								<li><span class="dashicons dashicons-yes"></span> <?php _e( 'Alignment', 'easy-profile' );?></li>
								<li><span class="dashicons dashicons-yes"></span> <?php _e( 'Social Media Icons', 'easy-profile' );?></li>
							</ul>
							<p><em><?php _e( 'Use EASYPROFILE2016 and get 20% OFF your purchase. Thanks!', 'easy-profile' );?></em></p>
							<p><strong><a href="https://phpbits.net/plugin/easy-profile-cards/" class="easy-profile-learnmore" target="_blank"><?php _e( 'Learn More', 'easy-profile' );?></a></strong></p>
						</div>
					<?php }?>

					<?php do_action( 'do_easy_profile_widget_tabcontent', array( 'id' => $uniqid, 'instance' => $instance, 'this' => ( isset( $this ) ) ? $this : array() ) );?>
				</div>
				<?php if( !class_exists('PHPBITS_extendedWidgetsDisplay') ):?>
					<div class="easy-profile-widget--after">
						<a href="http://widget-options.com?utm_source=easy-profile-widget" target="_blank" ><?php _e( '<strong>Manage your widgets</strong> visibility, styling, alignment, columns, restrictions and more. Click here to learn more. ', 'easy-sidebar-menu-widget' );?></a>
					</div>
				<?php endif;?>
			</div>
			<script type="text/javascript">
			jQuery(document).ready(function($){
				if($('.so-content .easy-profile-tabs').length > 0){
					$('.easy-profile-tabs').tabs({ active: 0 });
				}
			});
			</script>
			<?php
		}


		/**
		 * Processing widget options on save
		 *
		 * @param array $new_instance The new options
		 * @param array $old_instance The previous options
		 */
		public function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			// Fields
			$instance['title'] 				= ( isset( $new_instance['title'] ) ) ? strip_tags($new_instance['title']) : '';
			$instance['user'] 				= ( isset( $new_instance['user'] ) ) ? strip_tags($new_instance['user']) : '';
			$instance['size'] 				= ( isset( $new_instance['size'] ) ) ? strip_tags( $new_instance['size'] ) : '';
			$instance['alignment'] 			= ( isset( $new_instance['alignment'] ) ) ? strip_tags($new_instance['alignment']) : '';
			$instance['shape'] 				= ( isset( $new_instance['shape'] ) ) ? strip_tags($new_instance['shape']) : '';
			$instance['description']		= ( isset( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';
			$instance['custom_description']	= ( isset( $new_instance['custom_description'] ) ) ? strip_tags( $new_instance['custom_description'], apply_filters( 'easy_profile_widget_info_html', '<a><p><strong><em>' ) ) : '';
			$instance['extended_page']		= ( isset( $new_instance['extended_page'] ) ) ? strip_tags($new_instance['extended_page']) : '';
			$instance['extended_text']		= ( isset( $new_instance['extended_text'] ) ) ? strip_tags($new_instance['extended_text']) : '';

			$instance = apply_filters( 'save_easy_profile_widget_instance', $instance, $new_instance );

			return $instance;
		}
	}

	// register widget
	function register_easy_profile_widget() {
	    register_widget( 'Easy_Profile_Widget' );
	}
	add_action( 'widgets_init', 'register_easy_profile_widget' );
}
?>
