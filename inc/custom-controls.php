<?php

// Customizer Control
if (class_exists('WP_Customize_Control')) {
   
    /*******************************  Skyrocket Class ******************************************/ 
    class Skyrocket_Custom_Control extends WP_Customize_Control {
          protected function get_skyrocket_resource_url() {
              if( strpos( wp_normalize_path( __DIR__ ), wp_normalize_path( WP_PLUGIN_DIR ) ) === 0 ) {
                  // We're in a plugin directory and need to determine the url accordingly.
                  return plugin_dir_url( __DIR__ );
              }
  
              return trailingslashit( get_template_directory_uri() );
          }
      }   /*******************************  Skyrocket Class ******************************************/ 
      
     /******************************* Text Editor ******************************************/ 
      class WP_Customize_Teeny_Control extends WP_Customize_Control { 
        function __construct($manager, $id, $options) {
          parent::__construct($manager, $id, $options);
    
          global $num_customizer_teenies_initiated;
          $num_customizer_teenies_initiated = empty($num_customizer_teenies_initiated)
            ? 1
            : $num_customizer_teenies_initiated + 1;
        }
        function render_content() {
          global $num_customizer_teenies_initiated, $num_customizer_teenies_rendered;
          $num_customizer_teenies_rendered = empty($num_customizer_teenies_rendered)
            ? 1
            : $num_customizer_teenies_rendered + 1;
    
          $value = $this->value();
          ?>
            <label>
              <span class="customize-text_editor"><?php echo esc_html($this->label); ?></span>
              <input id="<?php echo $this->id ?>-link" class="wp-editor-area" type="hidden" <?php $this->link(); ?> value="<?php echo esc_textarea($value); ?>">
              <?php
                wp_editor($value, $this->id, [
                  'textarea_name' => $this->id,
                  'media_buttons' => false,
                  'drag_drop_upload' => false,
                  'teeny' => true,
                  'quicktags' => false,
                  'textarea_rows' => 10,
                  // MAKE SURE TINYMCE CHANGES ARE LINKED TO CUSTOMIZER
                  'tinymce' => [
                    'setup' => "function (editor) {
                      var cb = function () {
                        var linkInput = document.getElementById('$this->id-link')
                        linkInput.value = editor.getContent()
                        linkInput.dispatchEvent(new Event('change'))
                      }
                      editor.on('Change', cb)
                      editor.on('Undo', cb)
                      editor.on('Redo', cb)
                      editor.on('KeyUp', cb) // Remove this if it seems like an overkill
                    }"
                  ]
                ]);
              ?>
            </label>
          <?php
          // PRINT THEM ADMIN SCRIPTS AFTER LAST EDITOR
          if ($num_customizer_teenies_rendered == $num_customizer_teenies_initiated)
            do_action('admin_print_footer_scripts');
        }
      }   /******************************* Text Editor ******************************************/ 

      /******************************* Dropdown Post ******************************************/ 
  
      class Skyrocket_Dropdown_Posts_Custom_Control extends Skyrocket_Custom_Control {
        /**
         * The type of control being rendered
         */
        public $type = 'dropdown_posts';
        /**
         * Posts
         */
        private $posts = array();
        /**
         * Constructor
         */
        public function __construct( $manager, $id, $args = array(), $options = array() ) {
          parent::__construct( $manager, $id, $args );
          // Get our Posts
          $this->posts = get_posts( $this->input_attrs );
        }
        /**
         * Render the control in the customizer
         */
        public function render_content() {
        ?>
          <div class="dropdown_posts_control">
            <?php if( !empty( $this->label ) ) { ?>
              <label for="<?php echo esc_attr( $this->id ); ?>" class="customize-control-title">
                <?php echo esc_html( $this->label ); ?>
              </label>
            <?php } ?>
            <?php if( !empty( $this->description ) ) { ?>
              <span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
            <?php } ?>
            <select name="<?php echo $this->id; ?>" id="<?php echo $this->id; ?>" <?php $this->link(); ?>>
              <?php
                if( !empty( $this->posts ) ) {
                  foreach ( $this->posts as $post ) {
                    printf( '<option value="%s" %s>%s</option>',
                      $post->ID,
                      selected( $this->value(), $post->ID, false ),
                      $post->post_title
                    );
                  }
                }
              ?>
            </select>
          </div>
        <?php
        }
      }  /******************************* Dropdown Post ******************************************/ 

	/**
	 * TinyMCE Custom Control
	 *
	 * @author Anthony Hortin <http://maddisondesigns.com>
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/maddisondesigns
	 */
	class Skyrocket_TinyMCE_Custom_control extends Skyrocket_Custom_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'tinymce_editor';
		/**
		 * Enqueue our scripts and styles
		 */
		public function enqueue(){
			wp_enqueue_script( 'skyrocket-custom-controls-js', $this->get_skyrocket_resource_url() . 'js/customizer.js', array( 'jquery' ), '1.0', true );
			wp_enqueue_style( 'skyrocket-custom-controls-css', $this->get_skyrocket_resource_url() . 'css/customizer.css', array(), '1.0', 'all' );
			wp_enqueue_editor();
		}
		/**
		 * Pass our TinyMCE toolbar string to JavaScript
		 */
		public function to_json() {
			parent::to_json();
			$this->json['skyrockettinymcetoolbar1'] = isset( $this->input_attrs['toolbar1'] ) ? esc_attr( $this->input_attrs['toolbar1'] ) : 'bold italic bullist numlist alignleft aligncenter alignright link';
			$this->json['skyrockettinymcetoolbar2'] = isset( $this->input_attrs['toolbar2'] ) ? esc_attr( $this->input_attrs['toolbar2'] ) : '';
			$this->json['skyrocketmediabuttons'] = isset( $this->input_attrs['mediaButtons'] ) && ( $this->input_attrs['mediaButtons'] === true ) ? true : false;
		}
		/**
		 * Render the control in the customizer
		 */
		public function render_content(){
		?>
			<div class="tinymce-control">
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php if( !empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>
				<textarea id="<?php echo esc_attr( $this->id ); ?>" class="customize-control-tinymce-editor" <?php $this->link(); ?>><?php echo esc_attr( $this->value() ); ?></textarea>
			</div>
		<?php
		}
	}

	/**
	 * Google Font Select Custom Control
	 *
	 * @author Anthony Hortin <http://maddisondesigns.com>
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/maddisondesigns
	 */
	class Skyrocket_Google_Font_Select_Custom_Control extends Skyrocket_Custom_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'google_fonts';
		/**
		 * The list of Google Fonts
		 */
		private $fontList = false;
		/**
		 * The saved font values decoded from json
		 */
		private $fontValues = [];
		/**
		 * The index of the saved font within the list of Google fonts
		 */
		private $fontListIndex = 0;
		/**
		 * The number of fonts to display from the json file. Either positive integer or 'all'. Default = 'all'
		 */
		private $fontCount = 'all';
		/**
		 * The font list sort order. Either 'alpha' or 'popular'. Default = 'alpha'
		 */
		private $fontOrderBy = 'alpha';
		/**
		 * Get our list of fonts from the json file
		 */
		public function __construct( $manager, $id, $args = array(), $options = array() ) {
			parent::__construct( $manager, $id, $args );
			// Get the font sort order
			if ( isset( $this->input_attrs['orderby'] ) && strtolower( $this->input_attrs['orderby'] ) === 'popular' ) {
				$this->fontOrderBy = 'popular';
			}
			// Get the list of Google fonts
			if ( isset( $this->input_attrs['font_count'] ) ) {
				if ( 'all' != strtolower( $this->input_attrs['font_count'] ) ) {
					$this->fontCount = ( abs( (int) $this->input_attrs['font_count'] ) > 0 ? abs( (int) $this->input_attrs['font_count'] ) : 'all' );
				}
			}
			$this->fontList = $this->skyrocket_getGoogleFonts( 'all' );
			// Decode the default json font value
			$this->fontValues = json_decode( $this->value() );
			// Find the index of our default font within our list of Google fonts
			$this->fontListIndex = $this->skyrocket_getFontIndex( $this->fontList, $this->fontValues->font );
		}
		/**
		 * Enqueue our scripts and styles
		 */
		public function enqueue() {
			wp_enqueue_script( 'skyrocket-select2-js', $this->get_skyrocket_resource_url() . 'js/select2.full.min.js', array( 'jquery' ), '4.0.13', true );
			wp_enqueue_script( 'skyrocket-custom-controls-js', $this->get_skyrocket_resource_url() . 'js/customizer.js', array( 'skyrocket-select2-js' ), '1.0', true );
			wp_enqueue_style( 'skyrocket-custom-controls-css', $this->get_skyrocket_resource_url() . 'css/customizer.css', array(), '1.1', 'all' );
			wp_enqueue_style( 'skyrocket-select2-css', $this->get_skyrocket_resource_url() . 'css/select2.min.css', array(), '4.0.13', 'all' );
		}
		/**
		 * Export our List of Google Fonts to JavaScript
		 */
		public function to_json() {
			parent::to_json();
			$this->json['skyrocketfontslist'] = $this->fontList;
		}
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
			$fontCounter = 0;
			$isFontInList = false;
			$fontListStr = '';

			if( !empty($this->fontList) ) {
				?>
				<div class="google_fonts_select_control">
					<?php if( !empty( $this->label ) ) { ?>
						<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<?php } ?>
					<?php if( !empty( $this->description ) ) { ?>
						<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
					<?php } ?>
					<input type="hidden" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-google-font-selection" <?php $this->link(); ?> />
					<div class="google-fonts">
						<select class="google-fonts-list" control-name="<?php echo esc_attr( $this->id ); ?>">
							<?php
								foreach( $this->fontList as $key => $value ) {
									$fontCounter++;
									$fontListStr .= '<option value="' . $value->family . '" ' . selected( $this->fontValues->font, $value->family, false ) . '>' . $value->family . '</option>';
									if ( $this->fontValues->font === $value->family ) {
										$isFontInList = true;
									}
									if ( is_int( $this->fontCount ) && $fontCounter === $this->fontCount ) {
										break;
									}
								}
								if ( !$isFontInList && $this->fontListIndex ) {
									// If the default or saved font value isn't in the list of displayed fonts, add it to the top of the list as the default font
									$fontListStr = '<option value="' . $this->fontList[$this->fontListIndex]->family . '" ' . selected( $this->fontValues->font, $this->fontList[$this->fontListIndex]->family, false ) . '>' . $this->fontList[$this->fontListIndex]->family . ' (default)</option>' . $fontListStr;
								}
								// Display our list of font options
								echo $fontListStr;
							?>
						</select>
					</div>
					<div class="customize-control-description"><?php esc_html_e( 'Select weight & style for regular text', 'skyrocket' ) ?></div>
					<div class="weight-style">
						<select class="google-fonts-regularweight-style">
							<?php
								foreach( $this->fontList[$this->fontListIndex]->variants as $key => $value ) {
									echo '<option value="' . $value . '" ' . selected( $this->fontValues->regularweight, $value, false ) . '>' . $value . '</option>';
								}
							?>
						</select>
					</div>
					<div class="customize-control-description"><?php esc_html_e( 'Select weight for', 'skyrocket' ) ?> <italic><?php esc_html_e( 'italic text', 'skyrocket' ) ?></italic></div>
					<div class="weight-style">
						<select class="google-fonts-italicweight-style" <?php disabled( in_array( 'italic', $this->fontList[$this->fontListIndex]->variants ), false ); ?>>
							<?php
								$optionCount = 0;
								foreach( $this->fontList[$this->fontListIndex]->variants as $key => $value ) {
									// Only add options that are italic
									if( strpos( $value, 'italic' ) !== false ) {
										echo '<option value="' . $value . '" ' . selected( $this->fontValues->italicweight, $value, false ) . '>' . $value . '</option>';
										$optionCount++;
									}
								}
								if( $optionCount == 0 ) {
									echo '<option value="">Not Available for this font</option>';
								}
							?>
						</select>
					</div>
					<div class="customize-control-description"><?php esc_html_e( 'Select weight for', 'skyrocket' ) ?> <strong><?php esc_html_e( 'bold text', 'skyrocket' ) ?></strong></div>
					<div class="weight-style">
						<select class="google-fonts-boldweight-style">
							<?php
								$optionCount = 0;
								foreach( $this->fontList[$this->fontListIndex]->variants as $key => $value ) {
									// Only add options that aren't italic
									if( strpos( $value, 'italic' ) === false ) {
										echo '<option value="' . $value . '" ' . selected( $this->fontValues->boldweight, $value, false ) . '>' . $value . '</option>';
										$optionCount++;
									}
								}
								// This should never evaluate as there'll always be at least a 'regular' weight
								if( $optionCount == 0 ) {
									echo '<option value="">Not Available for this font</option>';
								}
							?>
						</select>
					</div>
					<input type="hidden" class="google-fonts-category" value="<?php echo $this->fontValues->category; ?>">
				</div>
				<?php
			}
		}

		/**
		 * Find the index of the saved font in our multidimensional array of Google Fonts
		 */
		public function skyrocket_getFontIndex( $haystack, $needle ) {
			foreach( $haystack as $key => $value ) {
				if( $value->family == $needle ) {
					return $key;
				}
			}
			return false;
		}

		/**
		 * Return the list of Google Fonts from our json file. Unless otherwise specfied, list will be limited to 30 fonts.
		 */
		public function skyrocket_getGoogleFonts( $count = 30 ) {
			// Google Fonts json generated from https://www.googleapis.com/webfonts/v1/webfonts?sort=popularity&key=YOUR-API-KEY
			$fontFile = $this->get_skyrocket_resource_url() . 'inc/google-fonts-alphabetical.json';
			if ( $this->fontOrderBy === 'popular' ) {
				$fontFile = $this->get_skyrocket_resource_url() . 'inc/google-fonts-popularity.json';
			}

			$request = wp_remote_get( $fontFile );
			if( is_wp_error( $request ) ) {
				return "";
			}

			$body = wp_remote_retrieve_body( $request );
			$content = json_decode( $body );

			if( $count == 'all' ) {
				return $content->items;
			} else {
				return array_slice( $content->items, 0, $count );
			}
		}
    } /*********************************  Google Font  *************************************/
	
	/*********************************  Alpha color picker *************************************/
    class Customize_Alpha_Color_Control extends WP_Customize_Control {

		/**
		 * Official control name.
		 */
		public $type = 'alpha-color';
	
		/**
		 * Add support for palettes to be passed in.
		 *
		 * Supported palette values are true, false, or an array of RGBa and Hex colors.
		 */
		public $palette;
	
		/**
		 * Add support for showing the opacity value on the slider handle.
		 */
		public $show_opacity;
	
		/**
		 * Enqueue scripts and styles.
		 *
		 * Ideally these would get registered and given proper paths before this control object
		 * gets initialized, then we could simply enqueue them here, but for completeness as a
		 * stand alone class we'll register and enqueue them here.
		 */
		public function enqueue() {
			wp_enqueue_script(
				'alpha-color-picker',
				get_stylesheet_directory_uri() . '/inc/alpha-color-picker.js',
				array( 'jquery', 'wp-color-picker' ),
				'1.0.0',
				true
			);
			wp_enqueue_style(
				'alpha-color-picker',
				get_stylesheet_directory_uri() . '/inc/alpha-color-picker.css',
				array( 'wp-color-picker' ),
				'1.0.0'
			);
		}
	
		/**
		 * Render the control.
		 */
		public function render_content() {
	
			// Process the palette
			if ( is_array( $this->palette ) ) {
				$palette = implode( '|', $this->palette );
			} else {
				// Default to true.
				$palette = ( false === $this->palette || 'false' === $this->palette ) ? 'false' : 'true';
			}
	
			// Support passing show_opacity as string or boolean. Default to true.
			$show_opacity = ( false === $this->show_opacity || 'false' === $this->show_opacity ) ? 'false' : 'true';
	
			// Begin the output. ?>
			<label>
				<?php // Output the label and description if they were passed in.
				if ( isset( $this->label ) && '' !== $this->label ) {
					echo '<span class="customize-control-title">' . sanitize_text_field( $this->label ) . '</span>';
				}
				if ( isset( $this->description ) && '' !== $this->description ) {
					echo '<span class="description customize-control-description">' . sanitize_text_field( $this->description ) . '</span>';
				} ?>
				<input class="alpha-color-control" type="text" data-show-opacity="<?php echo $show_opacity; ?>" data-palette="<?php echo esc_attr( $palette ); ?>" data-default-color="<?php echo esc_attr( $this->settings['default']->default ); ?>" <?php $this->link(); ?>  />
			</label>
			<?php
		}
	} 
	/*********************************  Alpha color picker *************************************/

	/********************************* Title & Description Notice *************************************/
	class Skyrocket_Simple_Notice_Custom_Control extends WP_Customize_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'simple_notice';
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
		?>
		<div class="simple-notice-custom-control">
		   <?php if( !empty( $this->label ) ) { ?>
			  <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		   <?php } ?>
		   <?php if( !empty( $this->description ) ) { ?>
			  <span class="customize-control-description"><?php echo wp_kses_post( $this->description ); ?></span>
		   <?php } ?>
		</div>
		<?php
		}
	 }
	/********************************* Title & Description Notice *************************************/

    }  // Close Function 
  
?>