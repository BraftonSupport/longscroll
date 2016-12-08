<?php
/*
Yvonne is doing a thing. She does not know what the thing is. She may be going about this bassackwards.
*/

/*Oh gosh, shortcodes! Adding buttons for shortcodes into the WP editor
-----------------------------------------------------------------*/
//does not work in php < 5.5 

function the_content_filter($content) {
    $block = join("|",array("row", "half", "third", "fourth"));
    $rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
    $rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
return $rep;
}
add_filter("the_content", "the_content_filter");

$shortcodesarray= array('row','half','third','fourth');
foreach ($shortcodesarray as $shortcode) {
	add_shortcode( $shortcode, $shortcode.'_shortcode' );
}

function row_shortcode( $atts , $content = null ) {
    $a = shortcode_atts( array( 'class' => '', 'bg-color' => '', 'color' => '', 'bg-image' => '', 'padding' => ''), $atts );
	$html = '<div class="row';
		if ( !empty( $a['class'] ) ) {
			$html.= ' '.esc_attr($a['class']).'"';
		} else {
			$html.= '"';
		}
		if ( !empty( $a['bg-color']) || !empty( $a['color']) || !empty( $a['bg-image']) || !empty( $a['padding'] ) ) {
			$html.= ' style="';
		}
			if ( !empty( $a['bg-color'] ) ) {
				$html.= 'background-color:'. esc_attr($a['bg-color']).'; ';
			}
			if ( !empty( $a['color'] ) ) {
				$html.= 'color:'. esc_attr($a['color']).'; ';
			}
			if ( !empty( $a['bg-image'] ) ) {
				$html.= 'background-image:url('. esc_attr($a['bg-image']).'); -webkit-align-self: stretch; -ms-flex-item-align: stretch; align-self: stretch;';
			}
			if ( !empty( $a['padding'] ) ) {
				$html.= 'padding:'. esc_attr($a['padding']).';';
			}
		if ( !empty( $a['bg-color'] ) || !empty( $a['color'] ) || !empty( $a['bg-image'] ) || !empty( $a['padding'] ) ) {
			$html.= '"';
		}
		$html.= '><div class="site-inner">' . do_shortcode($content) . '</div></div>';
	return $html;
}

function half_shortcode( $atts , $content = null ) {
    $a = shortcode_atts( array( 'class' => '', 'bg-color' => '', 'color' => '', 'bg-image' => '', 'padding' => ''), $atts );
	$html = '<div class="half';
		if ( !empty( $a['class'] ) ) {
			$html.= ' '.esc_attr($a['class']).'"';
		} else {
			$html.= '"';
		}
		if ( !empty( $a['bg-color']) || !empty( $a['color']) || !empty( $a['bg-image']) || !empty( $a['padding'] ) ) {
			$html.= ' style="';
		}
			if ( !empty( $a['bg-color'] ) ) {
				$html.= 'background-color:'. esc_attr($a['bg-color']).'; ';
			}
			if ( !empty( $a['color'] ) ) {
				$html.= 'color:'. esc_attr($a['color']).'; ';
			}
			if ( !empty( $a['bg-image'] ) ) {
				$html.= 'background-image:url('. esc_attr($a['bg-image']).'); -webkit-align-self: stretch; -ms-flex-item-align: stretch; align-self: stretch;';
			}
			if ( !empty( $a['padding'] ) ) {
				$html.= 'padding:'. esc_attr($a['padding']).';';
			}
		if ( !empty( $a['bg-color'] ) || !empty( $a['color'] ) || !empty( $a['bg-image'] ) || !empty( $a['padding'] ) ) {
			$html.= '"';
		}
		$html.= '>' . do_shortcode($content) . '</div>';
	return $html;
}

