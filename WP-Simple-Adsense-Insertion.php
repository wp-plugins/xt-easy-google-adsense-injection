<?php
/*
Plugin Name: XT Easy Google Adsense Injection
Version: v1.0
Plugin URI: http://www.xtthemes.com/
Author: Xt-Themes
Author URI: http://www.xtthemes.com/
Description: This Wordpress plugin makes placing Google Adsense or Affiliate adverts to your posts, pages and sidebar extremely easy. It works by using short-codes that work efficiently with current themes template files.
License: GPLv2
*/

$wp_simple_ad_insert_version = 1.0;

function xt_disp_advt_1() {
	$ad_camp_encoded_value_1 = get_option( 'xt_go_advt_1_code' );
	$ad_camp_decoded_value_1 = html_entity_decode( $ad_camp_encoded_value_1, ENT_COMPAT );

	if ( !empty( $ad_camp_decoded_value_1 ) ) {
		$output .= " $ad_camp_decoded_value_1";
	}
	return $output;
}
add_shortcode( 'xt_go_advt_1', 'xt_disp_advt_1' );

function xt_disp_advt_2() {
	$ad_camp_encoded_value_2 = get_option( 'xt_go_advt_2_code' );
	$ad_camp_decoded_value_2 = html_entity_decode( $ad_camp_encoded_value_2, ENT_COMPAT );

	if ( !empty( $ad_camp_decoded_value_2 ) ) {
		$output .= " $ad_camp_decoded_value_2";
	}
	return $output;
}
add_shortcode( 'xt_go_advt_2', 'xt_disp_advt_2' );

function xt_disp_advt_3() {
	$ad_camp_encoded_value_3 = get_option( 'xt_go_advt_3_code' );
	$ad_camp_decoded_value_3 = html_entity_decode( $ad_camp_encoded_value_3, ENT_COMPAT );

	if ( !empty( $ad_camp_decoded_value_3 ) ) {
		$output .= " $ad_camp_decoded_value_3";
	}
	return $output;
}
add_shortcode( 'xt_go_advt_3', 'xt_disp_advt_3' );

function xt_disp_advt_4() {
	$ad_camp_encoded_value_4 = get_option( 'xt_go_advt_4_code' );
	$ad_camp_decoded_value_4 = html_entity_decode( $ad_camp_encoded_value_4, ENT_COMPAT );

	if ( !empty( $ad_camp_decoded_value_4 ) ) {
		$output .= " $ad_camp_decoded_value_4";
	}
	return $output;
}
add_shortcode( 'xt_go_advt_4', 'xt_disp_advt_4' );

function xt_disp_advt_5() {
	$ad_camp_encoded_value_5 = get_option( 'xt_go_advt_5_code' );
	$ad_camp_encoded_value_5 = html_entity_decode( $ad_camp_encoded_value_5, ENT_COMPAT );

	if ( !empty( $ad_camp_encoded_value_5 ) ) {
		$output .= " $ad_camp_encoded_value_5";
	}
	return $output;
}
add_shortcode( 'xt_go_advt_5', 'xt_disp_advt_5' );

/**
 * The xt_go_advt_process function is deprecated.
 * New users should use the updated shortcode method.
 */

function xt_go_advt_process( $content ) {
	if ( strpos( $content, "<!-- xt_go_advt_1 -->" ) !== FALSE ) {
		$content = preg_replace( '/<p>\s*<!--(.*)-->\s*<\/p>/i', "<!--$1-->", $content );
		$content = str_replace( '<!-- xt_go_advt_1 -->', xt_disp_advt_1(), $content );
	}
	if ( strpos( $content, "<!-- xt_go_advt_2 -->" ) !== FALSE ) {
		$content = preg_replace( '/<p>\s*<!--(.*)-->\s*<\/p>/i', "<!--$1-->", $content );
		$content = str_replace( '<!-- xt_go_advt_2 -->', xt_disp_advt_2(), $content );
	}
	if ( strpos( $content, "<!-- xt_go_advt_3 -->" ) !== FALSE ) {
		$content = preg_replace( '/<p>\s*<!--(.*)-->\s*<\/p>/i', "<!--$1-->", $content );
		$content = str_replace( '<!-- xt_go_advt_3 -->', xt_disp_advt_3(), $content );
	}
	if ( strpos( $content, "<!-- xt_go_advt_4 -->" ) !== FALSE ) {
		$content = preg_replace( '/<p>\s*<!--(.*)-->\s*<\/p>/i', "<!--$1-->", $content );
		$content = str_replace( '<!-- xt_go_advt_4 -->', xt_disp_advt_4(), $content );
	}
	return $content;
}

add_filter( 'the_content', 'xt_go_advt_process' );

// Displays Simple Ad Campaign Options menu
function ad_camp_add_option_page() {
	if ( function_exists( 'add_options_page' ) ) {
		add_menu_page( 'Simple Adsense Insertion', 'XT Adsense Injection', 'manage_options', __FILE__, 'ad_insertion_options_page' );
	}
}

