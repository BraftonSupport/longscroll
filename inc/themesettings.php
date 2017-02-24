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
		if ( !empty( $a['bg-color'] ) || !empty( $a['color'] ) || !empty( $a['bg-image'] ) || !empty( $a['padding'] ) ) {
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
		if ( !empty( $a['bg-color'] ) || !empty( $a['color'] ) || !empty( $a['bg-image'] ) || !empty( $a['padding'] ) ) {
			$html.= '"';
		}
		$html.= '>' . do_shortcode($content) . '</div>';
	return $html;
}

add_action( 'init', 'divingbell_buttons' );
function divingbell_buttons() {
    add_filter( "mce_external_plugins", "divingbell_add_buttons" );
    add_filter( 'mce_buttons', 'divingbell_register_buttons' );
}
function divingbell_add_buttons( $plugin_array ) {
    $plugin_array['divingbell'] = get_template_directory_uri() . '/inc/yt-shortcode.js';
    return $plugin_array;
}
function divingbell_register_buttons( $buttons ) {
    array_push( $buttons, 'Shortcodes' );
    return $buttons;
}

/* Adding More Options to the Wordpress Theme Customizer.
-----------------------------------------------------------------*/

/* Adding the logo to the settings page*/

function divingbell_site_options( $wp_customize ) {
	$wp_customize->add_setting( 'divingbell_logo' );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'divingbell_logo', array(
	'label' => __( 'Logo' ),
	'section'  => 'title_tagline',
	'settings' => 'divingbell_logo',
	) ) );
}

add_action('customize_register', 'divingbell_site_options');

/* Logo size */

function divingbell_get_image_id($image_url) {
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
        return $attachment[0]; 
}

/* Enqueuing STUFF!
-----------------------------------------------------------------*/

function divingbell_scripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'js', get_stylesheet_directory_uri(). '/js/js.js', array(), '1.0.0', true );
	wp_enqueue_style( 'css', get_stylesheet_directory_uri().'/inc/css.css' );
}
add_action( 'admin_init', 'divingbell_scripts' );


/* Adding the Menus
-----------------------------------------------------------------*/

add_action( 'admin_menu', 'divingbell_admin' );

function divingbell_admin() {
    /* Base Menu */
    add_theme_page("Diving Bell Options", "Diving Bell Theme", 'manage_options', 'divingbell_options', 'divingbell_index');
}

/* OPTION PAGE SETTINGS 
-----------------------------------------------------------------*/

add_action('admin_init', 'divingbell_initialize_options');
function divingbell_initialize_options() {
	if( false == get_option( 'divingbell_options' ) ) {
		add_option( 'divingbell_options', apply_filters( 'divingbell_default_options', divingbell_default_options() ) );
	} // end if
	add_settings_section(
		'options_section',
		__( 'Options', 'divingbell' ),
		'divingbell_callback',
		'divingbell_options'
	);
	
	add_settings_field(
		'Nav',
		__( 'Navigation Bar Position', 'divingbell' ),
		'divingbell_nav_callback',
		'divingbell_options',
		'options_section'
	);
	
	add_settings_field(
		'Sticky Nav',
		__( 'Sticky Nav', 'divingbell' ),
		'divingbell_stickynav_callback',
		'divingbell_options',
		'options_section'
	);
	
	add_settings_field(
		'Blog Layout',
		__( 'Blog Layout', 'divingbell' ),
		'divingbell_blog_layout_callback',
		'divingbell_options',
		'options_section'
	);
	
	add_settings_field(
		'Related Posts',
		__( 'Related Posts', 'divingbell' ),
		'divingbell_related_posts_callback',
		'divingbell_options',
		'options_section'
	);
	
	add_settings_field(
		'Google Analytics',
		__( 'Google Analytics', 'divingbell' ),
		'divingbell_ga_callback',
		'divingbell_options',
		'options_section'
	);
	
	add_settings_field(
		'Social Share Buttons',
		__( 'Social Share Buttons', 'divingbell' ),
		'divingbell_ss_callback',
		'divingbell_options',
		'options_section'
	);

	register_setting(
		'divingbell_options',
		'divingbell_options'
	);
} // end settings field