function third_shortcode( $atts , $content = null ) {
    $a = shortcode_atts( array( 'class' => '', 'bg-color' => '', 'color' => '', 'bg-image' => '', 'padding' => ''), $atts );
	$html = '<div class="third';
		if ( !empty( $a['class'] ) ) {
			$html.= ' '.esc_attr($a['class']).'"';
		} else {
			$html.= '"';
		}
		if ( !empty( $a['bg-color']) || !empty( $a['color']) || !empty( $a['bg-image']) || !empty( $a['padding'] ) ) {
			$html.= ' style="';
		}
			if ( !empty( $a['bg-color'] ) ) {
				$html.= 'background-color:'. esc_attr($a['bg-color']).'; ';
			}
			if ( !empty( $a['color'] ) ) {
				$html.= 'color:'. esc_attr($a['color']).'; ';
			}
			if ( !empty( $a['bg-image'] ) ) {
				$html.= 'background-image:url('. esc_attr($a['bg-image']).'); -webkit-align-self: stretch; -ms-flex-item-align: stretch; align-self: stretch;';
			}
			if ( !empty( $a['padding'] ) ) {
				$html.= 'padding:'. esc_attr($a['padding']).';';
			}
		if ( !empty( $a['bg-color'] || $a['color'] || $a['bg-image'] || $a['padding'] ) ) {
			$html.= '"';
		}
		$html.= '>' . do_shortcode($content) . '</div>';
	return $html;
}

function fourth_shortcode( $atts , $content = null ) {
    $a = shortcode_atts( array( 'class' => '', 'bg-color' => '', 'color' => '', 'bg-image' => '', 'padding' => ''), $atts );
	$html = '<div class="fourth';
		if ( !empty( $a['class'] ) ) {
			$html.= ' '.esc_attr($a['class']).'"';
		} else {
			$html.= '"';
		}
		if ( !empty( $a['bg-color']) || !empty( $a['color']) || !empty( $a['bg-image']) || !empty( $a['padding'] ) ) {
			$html.= ' style="';
		}
			if ( !empty( $a['bg-color'] ) ) {
				$html.= 'background-color:'. esc_attr($a['bg-color']).'; ';
			}
			if ( !empty( $a['color'] ) ) {
				$html.= 'color:'. esc_attr($a['color']).'; ';
			}
			if ( !empty( $a['bg-image'] ) ) {
				$html.= 'background-image:url('. esc_attr($a['bg-image']).'); -webkit-align-self: stretch; -ms-flex-item-align: stretch; align-self: stretch;';
			}
			if ( !empty( $a['padding'] ) ) {
				$html.= 'padding:'. esc_attr($a['padding']).';';
			}
		if ( !empty( $a['bg-color'] || $a['color'] || $a['bg-image'] || $a['padding'] ) ) {
			$html.= '"';
		}
		$html.= '>' . do_shortcode($content) . '</div>';
	return $html;
}

add_action( 'init', 'yttheme_buttons' );
function yttheme_buttons() {
    add_filter( "mce_external_plugins", "yttheme_add_buttons" );
    add_filter( 'mce_buttons', 'yttheme_register_buttons' );
}
function yttheme_add_buttons( $plugin_array ) {
    $plugin_array['yttheme'] = get_template_directory_uri() . '/inc/yt-shortcode.js';
    return $plugin_array;
}
function yttheme_register_buttons( $buttons ) {
    array_push( $buttons, 'Shortcodes' );
    return $buttons;
}

/* Adding More Options to the Wordpress Theme Customizer.
-----------------------------------------------------------------*/

function yttheme_site_options( $wp_customize ) {
	$wp_customize->add_setting( 'yttheme_logo' );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'yttheme_logo', array(
	'label' => __( 'Logo' ),
	'section'  => 'title_tagline',
	'settings' => 'yttheme_logo',
	) ) );
}

add_action('customize_register', 'yttheme_site_options');


/* Enqueuing STUFF!
-----------------------------------------------------------------*/

function yttheme_scripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'js', get_stylesheet_directory_uri(). '/js/js.js', array(), '1.0.0', true );
	wp_enqueue_style( 'css', get_stylesheet_directory_uri().'/inc/css.css' );
}
add_action( 'admin_init', 'yttheme_scripts' );


/* Adding the Menus
-----------------------------------------------------------------*/

