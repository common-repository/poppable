<?php
/*
Plugin Name:   Poppable
Plugin URI:    https://wordpress.org/plugins/poppable/
Description:   Exit Intent PopUp Plugin 
Author:        Engramium
Author URI:    www.engramium.com/
Version:       0.2
License:       GPLv2
License URI:   https://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) )
	exit;

function engramium_poppable_exit_popup_menu() {
	 add_menu_page( 
	 	 __( 'Poppable Exit Popup Settings', 'textdomain' ),
	 	 __( 'Poppable','textdomain' ),
	     'manage_options',
         'engramium-poppable-exit-popup-settings',
         'engramium_poppable_exit_popup_settings_page',
         'dashicons-format-status'
        );	
}
add_action('admin_menu', 'engramium_poppable_exit_popup_menu');

function engramium_poppable_exit_popup_settings_page() { ?>
<style type="text/css">
.bg{
	 margin-top: 2em!important;
     background-color: #fff;
     box-shadow: 0 0 4px 1px #DAD2D2;
     padding: 15px 20px!important;
	}
</style>
<div class="wrap bg">
<h2>Poppable: Show PopUp whilw user exit the page</h2>
<form method="post" action="options.php">
    <?php
	settings_fields( 'engramium-poppable-exit-popup-settings' );
	do_settings_sections( 'engramium-poppable-exit-popup-settings' );
	?>
    <table class="form-table">
	    <tr valign="top">
			<th scope="row"><label for="engramium_poppable_exit_popup_box">Popup Box </label></th>
			<td>
				<input type="checkbox" name="engramium_poppable_exit_popup_box" value="true" <?php echo ( get_option('engramium_poppable_exit_popup_box') == true ) ? ' checked="checked" />' : ' />'; ?><br /><small>Only show on Front page/Home page.</small>
			</td>
		</tr>
		 <tr valign="top">
			<th scope="row">Title Background Color #</th>
			<td>
				<input type="text" size="10" name="engramium_poppable_exit_popup_box_title_color" id="engramium_poppable_exit_popup_box_title_color" value="<?php echo esc_attr( get_option('engramium_poppable_exit_popup_box_title_color') ); ?>" data-default-color="#f0f1f2" /><br /><small>Unlimited Colors</small>
			</td>
		</tr>
        <tr valign="top">
			<th scope="row">Title (Text)</th>
			<td>
				<input type="text" size="40" name="engramium_poppable_exit_popup_box_modal_titlee" value="<?php echo esc_attr( get_option('engramium_poppable_exit_popup_box_modal_titlee') ); ?>" /><br /><small>Ex. Welcome Text!</small>
			</td>
		</tr>       

        <tr valign="top">
			<th scope="row">Body Background Color #</th>
			<td>
				<input type="text" size="10" name="engramium_poppable_exit_popup_box_bg_color" id="engramium_poppable_exit_popup_box_bg_color" value="<?php echo esc_attr( get_option('engramium_poppable_exit_popup_box_bg_color') ); ?>" data-default-color="#f0f1f2" /><br /><small>Unlimited Colors</small>
			</td>
		</tr>

        <tr valign="top">
			<th scope="row">Body (Content)</th>
			<td>
			<?php wp_editor( get_option('engramium_poppable_exit_popup_box_boody'), 'engramium_poppable_exit_popup_box_boody' );?>
			</td>
		</tr>

		  <tr valign="top">
			<th scope="row">Footer (Text)</th>
			<td>
				<input type="text" size="40" name="engramium_poppable_exit_popup_box_foooter" value="<?php echo esc_attr( get_option('engramium_poppable_exit_popup_box_foooter') ); ?>" /><br /><small>Ex. Thank You!</small>
			</td>
        </tr>

        <tr valign="top">
			<th scope="row">Cookie Expire (days)</th>
			<td>
				<input type="text" size="10" name="engramium_poppable_exit_popup_box_coookie_expire" value="<?php echo esc_attr( get_option('engramium_poppable_exit_popup_box_coookie_expire') ); ?>" /><br /><small>Ex. 10 (Set -1 for per session)</small>
			</td>
			</tr>
        <tr valign="top">
			<th scope="row">Modal Width (px)</th>
			<td>
				<input type="text" size="10" name="engramium_poppable_exit_popup_box_modal_width" value="<?php echo esc_attr( get_option('engramium_poppable_exit_popup_box_modal_width') ); ?>" /><br /><small>Ex. 500</small>
			</td>
		</tr>
        <tr valign="top">
			<th scope="row">Modal Height (px)</th>
			<td>
				<input type="text" size="10" name="engramium_poppable_exit_popup_box_modal_height" value="<?php echo esc_attr( get_option('engramium_poppable_exit_popup_box_modal_height') ); ?>" /><br /><small>Ex. 300</small>
			</td>
		</tr>


		
    </table>
    <?php
	submit_button();
	?>
</form>

</div>
<?php }

function engramium_poppable_exit_popup_settings() {
	register_setting( 'engramium-poppable-exit-popup-settings', 'engramium_poppable_exit_popup_box_coookie_expire' );
	register_setting( 'engramium-poppable-exit-popup-settings', 'engramium_poppable_exit_popup_box_modal_width' );
	register_setting( 'engramium-poppable-exit-popup-settings', 'engramium_poppable_exit_popup_box_modal_height' );
	register_setting( 'engramium-poppable-exit-popup-settings', 'engramium_poppable_exit_popup_box_title_color' );
	register_setting( 'engramium-poppable-exit-popup-settings', 'engramium_poppable_exit_popup_box_bg_color' );
	register_setting( 'engramium-poppable-exit-popup-settings', 'engramium_poppable_exit_popup_box_modal_titlee' );
	register_setting( 'engramium-poppable-exit-popup-settings', 'engramium_poppable_exit_popup_box_boody' );
	register_setting( 'engramium-poppable-exit-popup-settings', 'engramium_poppable_exit_popup_box_foooter' );
	register_setting( 'engramium-poppable-exit-popup-settings', 'engramium_poppable_exit_popup_box' );
}
add_action( 'admin_init', 'engramium_poppable_exit_popup_settings' );

function engramium_poppable_exit_popup_front_dependencies() {

	wp_register_script( 'engramium-poppable-exit-popup-js', plugins_url('js/engramium-poppable-exit-popup.js', __FILE__), array('jquery'), '1.1', false );
	wp_enqueue_script( 'engramium-poppable-exit-popup-js' );

	wp_register_style( 'engramium-poppable-exit-popup-css', plugins_url('css/engramium-poppable-exit-popup.css', __FILE__) );
	wp_enqueue_style( 'engramium-poppable-exit-popup-css' );

	wp_register_style( 'engramium-poppable-exit-popup-custom-css', plugins_url('css/custom.css', __FILE__) );
	wp_enqueue_style( 'engramium-poppable-exit-popup-custom-css' );
}
add_action( 'wp_enqueue_scripts', 'engramium_poppable_exit_popup_front_dependencies' );

function engramium_poppable_exit_popup_back_dependencies() {

	wp_enqueue_style( 'wp-color-picker' );

	wp_register_script( 'engramium-poppable-exit-popup-custom-js', plugins_url('js/custom.js', __FILE__), array('wp-color-picker'), false, true );
	wp_enqueue_script( 'engramium-poppable-exit-popup-custom-js' );
}
add_action( 'admin_enqueue_scripts', 'engramium_poppable_exit_popup_back_dependencies' );

function engramium_poppable_exit_popup() {
	
	if(!isset($_COOKIE['viewedExitPopupWP']) && $_COOKIE['viewedExitPopupWP'] != 'true') {
	
		$engramium_poppable_exit_popup_box_modal_click_outside = "
		      $('body, .close_icon').on('click', function() {
		        $('#poppable-exitpopup-modal').hide();
		      });
				";
?>
<!-- Exit Popup -->
<?php if(get_option('engramium_poppable_exit_popup_box') == true){

		if(is_front_page() || is_home()){
	?>
    <div id='poppable-exitpopup-modal'>
      <div class='underlay'></div>
      <div class='poppable-exitpopup-modal-window' style='width:<?php echo esc_attr( get_option('engramium_poppable_exit_popup_box_modal_width') ); ?>px !important; height:<?php echo esc_attr( get_option('engramium_poppable_exit_popup_box_modal_height') ); ?>px !important;background-color:<?php echo esc_attr( get_option('engramium_poppable_exit_popup_box_bg_color') ); ?> !important;'>
      		<a href="javascript:void(0);" class="close_icon" title="Close"></a>
    	<?php if( !empty( get_option('engramium_poppable_exit_popup_box_modal_titlee') ) ) { ?>
        <div class='modal-title' style='background-color:<?php echo esc_attr( get_option('engramium_poppable_exit_popup_box_title_color') ); ?> !important;'>
          <h3><?php echo esc_attr( get_option('engramium_poppable_exit_popup_box_modal_titlee') ); ?></h3>
        </div>
        <?php } ?>
        <div class='modal-body'>
			<?php echo do_shortcode(get_option('engramium_poppable_exit_popup_box_boody')); ?>
        </div>
        <div class='poppable-exitpopup-modal-footer'>
          <p><?php echo esc_attr( get_option('engramium_poppable_exit_popup_box_foooter') ); ?></p>
        </div>

      </div>
    </div>

	<script type='text/javascript'>
      var _exitpopup = exitpopup(document.getElementById('poppable-exitpopup-modal'), {
        aggressive: true,
        timer: 0,
		sensitivity: 20,
		delay: 0,
        sitewide: true,
		cookieExpire: <?php echo esc_attr( get_option('engramium_poppable_exit_popup_box_coookie_expire') ); ?>,
        callback: function() { console.log('exitpopup fired!'); }
      });
	  jQuery(document).ready(function($) {
      <?php echo $engramium_poppable_exit_popup_box_modal_click_outside; ?>
      $('#poppable-exitpopup-modal .poppable-exitpopup-modal-footer').on('click', function() {
       // $('#poppable-exitpopup-modal').hide();
      });
      $('#poppable-exitpopup-modal .poppable-exitpopup-modal-window').on('click', function(e) {
        e.stopPropagation();
      });
      });
	</script>

	<?php }
			}else{ 

?>
    <div id='poppable-exitpopup-modal'>
      <div class='underlay'></div>
      <div class='poppable-exitpopup-modal-window' style='width:<?php echo esc_attr( get_option('engramium_poppable_exit_popup_box_modal_width') ); ?>px !important; height:<?php echo esc_attr( get_option('engramium_poppable_exit_popup_box_modal_height') ); ?>px !important;background-color:<?php echo esc_attr( get_option('engramium_poppable_exit_popup_box_bg_color') ); ?> !important;'>
      		<a href="javascript:void(0);" class="close_icon" title="Close"></a>
    	<?php if( !empty( get_option('engramium_poppable_exit_popup_box_modal_titlee') ) ) { ?>
        <div class='modal-title' style='background-color:<?php echo esc_attr( get_option('engramium_poppable_exit_popup_box_title_color') ); ?> !important;'>
          <h3><?php echo esc_attr( get_option('engramium_poppable_exit_popup_box_modal_titlee') ); ?></h3>
        </div>
        <?php } ?>
        <div class='modal-body'>
			<?php echo do_shortcode(get_option('engramium_poppable_exit_popup_box_boody')); ?>
        </div>
        <div class='poppable-exitpopup-modal-footer'>
          <p><?php echo esc_attr( get_option('engramium_poppable_exit_popup_box_foooter') ); ?></p>
        </div>

      </div>
    </div>

	<script type='text/javascript'>
		var iScrollPos = 0;
	    var counter = 0;

      var _exitpopup = exitpopup(document.getElementById('poppable-exitpopup-modal'), {
        aggressive: true,
        timer: 0,
		sensitivity: 20,
		delay: 0,
        sitewide: true,
		cookieExpire: <?php echo esc_attr( get_option('engramium_poppable_exit_popup_box_coookie_expire') ); ?>,
        callback: function() { console.log('exitpopup fired!'); }
      });
	  jQuery(document).ready(function($) {
      <?php echo $engramium_poppable_exit_popup_box_modal_click_outside; ?>
      $('#poppable-exitpopup-modal .poppable-exitpopup-modal-footer').on('click', function() {
       // $('#poppable-exitpopup-modal').hide();
      });
      $('#poppable-exitpopup-modal .poppable-exitpopup-modal-window').on('click', function(e) {
        e.stopPropagation();
      });

      if ($(window).width() < 700){ 

      	<?php if( get_option('engramium_poppable_exit_popup_box_coookie_expire') == '-1' ){?>

				$(window).scroll(function () {				 
				    var iCurScrollPos = $(this).scrollTop();
				    if (iCurScrollPos > iScrollPos) {    } else {
				    	if(counter == 0){
				    		$('#poppable-exitpopup-modal').show();
				    		counter++;	
				    	}
				    }
				    iScrollPos = iCurScrollPos;
				});

		<?php } else { ?>


      	if(localStorage.getItem("optname") != 'WPhost') {
				$(window).scroll(function () {
				    var iCurScrollPos = $(this).scrollTop();
				    if (iCurScrollPos > iScrollPos) {    } else {
				    	if(counter == 0){
				    		$('#poppable-exitpopup-modal').show();
				    		counter++;	
				    		localStorage.setItem("optname", "WPhost");
				    	}
				    }
				    iScrollPos = iCurScrollPos;
				});
		}

			<?php } ?>

		}

      });
	</script>

	<?php

				} ?>
<!-- Poppable End Exit Popup -->
<?php
	}
	}
add_action( 'wp_footer', 'engramium_poppable_exit_popup', 10 );