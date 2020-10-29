<!DOCTYPE html>
<!--// OPEN HTML //-->
<html <?php language_attributes(); ?> class="no-js">

<head>


	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:ital,wght@0,200;0,500;0,700;1,900&display=swap" rel="stylesheet">
	
	<script src="https://kit.fontawesome.com/63b62ed9a7.js" crossorigin="anonymous"></script>
	<?php
	$options = get_option('borntogive_options');
	/** Theme layout design * */
	$bodyClass = (isset($options['site_layout']) && $options['site_layout'] == 'boxed') ? ' boxed' : '';
	$style = '';
	if (isset($options['site_layout']) && $options['site_layout'] == 'boxed') {
		if (!empty($options['upload-repeatable-bg-image']['id'])) {
			$style = ' style="background-image:url(' . $options['upload-repeatable-bg-image']['url'] . '); background-repeat:repeat; background-size:auto;"';
		} else if (!empty($options['full-screen-bg-image']['id'])) {
			$style = ' style="background-image:url(' . $options['full-screen-bg-image']['url'] . '); background-repeat: no-repeat; background-size:cover;"';
		} else if (!empty($options['repeatable-bg-image'])) {
			$style = ' style="background-image:url(' . get_template_directory_uri() . '/assets/images/patterns/' . $options['repeatable-bg-image'] . '); background-repeat:repeat; background-size:auto;"';
		}
	}
	?>
	<!--// SITE META //-->
	<meta charset="<?php bloginfo('charset'); ?>" />
	<!-- Mobile Specific Metas
    ================================================== -->
	<?php $switch_responsive = (isset($options['switch-responsive'])) ? $options['switch-responsive'] : '';
	$switch_zoom_pinch = (isset($options['switch-zoom-pinch'])) ? $options['switch-zoom-pinch'] : '';
	if ($switch_responsive == 1) { ?>
		<?php if ($switch_zoom_pinch == 1) { ?>
			<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0">
		<?php } else { ?>
			<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
		<?php } ?>
		<meta name="format-detection" content="telephone=no">
	<?php } ?>
	<!--// PINGBACK & FAVICON //-->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php if (function_exists('wp_site_icon') && has_site_icon()) {
		echo '<link rel="shortcut icon" href="' . get_site_icon_url() . '" />';
	} else {
		if (isset($options['custom_favicon']) && $options['custom_favicon'] != "") { ?>
			<link rel="shortcut icon" href="<?php echo esc_url($options['custom_favicon']['url']); ?>" />
		<?php
	}
}
if (isset($options['iphone_icon']) && $options['iphone_icon'] != "") { ?>
		<link rel="apple-touch-icon-precomposed" href="<?php echo esc_url($options['iphone_icon']['url']); ?>">
	<?php
}
if (isset($options['iphone_icon_retina']) && $options['iphone_icon_retina'] != "") { ?>
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo esc_url($options['iphone_icon_retina']['url']); ?>">
	<?php
}
if (isset($options['ipad_icon']) && $options['ipad_icon'] != "") { ?>
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo esc_url($options['ipad_icon']['url']); ?>">
	<?php
}
if (isset($options['ipad_icon_retina']) && $options['ipad_icon_retina'] != "") { ?>
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo esc_url($options['ipad_icon_retina']['url']); ?>">
	<?php
}
$header_style = (isset($options['header_layout'])) ? $options['header_layout'] : '1';
?>
	<?php
	$space_beforeheader = (isset($options['space-before-head'])) ? $options['space-before-head'] : '';
	$SpaceBeforeHead = $space_beforeheader;
	echo '' . $SpaceBeforeHead;
	?>
	<?php //  WORDPRESS HEAD HOOK 
	wp_head(); ?>
</head>
<!--// CLOSE HEAD //-->