add_action( 'admin_menu', 'yttheme_admin' );

function yttheme_admin() {
    /* Base Menu */
    add_submenu_page('themes.php', "Yvonne's Theme", "Yvonne's Theme", 'manage_options', 'yttheme_options', 'yttheme_index');
}

/* OPTION PAGE SETTINGS 
-----------------------------------------------------------------*/

add_action('admin_init', 'yttheme_initialize_options');
function yttheme_initialize_options() {
	if( false == get_option( 'yttheme_options' ) ) {
		add_option( 'yttheme_options', apply_filters( 'yttheme_default_options', yttheme_default_options() ) );
	} // end if
	add_settings_section(
		'options_section',
		__( 'Options', 'yttheme' ),
		'yttheme_callback',
		'yttheme_options'
	);
	
	add_settings_field(
		'Nav',
		__( 'Navigation Bar Position', 'yttheme' ),
		'yttheme_nav_callback',
		'yttheme_options',
		'options_section'
	);
	
	add_settings_field(
		'Sitcky Nav',
		__( 'Sticky Nav', 'yttheme' ),
		'yttheme_stickynav_callback',
		'yttheme_options',
		'options_section'
	);
	
	add_settings_field(
		'Blog Layout',
		__( 'Blog Layout', 'yttheme' ),
		'yttheme_blog_layout_callback',
		'yttheme_options',
		'options_section'
	);
	
	add_settings_field(
		'Related Posts',
		__( 'Related Posts', 'yttheme' ),
		'yttheme_related_posts_callback',
		'yttheme_options',
		'options_section'
	);
	
	add_settings_field(
		'Google Analytics',
		__( 'Google Analytics', 'yttheme' ),
		'yttheme_ga_callback',
		'yttheme_options',
		'options_section'
	);
	
	add_settings_field(
		'Social Share Buttons',
		__( 'Social Share Buttons', 'yttheme' ),
		'yttheme_ss_callback',
		'yttheme_options',
		'options_section'
	);

	register_setting(
		'yttheme_options',
		'yttheme_options'
	);
} // end settings field

add_action('admin_init', 'yttheme_initialize_options_export_import');
function yttheme_initialize_options_export_import() {
	add_settings_section(
		'options_section_export_import',
		__( 'Options Export/Import', 'yttheme' ),
		'yttheme_callback_export_import',
		'yttheme_options_export_import'
	);

	register_setting(
		'yttheme_options_export_import',
		'yttheme_options_export_import'
	);
} // end settings field

/* Register Default Settings
-----------------------------------------------------------------*/

function yttheme_default_options() {
	$defaults = array(
		'nav'				=>	'',
		'stickynav'			=>	'',
		'blog_layout'		=>	'',
		'related_posts'		=>	'',
		'ga'				=>	'',
		'ssbutton'			=>	'',
		'ss_fb'				=>	'',
		'ss_tw'				=>	'',
		'ss_gp'				=>	'',
		'ss_li'				=>	'',
		'ss_pin'			=>	'',
		'ss_email'			=>	''
	);
	return apply_filters( 'yttheme_default_options', $defaults );
}


/* Callbacks
-----------------------------------------------------------------*/

/* Section Callbacks */

	function yttheme_callback() {
		echo '<p>' . __( 'How do you want your site?', 'yttheme' ) . '</p>';
	}


/* Field Callbacks */