add_action('admin_init', 'divingbell_initialize_options_export_import');
function divingbell_initialize_options_export_import() {
	add_settings_section(
		'options_section_export_import',
		__( '', 'divingbell' ),
		'divingbell_callback_export_import',
		'divingbell_options_export_import'
	);

	register_setting(
		'divingbell_options_export_import',
		'divingbell_options_export_import'
	);
} // end settings field

/* Register Default Settings
-----------------------------------------------------------------*/

function divingbell_default_options() {
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
	return apply_filters( 'divingbell_default_options', $defaults );
}


/* Callbacks
-----------------------------------------------------------------*/

/* Section Callbacks */

	function divingbell_callback() {
		echo '<p>' . __( 'How do you want your site?', 'divingbell' ) . '</p>';
	}


/* Field Callbacks */

/* -- Callbacks -- */

	function divingbell_nav_callback() {
		$options = get_option( 'divingbell_options' );
		
		$html = '<select id="nav" name="divingbell_options[nav]">';
			$html .= '<option value="next"' . selected( $options['nav'], 'next', false) . '>' . __( 'Next to the Logo (75%)', 'divingbell' ) . '</option>';
			$html .= '<option value="below"' . selected( $options['nav'], 'below', false) . '>' . __( 'Below (100%)', 'divingbell' ) . '</option>';
			$html .= '</select>';
			$html .= '<div class="floatimg"><img src="'. get_template_directory_uri() .'/inc/img/next.png"></div>';
		echo $html;
	}
	
	function divingbell_stickynav_callback() {
		$options = get_option( 'divingbell_options' );

		$sticky = $options['stickynav'];
			$html .= ' <input type="checkbox" id="stickynav" name="divingbell_options[stickynav]" ';
			if ($sticky) {
				$html .= 'checked="checked"';
			}
			$html .= '> Sticky?';
		echo $html;
	}

	function divingbell_blog_layout_callback() {
		$options = get_option( 'divingbell_options' );
		
		$html = '<select id="blog_layout" name="divingbell_options[blog_layout]">';
			$html .= '<option value="hero"' . selected( $options['blog_layout'], 'hero', false) . '>' . __( 'Hero First', 'divingbell' ) . '</option>';
			$html .= '<option value="rich"' . selected( $options['blog_layout'], 'rich', false) . '>' . __( 'Image Rich', 'divingbell' ) . '</option>';
			$html .= '<option value="full"' . selected( $options['blog_layout'], 'full', false) . '>' . __( 'Full Card', 'divingbell' ) . '</option>';
			$html .= '<option value="simple"' . selected( $options['blog_layout'], 'simple', false) . '>' . __( 'Simple Card', 'divingbell' ) . '</option>';
			$html .= '</select>';
			$html .= '<div class="floatimg" style="margin-top:-125px;"><img src="'. get_template_directory_uri() .'/inc/img/bloglayout.jpg"></div>';
		echo $html;
	}

	function divingbell_related_posts_callback() {
		$options = get_option( 'divingbell_options' );
		
		$html = '<select id="related_posts" name="divingbell_options[related_posts]">';
			$html .= '<option value="none"' . selected( $options['related_posts'], 'none', false) . '>' . __( 'No related posts', 'divingbell' ) . '</option>';
			$html .= '<option value="below"' . selected( $options['related_posts'], 'below', false) . '>' . __( 'Below posts', 'divingbell' ) . '</option>';
			$html .= '<option value="side"' . selected( $options['related_posts'], 'side', false) . '>' . __( 'On the sidebar', 'divingbell' ) . '</option>';
			$html .= '</select>';
		echo $html;
	}

	function divingbell_ga_callback() {
		$options = get_option( 'divingbell_options' );

		$ga = '';
		if( isset( $options['ga'] ) ) {
			$ga = sanitize_html_class( $options['ga'] );
		}

		echo '<input type="text" id="ga" name="divingbell_options[ga]" value="' . $ga . '" placeholder="UA-xxxxxxxx-xx" />';
	}

	function divingbell_ss_callback() {
		$options = get_option( 'divingbell_options' );

		$ssbutton = $options['ssbutton'];
			$html .= '<input type="checkbox" id="ssbutton" name="divingbell_options[ssbutton]"';
			if ($ssbutton) {
				$html .= 'checked="checked"';
			}
			$html .= '> Social Share Buttons?<p class="ss" style="display:none">';

		$facebook = $options['ss_fb'];
			$html .= ' <input type="checkbox" id="ss_fb" name="divingbell_options[ss_fb]"';
			if ($facebook) {
				$html .= 'checked="checked"';
			}
			$html .= '> Facebook? &nbsp; &nbsp;';

		$twitter = $options['ss_tw'];
			$html .= ' <input type="checkbox" id="ss_tw" name="divingbell_options[ss_tw]"';
			if ($twitter) {
				$html .= 'checked="checked"';
			}
			$html .= '> Twitter? &nbsp; &nbsp;';

		$gplus = $options['ss_gp'];
			$html .= ' <input type="checkbox" id="ss_gp" name="divingbell_options[ss_gp]"';
			if ($gplus) {
				$html .= 'checked="checked"';
			}
			$html .= '> Google+? &nbsp; &nbsp;';

		$linkedin = $options['ss_li'];
			$html .= ' <input type="checkbox" id="ss_li" name="divingbell_options[ss_li]"';
			if ($linkedin) {
				$html .= 'checked="checked"';
			}
			$html .= '> LinkedIn? &nbsp; &nbsp;';

		$pinterest = $options['ss_pin'];
			$html .= ' <input type="checkbox" id="ss_pin" name="divingbell_options[ss_pin]"';
			if ($pinterest) {
				$html .= 'checked="checked"';
			}
			$html .= '> Pinterest? &nbsp; &nbsp;';

		$email = $options['ss_email'];
			$html .= ' <input type="checkbox" id="ss_email" name="divingbell_options[ss_email]"';
			if ($email) {
				$html .= 'checked="checked"';
			}
			$html .= '> Email?</p>';
		echo $html;

	}

	function divingbell_callback_export_import() {?>
		<h4>Backup/Export</h4>
		<p>Here are the stored settings for the current theme:</p>
		<p><textarea class="code" rows="5" cols="100" onclick="this.select()"><?php echo serialize(get_option( 'divingbell_options' )); ?></textarea></p>
		<p><a href="?page=divingbell_options&tab=import_settings&action=download" class="button-secondary">Download as file</a></p>
		<h4>Restore/Import</h4>
		<p><label class="description" for="upload">Restore a previous backup</label></p>
		<p><input type="file" name="file" /> <input type="submit" name="upload" id="upload" class="button-primary" value="Upload file" /></p>
		<?php if (function_exists('wp_nonce_field')) wp_nonce_field('divingbell_restoreOptions', 'divingbell_restoreOptions'); ?>
	<?php
	}