<body <?php body_class($bodyClass . ' header-style' . $header_style . '');
		echo '' . $style;  ?>>
	<?php if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    } ?>
	<?php
	// Page Style Options
	if (is_home()) {
		$id = get_option('page_for_posts');
	} elseif (class_exists('buddypress') && is_buddypress()) {
		$component = bp_current_component();
		$bp_pages = get_option('bp-pages');
		$id = $bp_pages[$component];
	} else {
		$id = get_the_ID();
	}
	$content_top_padding = get_post_meta($id, 'borntogive_content_padding_top', true);
	$content_bottom_padding = get_post_meta($id, 'borntogive_content_padding_bottom', true);
	$content_width = get_post_meta($id, 'borntogive_content_width', true);
	$page_header_show = get_post_meta($id, 'borntogive_page_header_show_hide', true);
	$page_social_show = get_post_meta($id, 'borntogive_pages_social_show', true);
	$page_title_show = get_post_meta($id, 'borntogive_pages_title_show', true);
	$page_body_bg_color = get_post_meta($id, 'borntogive_pages_body_bg_color', true);
	$page_body_bg_image = get_post_meta($id, 'borntogive_pages_body_bg_image', true);
	$page_body_bg_image_src = wp_get_attachment_image_src($page_body_bg_image, 'full', '', array());
	$page_body_bg_size = get_post_meta($id, 'borntogive_pages_body_bg_wide', true);
	if ($page_body_bg_size == 0) {
		$page_body_bg_size_result = 'auto';
		$page_body_bg_size_attachment = 'scroll';
	} else {
		$page_body_bg_size_result = 'cover';
		$page_body_bg_size_attachment = 'fixed';
	}
	$page_body_bg_repeat = get_post_meta($id, 'borntogive_pages_body_bg_repeat', true);
	$page_content_bg_color = get_post_meta($id, 'borntogive_pages_content_bg_color', true);
	$page_content_bg_image = get_post_meta($id, 'borntogive_pages_content_bg_image', true);
	$page_content_bg_image_src = wp_get_attachment_image_src($page_content_bg_image, 'full', '', array());
	$page_content_bg_size = get_post_meta($id, 'borntogive_pages_content_bg_wide', true);
	if ($page_content_bg_size == 0) {
		$page_content_bg_size_result = 'auto';
		$page_content_bg_size_attachment = 'scroll';
	} else {
		$page_content_bg_size_result = 'cover';
		$page_content_bg_size_attachment = 'fixed';
	}
	$page_content_bg_repeat = get_post_meta($id, 'borntogive_pages_content_bg_repeat', true);

	echo '<style type="text/css">';
	if ($page_header_show == 2) {
		echo '.hero-area{display:none;}';
	} else {
		echo '.hero-area{display:block;}';
	}
	if ($page_social_show == 2) {
		echo '.social-share-bar{display:none;}';
	} else {
		echo '.social-share-bar{display:block;}';
	}
	if ($page_title_show == 2) {
		echo '.page-banner h1, .page-banner-text{display:none;}';
	} else {
		echo '.page-banner h1, .page-banner-text{display:block;}';
	}
	echo '.content{';
	if ($content_top_padding != '') {
		echo 'padding-top:' . esc_attr($content_top_padding) . 'px;';
	}
	if ($content_bottom_padding != '') {
		echo 'padding-bottom:' . esc_attr($content_bottom_padding) . 'px;';
	}
	echo '}';
	if ($content_width != '') {
		echo '
		.content .container{
			width:' . esc_attr($content_width) . ';
		}';
	}
	echo 'body.boxed{';
	if ($page_body_bg_color != '') {
		echo 'background-color:' . esc_attr($page_body_bg_color) . ';';
	}
	if ($page_body_bg_image != '') {
		echo 'background-image:url(' . esc_attr($page_body_bg_image_src[0]) . ')!important;';
	}
	if ($page_body_bg_image != '') {
		echo 'background-size:' . esc_attr($page_body_bg_size_result) . '!important;';
	}
	if ($page_body_bg_image != '') {
		echo 'background-repeat:' . esc_attr($page_body_bg_repeat) . '!important;';
	}
	if ($page_body_bg_image != '') {
		echo 'background-attachment:' . esc_attr($page_body_bg_size_attachment) . '!important;';
	}
	echo '}
		.content{';
	if ($page_content_bg_color != '') {
		echo 'background-color:' . esc_attr($page_content_bg_color) . ';';
	}
	if ($page_content_bg_image != '') {
		echo 'background-image:url(' . esc_attr($page_content_bg_image_src[0]) . ');';
	}
	if ($page_content_bg_image != '') {
		echo 'background-size:' . esc_attr($page_content_bg_size_result) . ';';
	}
	if ($page_content_bg_image != '') {
		echo 'background-repeat:' . esc_attr($page_content_bg_repeat) . ';';
	}
	if ($page_content_bg_image != '') {
		echo 'background-attachment:' . esc_attr($page_content_bg_size_attachment) . ';';
	}
	echo '}';
	echo '</style>';
	?>
	<div class="body">
		<?php echo get_template_part('header', $header_style); ?>
		
		
		<div class="sticky-bar">

<input class="thickbox" title="" alt="#TB_inline?height=300&amp;width=300&amp;inlineId=Popup1" type="button" value="Need Help Now?" />
<div class="sticky-bar-text">

    <p>Talk to the Veteran's Crisis Line Now</p>

</div>
</div>
<div id="Popup1" style="display: none;">
<div class="pop-up-content">
<h3>NEED HELP NOW?</h3>
Call the Veterans Crisis Line at <span class="bold"><a href="tel:800-273-8255">(800) 273-8255</a></span> and <span class="bold">Press 1</span>.

Or Send A Text Message To The Veterans Crisis Line At <span class="bold">838255</span>.

They offer free, confidential support 24 hours a day, 7 days a week, 365 days a year.
<h4 class="bold">NEED HELP – BUT NOT A VET?</h4>
Call 911

or text <span class="bold">HOME</span> to <span class="bold">741741</span> for whatever support you need. 24/7/365

</div>
</div>



		
    