/* -- Callbacks -- */

	function yttheme_nav_callback() {
		$options = get_option( 'yttheme_options' );
		
		$html = '<select id="nav" name="yttheme_options[nav]">';
			$html .= '<option value="next"' . selected( $options['nav'], 'next', false) . '>' . __( 'Next to the Logo (75%)', 'yttheme' ) . '</option>';
			$html .= '<option value="below"' . selected( $options['nav'], 'below', false) . '>' . __( 'Below (100%)', 'yttheme' ) . '</option>';
			$html .= '</select>';
			$html .= '<div class="floatimg"><img src="'. get_stylesheet_directory_uri() .'/inc/img/next.png"></div>';
		echo $html;
	}
	
	function yttheme_stickynav_callback() {
		$options = get_option( 'yttheme_options' );

		$sticky = $options['stickynav'];
			$html .= ' <input type="checkbox" id="stickynav" name="yttheme_options[stickynav]" ';
			if ($sticky) {
				$html .= 'checked="checked"';
			}
			$html .= '> Sticky?';
		echo $html;
	}

	function yttheme_blog_layout_callback() {
		$options = get_option( 'yttheme_options' );
		
		$html = '<select id="blog_layout" name="yttheme_options[blog_layout]">';
			$html .= '<option value=" "' . selected( $options['blog_layout'], ' ', false) . '>' . __( 'Default', 'yttheme' ) . '</option>';
			$html .= '<option value="rich"' . selected( $options['blog_layout'], 'rich', false) . '>' . __( 'Image Rich', 'yttheme' ) . '</option>';
			$html .= '<option value="full"' . selected( $options['blog_layout'], 'full', false) . '>' . __( 'Full Card', 'yttheme' ) . '</option>';
			$html .= '<option value="simple"' . selected( $options['blog_layout'], 'simple', false) . '>' . __( 'Simple Card', 'yttheme' ) . '</option>';
			$html .= '<option value="hero"' . selected( $options['blog_layout'], 'hero', false) . '>' . __( 'Hero First', 'yttheme' ) . '</option>';
			$html .= '</select>';
			$html .= '<div class="floatimg" style="margin-top:-125px;"><img src="'. get_stylesheet_directory_uri() .'/inc/img/bloglayout.jpg"></div>';
		echo $html;
	}

	function yttheme_related_posts_callback() {
		$options = get_option( 'yttheme_options' );
		
		$html = '<select id="related_posts" name="yttheme_options[related_posts]">';
			$html .= '<option value="none"' . selected( $options['related_posts'], 'none', false) . '>' . __( 'No related posts', 'yttheme' ) . '</option>';
			$html .= '<option value="below"' . selected( $options['related_posts'], 'below', false) . '>' . __( 'Below posts', 'yttheme' ) . '</option>';
			$html .= '<option value="side"' . selected( $options['related_posts'], 'side', false) . '>' . __( 'On the sidebar', 'yttheme' ) . '</option>';
			$html .= '</select>';
		echo $html;
	}

	function yttheme_ga_callback() {
		$options = get_option( 'yttheme_options' );

		$ga = '';
		if( isset( $options['ga'] ) ) {
			$ga = sanitize_html_class( $options['ga'] );
		}

		echo '<input type="text" id="ga" name="yttheme_options[ga]" value="' . $ga . '" placeholder="UA-xxxxxxxx-xx" />';
	}

	function yttheme_ss_callback() {
		$options = get_option( 'yttheme_options' );

		$ssbutton = $options['ssbutton'];
			$html .= '<input type="checkbox" id="ssbutton" name="yttheme_options[ssbutton]"';
			if ($ssbutton) {
				$html .= 'checked="checked"';
			}
			$html .= '> Social Share Buttons?<p class="ss" style="display:none">';

		$facebook = $options['ss_fb'];
			$html .= ' <input type="checkbox" id="ss_fb" name="yttheme_options[ss_fb]"';
			if ($facebook) {
				$html .= 'checked="checked"';
			}
			$html .= '> Facebook? &nbsp; &nbsp;';

		$twitter = $options['ss_tw'];
			$html .= ' <input type="checkbox" id="ss_tw" name="yttheme_options[ss_tw]"';
			if ($twitter) {
				$html .= 'checked="checked"';
			}
			$html .= '> Twitter? &nbsp; &nbsp;';

		$gplus = $options['ss_gp'];
			$html .= ' <input type="checkbox" id="ss_gp" name="yttheme_options[ss_gp]"';
			if ($gplus) {
				$html .= 'checked="checked"';
			}
			$html .= '> Google+? &nbsp; &nbsp;';

		$linkedin = $options['ss_li'];
			$html .= ' <input type="checkbox" id="ss_li" name="yttheme_options[ss_li]"';
			if ($linkedin) {
				$html .= 'checked="checked"';
			}
			$html .= '> LinkedIn? &nbsp; &nbsp;';

		$pinterest = $options['ss_pin'];
			$html .= ' <input type="checkbox" id="ss_pin" name="yttheme_options[ss_pin]"';
			if ($pinterest) {
				$html .= 'checked="checked"';
			}
			$html .= '> Pinterest? &nbsp; &nbsp;';

		$email = $options['ss_email'];
			$html .= ' <input type="checkbox" id="ss_email" name="yttheme_options[ss_email]"';
			if ($email) {
				$html .= 'checked="checked"';
			}
			$html .= '> Email?</p>';
		echo $html;

	}

	function yttheme_callback_export_import() {

		echo '<table><tr><td style="width: 50%;vertical-align: text-top;"><p>Export Settings (as a .json file.)</p>
			<form method="post">
				<p><input type="hidden" name="yttheme_action" value="export_settings" /></p>
				<p>';
					wp_nonce_field( 'yttheme_export_nonce', 'yttheme_export_nonce' );
					submit_button( __( 'Export' ), 'secondary', 'submit', false );
		echo '</p>
			</form></td>
			<td><p>Import Settings</p>
			<form method="post" enctype="multipart/form-data">
				<p>
					<input type="file" name="import_file"/>
				</p>
				<p>
					<input type="hidden" name="yttheme_action" value="import_settings" />';
					wp_nonce_field( 'yttheme_import_nonce', 'yttheme_import_nonce' );
					submit_button( __( 'Import' ), 'secondary', 'submit', false );
		echo '	</p>
			</form></td></tr></table>';
	}