/* Import/Export Settings thingum
-----------------------------------------------------------------*/

function divingbell_settings_export() {
	if (isset($_GET['action']) && ($_GET['action'] == 'download')) {
		header("Cache-Control: public, must-revalidate");
		header("Pragma: hack");
		header("Content-Type: text/plain");
		header('Content-Disposition: attachment; filename="theme-options-'.date("dMy").'.dat"');
		echo serialize(get_option( 'divingbell_options' ));
		die();
	}
	if (isset($_POST['upload']) && check_admin_referer('divingbell_restoreOptions', 'divingbell_restoreOptions')) {
		if ($_FILES["file"]["error"] > 0) {
		} else {
			$options = unserialize(file_get_contents($_FILES["file"]["tmp_name"]));
			if ($options) {
				update_option("divingbell_options", $options);
			}
		}
		wp_redirect(admin_url('themes.php?page=divingbell_options&tab=import_settings'));
		exit;
	}
}
add_action( 'admin_init', 'divingbell_settings_export' );




/* Display Page
-----------------------------------------------------------------*/

/**
 * Renders a simple page to display for the theme menu defined above.
 */
function divingbell_index() {
?>

	<!-- Create a header in the default WordPress 'wrap' container -->
	<div class="wrap">

		<h2><?php _e( 'Diving Bell Theme Options', 'divingbell' ); ?></h2>
		<?php settings_errors(); ?>
		
		<?php if( isset( $_GET[ 'tab' ] ) ) {
			$active_tab = $_GET[ 'tab' ];
		} else if( $active_tab == 'import_settings' ) {
			$active_tab = 'import_settings';
		} else if( $active_tab == 'shortcode' ) {
			$active_tab = 'shortcode';
		} else {
			$active_tab = 'display_options';
		} // end if/else ?>

		<h2 class="nav-tab-wrapper">
			<a href="?page=divingbell_options&tab=display_options" class="nav-tab <?php echo $active_tab == 'display_options' ? 'nav-tab-active' : ''; ?>">Theme Options</a>
			<a href="?page=divingbell_options&tab=import_settings" class="nav-tab <?php echo $active_tab == 'import_settings' ? 'nav-tab-active' : ''; ?>">Options Export/Import</a>
 			<a href="?page=divingbell_options&tab=shortcode" class="nav-tab <?php echo $active_tab == 'shortcode' ? 'nav-tab-active' : ''; ?>">Shortcode Guide</a>
		</h2>

		<form method="post" action="options.php"<?php if( $active_tab == 'import_settings' ) { echo ' enctype="multipart/form-data"'; } ?> >
		<?php
			if( $active_tab == 'display_options' ) {
				settings_fields( 'divingbell_options' );
				do_settings_sections( 'divingbell_options' );
				submit_button();
			} else if( $active_tab == 'import_settings' ) {
				settings_fields( 'divingbell_options_export_import' );
				do_settings_sections( 'divingbell_options_export_import' );
			} else { ?>
				<h2>Team Shortcode</h2>
					<pre>[team]</pre>
				<h2>Shortcode Examples</h2>
				<p>Row - <pre>[row]Your Content[/row]</pre>
				<p>Half - <pre>[half]Your Content[/half]</pre></p>
				<p>Third - <pre>[third]Your Content[/third]</pre></p>
				<p>Fourth - <pre>[fourth]Your Content[/fourth]</pre></p>
				<p><strong>Attributes:</strong> class, color, bg-color, bg-image, and padding. Hexcodes, color names, and percentages are ok!</p><br/>
				<h2>Examples:</h2>
				<pre>[row]text[/row]</pre>
					<img src="<?php echo get_template_directory_uri(); ?>/inc/img/short1.png" class="short">
				<pre>[row bg-color="steelblue"]Galaxies quis... bits of moving fluff?[/row]</pre>
					<img src="<?php echo get_template_directory_uri(); ?>/inc/img/short2.png" class="short">
				<pre>[row bg-color="steelblue" padding="50px"]Galaxies quis... bits of moving fluff?[/row]</pre>
					<img src="<?php echo get_template_directory_uri(); ?>/inc/img/short2a.png" class="short">
				<pre>[row][half]Duis aute irure dolor... fugiat nulla pariatur.[/half][third]Galaxies quis... commodo consequat.[/third][/row]</pre>
					<img src="<?php echo get_template_directory_uri(); ?>/inc/img/short3.png" class="short">
				<pre>[row bg-color="cornflowerblue"][half]Galaxies quis... commodo consequat.[/half][fourth bg-color="lightblue" padding="25px"]Excepteur sint... moving fluff?[/fourth][fourth]Duis aute... nulla pariatur.[/fourth][/row]</pre>
					<img src="<?php echo get_template_directory_uri(); ?>/inc/img/short4.png" class="short">
				<pre>[half bg-color="cornflowerblue"]Galaxies quis... commodo consequat.[/half][fourth bg-color="lightblue" padding="25px"]Excepteur sint... moving fluff?[/fourth][fourth bg-color="cornflowerblue"]Duis aute... fugiat nulla pariatur.[/fourth]</pre>
					<img src="<?php echo get_template_directory_uri(); ?>/inc/img/short5.png" class="short">
				<pre>[row bg-color="darkslateblue" padding=0][half color="#fff" padding=110px bg-image="wombat url"]&lt;h1&gt;Your&lt;/h1&gt;[/half][fourth color="pink"]Content[/fourth][fourth color="#000" ]Astonishment.[/fourth][/row]</pre>
					<img src="<?php echo get_template_directory_uri(); ?>/inc/img/short6.png" class="short">
				<pre>[row bg-color="#666" color="#fff" padding="0"][half bg-image="wombat url"]Light years![/half][half]Emerged into... cosmic fugue.[/half][/row]</pre>
					<img src="<?php echo get_template_directory_uri(); ?>/inc/img/short7.png" class="short">

			<?php } ?>
		</form>
	</div>
<?php
} ?>