<?php
/*
Plugin Name:  PerPayment
Plugin URI:   https://www.perpayment.com
Description:  Now Make Money Online Per Conversion $ 499. Anyone, Anywhere, Anytime Make Money Online. Monetize Your Empty & Low Income Ad Space. 
Version:      2.0
Author:       perpayment 
Author URI:   https://www.perpayment.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  perpayment
Domain Path:  /languages
*/
//hook into the init action and call create_topics_nonhierarchical_taxonomy when it fires

//handling session below
function wpse16119876_init_session() {
    if ( ! session_id() ) {
        session_start();
    }
}
// Start session on init hook.
add_action( 'init', 'wpse16119876_init_session' );

function showwelcomepage() {
	require "welcome.php";
}

function ViewIncomeAnalytics() {
   require "view-income-analytics.php";
}

function SetUpAds() {
   require "set-up-ads.php";
}

function SettingsFunc() {
   require "settings.php";
}

add_action( 'admin_menu', 'pp_options_page' );
function pp_options_page() {
    add_menu_page('pp','PerPayment AdSell Kit','manage_options','pp','showwelcomepage',plugin_dir_url(__FILE__) . 'images/plogo.png',20);
	add_submenu_page( 'pp', ' Welcome', 'Welcome', 'manage_options', 'pp', 'showwelcomepage');
	add_submenu_page( 'pp', ' View Income Analytics', 'View Income Analytics', 'manage_options', 'View-Income-Analytics', 'ViewIncomeAnalytics');
	add_submenu_page( 'pp', ' Setup Ads', 'Setup Ads ', 'manage_options', 'Set-Up-Ads', 'SetUpAds');
	add_submenu_page( 'pp', ' Settings', 'Settings', 'manage_options', 'Settings', 'SettingsFunc');
}
$response = wp_remote_get( 'https://www.perpayment.com/login' );
$body     = wp_remote_retrieve_body( $response );



function getppuser_handle() {
	$emailid = (!empty($_POST["emailid"])) ? $_POST["emailid"] : NULL;
	$ipassword = (!empty($_POST["ipassword"])) ? $_POST["ipassword"] : NULL;
	$url = 'https://www.perpayment.com/loginfromwp';
	
	$response = wp_remote_post( $url, array(
		'method'      => 'POST',
		'timeout'     => 45,
		'redirection' => 5,
		'blocking'    => true,
		'headers'     => array(),
		'body'        => array(
			'emailid' => $emailid,
			'ipassword' => $ipassword
		),
		'cookies'     => array()
		)
	);
	 
	if ( is_wp_error( $response ) ) {
		$error_message = $response->get_error_message();
		echo "Something went wrong: $error_message";
	} else {
		if($response['body']){
		$explbody = explode('|',$response['body']);
		$ppidsess = $explbody[0];
		$ppemailsess = $explbody[1];
		$_SESSION['ppidsess'] = $ppidsess;
		$_SESSION['ppemailsess'] = $ppemailsess;
		
			global $wpdb;			
			$emailid = $ppemailsess;
			$ppid = $ppidsess;
			
			$table_name = $wpdb->prefix . 'perpayment';
			
			$delete = $wpdb->query("TRUNCATE TABLE ".$table_name);
			
			$wpdb->insert( 
				$table_name, 
				array( 
					'time' => current_time( 'mysql' ), 
					'emailid' => $emailid, 
					'ppid' => $ppid 
				) 
			);
	
		
		}else{
		$_SESSION['ppidsess'] = "";
		$_SESSION['ppemailsess'] ="";
		wp_redirect(admin_url('admin.php?page=Set-Up-Ads&err'));
		exit;
		}
	}
	wp_redirect(admin_url('admin.php?page=Set-Up-Ads'));
	exit;
}

add_action( 'admin_post_get_pp_userid', 'getppuser_handle' );

//--------------------------------------------------------------------------------
//Insert ad at header.
add_action( 'wp_head', 'wpsites_image_before_header' );
function wpsites_image_before_header() {	
	//Get PP user details.
	global $wpdb;
	$quer = "SELECT * FROM ".$wpdb->prefix . "perpayment";
	$pprow = $wpdb->get_row($quer, ARRAY_A);
	$ppemailid = $pprow['emailid'];
	$ppid = $pprow['ppid'];
	$ppunique = md5($ppid ."|".$ppemailid);

	$ad_code = "";
	if(count($pprow)){
    $ad_code = '<center><br/><div style="width:600px;text-align:left"><a href="https://www.perpayment.com/?rf=PRF'.$ppunique.'" target="_blank"><img align="center" id="970x250" src="'. plugin_dir_url(__FILE__).'images/PerPayment-logo.png" style="width:auto;max-width:800px;"></a>
	<br/><font style="font-size:22px;"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PerPayment – Refer & Earn</font><br/>
				</font><font style="font-size:18px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;On conversion you earn upto $499</font>
	</center></div>';
	}
echo '<div class="before-header">';
echo $ad_code;
echo '</div>';
}