/* Import/Export Settings thingum
-----------------------------------------------------------------*/
/* -- Starting it, json file generation -- */

// function yttheme_settings_export() {

// 	if( empty( $_POST['yttheme_action'] ) || 'export_settings' != $_POST['yttheme_action'] )
// 		return;

// 	if( ! wp_verify_nonce( $_POST['yttheme_export_nonce'], 'yttheme_export_nonce' ) )
// 		return;

// 	if( ! current_user_can( 'manage_options' ) )
// 		return;

// 	$settings = get_option( 'yttheme_options' );

// 	ignore_user_abort( true );

// 	nocache_headers();
// 	header( 'Content-Type: application/json; charset=utf-8' );
// 	header( 'Content-Disposition: attachment; filename=yttheme-settings-export-' . date( 'm-d-Y' ) . '.json' );
// 	header( "Expires: 0" );

// 	echo json_encode( $settings );
// 	exit;
// }
// add_action( 'admin_init', 'yttheme_settings_export' );



/* -- importing -- */

// function yttheme_process_settings_import() {

// 	if( empty( $_POST['yttheme_action'] ) || 'import_settings' != $_POST['yttheme_action'] )
// 		return;

// 	if( ! wp_verify_nonce( $_POST['yttheme_import_nonce'], 'yttheme_import_nonce' ) )
// 		return;

// 	if( ! current_user_can( 'manage_options' ) )
// 		return;

// 	$extension = end( explode( '.', $_FILES['import_file']['name'] ) );

// 	if( $extension != 'json' ) {
// 		wp_die( __( 'Please upload a valid .json file' ) );
// 	}

// 	$import_file = $_FILES['import_file']['tmp_name'];

// 	if( empty( $import_file ) ) {
// 		wp_die( __( 'Please upload a file to import' ) );
// 	}

// 	// Retrieve the settings from the file and convert the json object to an array.
// 	$settings = (array) json_decode( file_get_contents( $import_file ) );

// 	update_option( 'yttheme_settings', $settings );

// 	wp_safe_redirect( admin_url( 'themes.php?page=yttheme_options&tab=display_options' ) ); exit;

// }



/* Display Page
-----------------------------------------------------------------*/

/**
 * Renders a simple page to display for the theme menu defined above.
 */
