<?php

add_shortcode('thicbox-function', function(){
	add_thickbox();
$image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
	?>
	<div id="thicbox-<?php echo get_the_ID() ?>" style="display:none;">
     <p>
<?php
$images = get_post_meta( get_the_ID(), 'popup_gallery', true);
foreach($images as $true_image):
$image_link = wp_get_attachment_url( $true_image );
?><img src="<?php echo $image_link ?>" style="width: 100%; height: auto;"><?php
endforeach;
?>
<?php if( false ) : ?>
<img src="<?php echo $image ?>" style="width: 100%; height: auto;">
<?php endif; ?>
<?php
$link = get_post_meta( get_the_ID(), 'link', true);
?>
<center><a href="<?php echo $link; ?>"><button class="mbtn">Original Article</button></a></center>
     </p>
</div>

<style>
	.mbtn{
		border: none;
		background: #000;
		border-radius: 0px;
		color: #fff !important;
		font-weight: bold !important;
		font-family: Heebo !important;
		text-decoration: none !important;
	}
	.mbtn:hover,.mbtn:focus,.mbtn:active{
		background: var( --e-global-color-ddb34d7 ) !important;
		color: #000 !important;
	}
</style>

<a href="#TB_inline?&width=600&height=550&inlineId=thicbox-<?php echo get_the_ID() ?>" class="thickbox">
<?php if( $image ) : ?>
<img src="<?php echo $image ?>">
<?php endif; ?>
</a>
<?php
});
?>

<!-- Second update -->

<?php
add_shortcode('thicbox-function', function(){
	add_thickbox();
$image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
	?>
	<div id="thicbox-<?php echo get_the_ID() ?>" style="display:none;">
<?php
$images = get_post_meta( get_the_ID(), 'popup_gallery', true);
foreach($images as $true_image):
$image_link = wp_get_attachment_url( $true_image );
?><div><img src="<?php echo $image_link ?>" style="width: 100%; height: auto;"></div><?php
endforeach;
?>
<?php if( false ) : ?>
<img src="<?php echo $image ?>" style="width: 100%; height: auto;">
<?php endif; ?>
<?php
$original_link = get_post_meta( get_the_ID(), 'original_link', true);
?>
<div>
<br>
<center><a href="<?php echo $original_link; ?>"><button class="mbtn">ORIGINAL ARTICLE</button></a></center>
</div>
</div>

<style>
	.mbtn{
		border: none;
		background: #000;
		border-radius: 0px;
		color: #fff !important;
		font-weight: bold !important;
		font-family: Heebo !important;
		text-decoration: none !important;
	}
	.mbtn:hover,.mbtn:focus,.mbtn:active{
		background: var( --e-global-color-ddb34d7 ) !important;
		color: #000 !important;
	}
</style>

<a href="#elementor-action%3Aaction%3Dpopup%3Aopen%26settings%3DeyJpZCI6IjIyNTY2IiwidG9nZ2xlIjpmYWxzZX0%3D" onclick="showGallery<?php echo get_the_ID() ?>()">
<?php if( $image ) : ?>
<img src="<?php echo $image ?>">
<?php endif; ?>
</a>
<script>
function showGallery<?php echo get_the_ID() ?>(){
	setTimeout(function(){
		jQuery('.dialog-message.dialog-lightbox-message .elementor-location-popup').html(jQuery('#thicbox-<?php echo get_the_ID() ?>').html());
	},500);
}
</script>
<?php
// https://www.mischmisch.com/?post_type=elementor_library&p=22548&preview=true#elementor-action%3Aaction%3Dpopup%3Aopen%26settings%3DeyJpZCI6IjIyNTY2IiwidG9nZ2xlIjpmYWxzZX0%3D
// .elementor-widget-container .ae-masonry-no.ae-grid-wrapper .ae-grid .ae-grid-item .ae-grid-item-inner
});