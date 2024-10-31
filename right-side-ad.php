<?
global $wpdb;
$quer = "SELECT * FROM ".$wpdb->prefix . "perpayment";
$pprow = $wpdb->get_row($quer, ARRAY_A);
$ppemailid = $pprow['emailid'];
$ppid = $pprow['ppid'];
$ppunique = md5($ppid ."|".$ppemailid);
?>
<div id="rightDivAd" class="floatdiv" style='float:right;'>
<div onclick="document.getElementById('rightDivAd').style.display = 'none';" class="closeclick">Close Ad X</div>
<a href="https://www.fundacle.com/OneWorld/register?idnum=2&coupon=FWG<?=$ppunique;?>" target="_blank">
<img src="<?=plugin_dir_url(__FILE__);?>images/fundacle300x1050.jpg" class="sidebanner"/>
</a>
</div>