function yttheme_index() {
?>

	<!-- Create a header in the default WordPress 'wrap' container -->
	<div class="wrap">

		<h2><?php _e( 'Yvonne\'s Theme Options', 'yttheme' ); ?></h2>
		<?php settings_errors(); ?>
		
		<?php if( isset( $_GET[ 'tab' ] ) ) {
			$active_tab = $_GET[ 'tab' ];
		} else if( $active_tab == 'shortcode' ) {
			$active_tab = 'shortcode';
		} else {
			$active_tab = 'display_options';
		} // end if/else ?>

		<h2 class="nav-tab-wrapper">
			<a href="?page=yttheme_options&tab=display_options" class="nav-tab <?php echo $active_tab == 'display_options' ? 'nav-tab-active' : ''; ?>">Theme Options</a>
<!-- 			<a href="?page=yttheme_options&tab=shortcode" class="nav-tab <?php echo $active_tab == 'shortcode' ? 'nav-tab-active' : ''; ?>">Shortcode Guide</a>
 -->		</h2>
		
		<form method="post" action="options.php">

		<?php
			if( $active_tab == 'display_options' ) {
				settings_fields( 'yttheme_options' );
				do_settings_sections( 'yttheme_options' );
				submit_button();
				// settings_fields( 'yttheme_options_export_import' );
				// do_settings_sections( 'yttheme_options_export_import' );
			// } else { ?>
<!-- 				<h2> DELETE "FULL" MENTIONS Shortcodes</h2>
				<p>Row - <pre>[row]Your Content[/row]</pre>
				<p>Full Width - <pre>[full]Your Content[/full]</pre></p>
				<p>Half - <pre>[half]Your Content[/half]</pre></p>
				<p>Third - <pre>[third]Your Content[/third]</pre></p>
				<p>Fourth - <pre>[fourth]Your Content[/fourth]</pre></p>
				<p>You'll need to use the Full Width template with the [row] shortcode in order to get . You can put other shortcodes within the row shortcode.</p>
				<p><strong>Attributes:</strong> color, bg-color, bg-image, and padding. Hexcodes, color names, and percentages are ok!</p><br/>
				<h2>Example:</h2><pre>[row]Your Content[/row]</pre>
					<img src="<?php //echo get_stylesheet_directory_uri(); ?>/inc/img/short1.png" class="short"></p>
				<p>[row][full][/full][/row] would mean that there is space between the row and the content.</p>

				<h2>Example:</h2>
				<pre>[row bg-color="cornflowerblue"][full]Are creatures of the cosmos!... little good evidence?[/full][/row]</pre>
					<img src="<?php //echo get_stylesheet_directory_uri(); ?>/inc/img/short4.png" class="short"></p>
				<pre>[row bg-color="steelblue"]Are creatures of the cosmos!... little good evidence?[/row]</pre>
					<img src="<?php //echo get_stylesheet_directory_uri(); ?>/inc/img/short5.png" class="short"></p>

				<h2>Example:</h2>
					<pre>[row bg-color="darkslateblue" padding=0][full padding=0][half padding=110px bg-image="wombat_image_url"]&#60;h1&#62;Your&#60;/h1&#62;[/half][fourth color="pink"]Content[/fourth][fourth color="#000" ]Astonishment.[/fourth][/full][/row]</pre>
					<img src="<?php //echo get_stylesheet_directory_uri(); ?>/inc/img/short2.png" class="short">
					<br/><br/>

				<p>[row][/row]</p>
				<h2>Example:</h2>
					<pre>[row bg-color="#666" color="#fff" padding="0"][half bg-image="wombat_image_url"]Light years![/half][half]Emerged into consciousness a billion trillion realm of the galaxies, Sea of Tranquility globular star cluster brain is the seed of intelligence permanence of the stars Rig Veda, paroxysm of global death Drake Equation tingling of the spine science cosmic fugue.[/half][/row]</pre>
					<img src="<?php //echo get_stylesheet_directory_uri(); ?>/inc/img/short3.png" class="short"> -->
			<?php } // end if/else
		?>

		</form>
		
	</div>
<?php
} ?>