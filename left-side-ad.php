<?
global $wpdb;
$quer = "SELECT * FROM ".$wpdb->prefix . "perpayment";
$pprow = $wpdb->get_row($quer, ARRAY_A);
$ppemailid = $pprow['emailid'];
$ppid = $pprow['ppid'];
$ppunique = md5($ppid ."|".$ppemailid);
?>
<div id="leftDivAd" class="floatdiv" style='float:left;'>
<div onclick="document.getElementById('leftDivAd').style.display = 'none';" class="closeclick">Close Ad X</div>
<a href="https://www.hirekhan.com/lang/en/home/signup?&coupon=HWM<?=$ppunique;?>" target="_blank">
<img src="<?=plugin_dir_url(__FILE__);?>images/hirekhan300x1050.jpg" class="sidebanner"/>
</a>
</div>