<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Yvonne's Theme 1.0
 */

$video = get_post_meta( get_queried_object_id(), 'bgvideo', true );
$featured = has_post_thumbnail();
$color = get_post_meta( get_queried_object_id(), 'textcolor', true );
if ( !$video ) {
	$bg = get_post_meta( get_queried_object_id(), 'bgcolor', true );
	$shadow = get_post_meta( get_queried_object_id(), 'shadow', true );
}
get_header(); ?>
</header><!-- .site-header -->



<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div style="<?php
			if ( $bg ) { echo 'background-color: ' . $bg . ';'; }
			if ( $color ) { echo 'color: ' . $color . ';'; }
			if ( $featured ) {
				echo 'background-image: url(';
				the_post_thumbnail_url();
				echo ');';
			} 
		?>" class="background<?php
			if ( $video ) { echo ' video'; }
		?>">

		<?php if ( $video ) {

			if (strpos($video, '.webm') == false && strpos($video, '.mp4') == false) {
				echo '<h5 class="warning">Use webm or mp4 files please.</h5>';
			} else {
				$vidstring = chop($video, '.webm');
				$vidstring = chop($vidstring, '.mp4'); ?>
				<button id="vidpause"><i class="fa fa-pause" aria-hidden="true"></i></button>
				<video playsinline autoplay muted loop id="bgvid">
					<source src="<?php echo $vidstring; ?>.webm" type="video/webm">
					<source src="<?php echo $vidstring; ?>.mp4" type="video/mp4">
				</video>
			<?php }

		} ?>

		<div class="site-inner"><?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'page' );
			endwhile;
		?></div></div><?php if ( $shadow ) { echo '<hr class="shadow"/>'; } ?>

		<?php
		// Set up the objects needed
		$my_wp_query = new WP_Query();
		$all_wp_pages = $my_wp_query->query(array('post_type' => 'page','order' => 'ASC','orderby' => 'menu_order'));

		// Get the page as an Object
		$home = get_option('page_on_front');
		$home_children = get_page_children( $home, $all_wp_pages );

		foreach ($home_children as $home_child) {
			$id = $home_child->ID;
			$slug = $home_child->post_name;
			$url = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), "full" )[0];
			$bg = get_post_meta( $id, 'bgcolor', true );
			$color = get_post_meta( $id, 'textcolor', true );
			$shadow = get_post_meta( $id, 'shadow', true );
			?>
			<div id="<?php echo $slug; ?>" class="background"
			<?php if ( $url || $bg ) {
				echo 'style="';
					if ( $url ) { echo 'background-image: url('. $url .');'; }
					if ( $bg ) { echo ' background-color:'. $bg .';'; }
					if ( $color ) { echo ' color:'. $color .';'; }
				echo '"';
			} ?>><div class="site-inner">
				<?php echo apply_filters('the_content', $home_child->post_content); ?>
			</div><?php if ( $shadow ) { echo '<div class="shadow"></div>'; } ?></div>
		<?php } ?>

	</main><!-- .site-main -->

</div><!-- .content-area -->
<?php if ( $video ) { ?>
	<script>
var vid = document.getElementById("bgvid"),
pauseButton = document.getElementById("vidpause");
function vidFade() {
    vid.classList.add("stopfade");
}
vid.addEventListener('ended', function() {
    // only functional if "loop" is removed 
     vid.pause();
	// to capture IE10
	vidFade();
});
pauseButton.addEventListener("click", function() {
    vid.classList.toggle("stopfade");
	if (vid.paused) {
vid.play();
		pauseButton.innerHTML = '<i class="fa fa-pause" aria-hidden="true"></i>';
	} else {
        vid.pause();
        pauseButton.innerHTML = '<i class="fa fa-play" aria-hidden="true"></i>';
	}
})
</script>
<?php }
get_footer(); ?>