function ad_insertion_options_page() {

	global $wp_simple_ad_insert_version;

	if ( isset( $_POST['info_update'] ) ) {
		echo '<div id="message" class="updated fade"><p><strong>';

		$tmpCode1 = htmlentities( stripslashes( $_POST['xt_go_advt_1_code'] ) , ENT_COMPAT );
		update_option( 'xt_go_advt_1_code', $tmpCode1 );

		$tmpCode2 = htmlentities( stripslashes( $_POST['xt_go_advt_2_code'] ) , ENT_COMPAT );
		update_option( 'xt_go_advt_2_code', $tmpCode2 );

		$tmpCode3 = htmlentities( stripslashes( $_POST['xt_go_advt_3_code'] ) , ENT_COMPAT );
		update_option( 'xt_go_advt_3_code', $tmpCode3 );

		$tmpCode4 = htmlentities( stripslashes( $_POST['xt_go_advt_4_code'] ) , ENT_COMPAT );
		update_option( 'xt_go_advt_4_code', $tmpCode4 );

		$tmpCode5 = htmlentities( stripslashes( $_POST['xt_go_advt_5_code'] ) , ENT_COMPAT );
		update_option( 'xt_go_advt_5_code', $tmpCode5 );
				
		echo 'Options Updated!';
		echo '</strong></p></div>';
	}

?>

	<div class="wrap">
		<h2 align="center">Google Adsense Placement Options</h2>

		<p align="center">By Using this plugin you can quickly and efficiently place Google Adsense or other types of adverts into your posts or pages.</p>
		<p align="center">For more information support and updates, please visit <a href="http://xtthemes.com/xt-easy-google-adsense-injection/" target="_blank">XT-Easy-Google-Adsense-Injection</a></p>
				<p align="center">The versatility of this plugin, is that it can be used to place other types of adverts (e.g affiliate adverts) within your posts or pages.</p>
         <p align="center">This plugin is FREE to use but <a href="http://xtthemes.com/donate/" target="_blank">Donations</a> however small help us with updates and more free plugins</p>
                
		<br>
		
	    <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
	    <input type="hidden" name="info_update" id="info_update" value="true" />

	    <fieldset class="options">
	    <table width="100%" border="1" cellspacing="0" cellpadding="6">

	    <tr valign="top"><td width="35%" align="left" bgcolor="#FFFFFF">
	    <strong>XT Adsense Injection 1 Code:</strong>
	    <br>Your Google Adsense code or Affiliate code can be copied and pasted into the text box to the right. After you have placed the code, make sure to click “Update Options” below.
	    <br>When you are ready to use and display this advert use the short-code: <code>[xt_go_advt_1]</code>
	    </td><td align="left">
	    <textarea name="xt_go_advt_1_code" rows="6" cols="50"><?php echo get_option( 'xt_go_advt_1_code' ); ?></textarea>
	    </td></tr>

	    <tr valign="top"><td width="35%" align="left" bgcolor="#FFFFFF">
	    <strong>XT Adsense Injection 2 Code:</strong>
	    <br>Your Google Adsense code or Affiliate code can be copied and pasted into the text box to the right. After you have placed the code, make sure to click “Update Options” below.
	    <br>When you are ready to use and display this advert use the short-code: <code>[xt_go_advt_2]</code>
	    </td><td align="left">
	    <textarea name="xt_go_advt_2_code" rows="6" cols="50"><?php echo get_option( 'xt_go_advt_2_code' ); ?></textarea>
	    </td>
	    </tr>

	    <tr valign="top"><td width="35%" align="left" bgcolor="#FFFFFF">
	    <strong>XT Adsense Injection 3 Code:</strong>
	    <br>Your Google Adsense code or Affiliate code can be copied and pasted into the text box to the right. After you have placed the code, make sure to click “Update Options” below.
	    <br>When you are ready to use and display this advert use the short-code: <code>[xt_go_advt_3]</code>
	    </td><td align="left">
	    <textarea name="xt_go_advt_3_code" rows="6" cols="50"><?php echo get_option( 'xt_go_advt_3_code' ); ?></textarea>
	    </td></tr>


	    <tr valign="top"><td width="35%" align="left" bgcolor="#FFFFFF">
	    <strong>XT Adsense Injection 4 Code:</strong>
	    <br>Your Google Adsense code or Affiliate code can be copied and pasted into the text box to the right. After you have placed the code, make sure to click “Update Options” below.
	    <br>When you are ready to use and display this advert use the short-code: <code>[xt_go_advt_4]</code>
	    </td><td align="left">
	    <textarea name="xt_go_advt_4_code" rows="6" cols="50"><?php echo get_option( 'xt_go_advt_4_code' ); ?></textarea>
	    </td></tr>

	    <tr valign="top"><td width="35%" align="left" bgcolor="#FFFFFF">
	    <strong>XT Adsense Injection 5 Code:</strong>
	    <br>Your Google Adsense code or Affiliate code can be copied and pasted into the text box to the right. After you have placed the code, make sure to click “Update Options” below.
	    <br>When you are ready to use and display this advert use the short-code: <code>[xt_go_advt_5]</code>
	    </td><td align="left">
	    <textarea name="xt_go_advt_5_code" rows="6" cols="50"><?php echo get_option( 'xt_go_advt_5_code' ); ?></textarea>
	    </td></tr>
	    
	    </table>
	    </fieldset>

	    <div class="submit">
	        <input type="submit" class="button-primary" name="info_update" value="Update options" />
	    </div>

	    </form>
	</div>
<?php
}

// Insert the ad_camp_add_option_page in the 'admin_menu'
add_action( 'admin_menu', 'ad_camp_add_option_page' );

add_filter('the_content', 'do_shortcode');
if (!is_admin())
{add_filter('widget_text', 'do_shortcode');}
add_filter('the_excerpt', 'do_shortcode');