//--------------------------------------------------------------------------------------
//Insert ad at footer.
add_action( 'wp_footer', 'wpsites_image_before_footer' );
function wpsites_image_before_footer() {
	global $wpdb;
	$quer = "SELECT * FROM ".$wpdb->prefix . "perpayment";
	$pprow = $wpdb->get_row($quer, ARRAY_A);
	$ppemailid = $pprow['emailid'];
	$ppid = $pprow['ppid'];
	$ppunique = md5($ppid ."|".$ppemailid);
	$ad_code = "";
	if(count($pprow)){
    $ad_code = '<center><a href="https://www.fundacle.com/OneWorld/register?idnum=2?&amp;coupon=FWG'.$ppunique.'" target="_blank"><img id="970x250" src="'. plugin_dir_url(__FILE__).'images/Fundacle-Businessman-970x250.jpg" style="width:auto;"></a><br/></center>';
    }
echo '<div class="before-footer">';
echo $ad_code;
echo '</div>';
}

//==========================================================================================
//creating table only when registering plugin
global $jal_db_version;
$jal_db_version = '1.0';

function jal_install() {
	global $wpdb;
	global $jal_db_version;

	$table_name = $wpdb->prefix . 'perpayment';
	
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		emailid tinytext NOT NULL,
		ppid text NOT NULL,
		url varchar(55) DEFAULT '' NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	dbDelta( $sql );

	add_option( 'jal_db_version', $jal_db_version );
}

register_activation_hook( __FILE__, 'jal_install' );
//--------------------------------------------------------------------------------

//---------------------------------ad in between post paragraphs--------------------------------------
add_filter( 'the_content', 'prefix_insert_post_ads' );
 
function prefix_insert_post_ads( $content ) {
    global $wpdb;
	$quer = "SELECT * FROM ".$wpdb->prefix . "perpayment";
	$pprow = $wpdb->get_row($quer, ARRAY_A);
	$ppemailid = $pprow['emailid'];
	$ppid = $pprow['ppid'];
	$ppunique = md5($ppid ."|".$ppemailid);
	$ad_code = "";
	$ad_code1 = "";
	$ad_code2 = "";
	$ad_code3 = "";
	$ad_code4 = "";
	if(count($pprow)){
    $ad_code = '<center><a href="https://www.americanirs.com/business-a-i-r-s-number?&amp;coupon=ZWB'.$ppunique.'" target="_blank"><img id="970x250" src="'. plugin_dir_url(__FILE__).'images/American-Business-970x250.jpg" style="width:auto;"></a></center>';
	$ad_code1 = '<center><a href="https://www.americanirs.com/individual-a-i-r-s-number?&amp;coupon=ZWI'.$ppunique.'" target="_blank"><img id="970x250" src="'. plugin_dir_url(__FILE__).'images/American-Founder-970x250.jpg" style="width:auto;"></a><br/><br/></center>';
	$ad_code2 = '<center><a href="https://www.hirekhan.com/lang/en/home/signup?&amp;coupon=HWM'.$ppunique.'" target="_blank"><img id="970x250" src="'. plugin_dir_url(__FILE__).'images/HireKhan-Manpower-970x250.jpg" style="width:auto;"></a><br/></center>';
	$ad_code3 = '<center><a href="https://www.americanirs.com/website-email-secured-seal?&amp;coupon=ZBA'.$ppunique.'" target="_blank"><img id="970x250" src="'. plugin_dir_url(__FILE__).'images/American-IRS-970x250.jpg" style="width:auto;"></a><br/></center>';
    $ad_code4 = '<center><a href="https://www.fundacle.com/OneWorld/register?idnum=4?&amp;coupon=FWI'.$ppunique.'" target="_blank"><img id="970x250" src="'. plugin_dir_url(__FILE__).'images/Fundacle-Investor-970x250.jpg" style="width:auto;"></a><br/></center>';
    }
 
    if (  ! is_admin() ) {
        $content = prefix_insert_after_paragraph( $ad_code, 1, $content );
		$content = prefix_insert_after_paragraph( $ad_code1, 2, $content );
		$content = prefix_insert_after_paragraph( $ad_code2, 3, $content );
		$content = prefix_insert_after_paragraph( $ad_code3, 4, $content );	
		$content = prefix_insert_after_paragraph( $ad_code4, 5, $content );
		return $content;		
    }
     
    return $content;
}
  
// Parent Function that makes the magic happen

function prefix_insert_after_paragraph( $insertion, $paragraph_id, $content ) {
    $closing_p = '</p>';
    $paragraphs = explode( $closing_p, $content );
    foreach ($paragraphs as $index => $paragraph) {
 
        if ( trim( $paragraph ) ) {
            $paragraphs[$index] .= $closing_p;
        }
 
        if ( $paragraph_id == $index + 1 ) {
            $paragraphs[$index] .= $insertion;
        }
    }
    
    return implode( '', $paragraphs );
}


function wpse59779_test( $sidebar_name )
{
	if ( $GLOBALS['pagenow'] !== 'wp-login.php' ) {
	if(! is_admin()){
	?>
	<link rel="stylesheet" href="<?=plugin_dir_url(__FILE__);?>css/ppstyle.css">
	<?
	require "left-side-ad.php";
	require "right-side-ad.php";
	}
	}
}
add_action( 'init', 'wpse59779_test');

?>