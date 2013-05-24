<?php


/*
|--------------------------------------------------------------------------
| CONTROL, REGISTER & ENQUEUE FRONT END SCRIPTS / STYLES
|--------------------------------------------------------------------------
*/
function easymedia_frontend_stylesheet() {
	        wp_enqueue_style( 'easymedia_styles', EASYMEDG_PLUGIN_URL .'css/frontend.css' );
}
add_action( 'wp_print_styles', 'easymedia_frontend_stylesheet' );


function easymedia_frontend_script() {
	
	wp_deregister_script('fittext'); // deregister
	wp_enqueue_script('fittext', plugins_url('js/jquery/jquery.fittext.js', __FILE__), array("jquery"), '1.1');
	
	wp_register_script( 'mootools-core', plugins_url( 'js/mootools/mootools-' .easy_get_option( 'easymedia_plugin_core' ). '.js' , __FILE__ ) );	
	wp_enqueue_script( 'mootools-core' );
	
	wp_register_script( 'easymedia-core', plugins_url( 'js/mootools/easymedia.js' , __FILE__ ) );	
	wp_enqueue_script( 'easymedia-core' );	
	
	wp_register_script( 'easymedia-frontend', plugins_url( 'js/func/frontend.js' , __FILE__ ) );	
	wp_enqueue_script( 'easymedia-frontend' );	
	
}
add_action( 'wp_enqueue_scripts', 'easymedia_frontend_script' );


function easymedia_frontend_prop()
{   
		$boxstyle = EASYMEDG_PLUGIN_URL . 'css/styles/mediabox';
		echo "<link rel=\"alternate stylesheet\" title=\"Light\" type=\"text/css\" media=\"screen,projection\" href=\"$boxstyle/Light.css\" />\n";
		
ob_start(); ?>

<link rel="stylesheet" href="<?php echo plugins_url('dynamic-style.php' , __FILE__) ?>" type="text/css" media="screen" />    


<!-- Easy Media Gallery Lite START (version <?php echo EASYMEDIA_VERSION; ?>)-->       
    
    <script type="text/javascript">
	/*<![CDATA[*/
	/* Easy Media Gallery */
    jQuery(document).ready(function($) {

	/* Mediabox init */		
		var add = "easymedia";
jQuery('.da-thumbs a[rel!="easymedia"]').attr('rel', function (i, old) {
    return old ? old + ' ' + add : add; });		
		
    });
    /*]]>*/</script>	

    <script type="text/javascript">
	/*<![CDATA[*/
	/* Easy Media Gallery */
	
	easyActiveStyleSheet('<?php echo easy_get_option( 'easymedia_box_style' ); ?>');
	
var audiosett = []; var videosett = []; var cpanel = [];
 audiosett[0] = '<?php echo plugins_url( '/swf/NonverBlaster.swf' , __FILE__ ); ?>';
 audiosett[1] = '<?php echo easy_get_option( 'easymedia_audio_vol' ); ?>';
 audiosett[2] = '<?php ( easy_get_option( 'easymedia_disen_autopl' )  == '1' ) ? $autoplay = 'true' : $autoplay = 'false'; echo $autoplay; ?>';
 audiosett[3] = '<?php ( easy_get_option( 'easymedia_disen_audio_loop' )  == '1' ) ? $audioloop = 'true' : $audioloop = 'false'; echo $audioloop; ?>';
 videosett[0] = '<?php ( easy_get_option( 'easymedia_disen_autoplv' )  == '1' ) ? $autoplay = '&autoplay=1' : $autoplay = ''; echo $autoplay; ?>';
 videosett[1] = '<?php ( easy_get_option( 'easymedia_disen_autoplv' )  == '1' ) ? $autoplay = '?autoplay=1' : $autoplay = ''; echo $autoplay; ?>';
 videosett[2] = '<?php ( easy_get_option( 'easymedia_disen_autoplv' )  == '1' ) ? $autoplay = '1' : $autoplay = '0'; echo $autoplay; ?>';
 cpanel[0] = '<?php echo easy_get_option( 'easymedia_overlay_opcty' ) / 100 ; ?>';
 cpanel[1] = '<?php echo plugins_url( 'ajax.php' , __FILE__ ); ?>';

    /*]]>*/</script> 
    
    <!--[if lt IE 9]>
<script src="<?php echo plugins_url( 'js/func/html5.js' , __FILE__ );  ?>" type="text/javascript"></script>
<![endif]-->  


<!-- Easy Media Gallery Lite  END  -->   
    
	<?php echo ob_get_clean();		
}
add_action( 'wp_head', 'easymedia_frontend_prop' );

?>