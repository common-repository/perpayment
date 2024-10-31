<link rel="stylesheet" href="<?=plugin_dir_url(__FILE__);?>css/w3.css">
<div class="wrap" style="font-size:15px">
      <h1><img src="<?=plugin_dir_url(__FILE__);?>images/headless-logo.png"  width="200" align="absmiddle"> - <?php echo esc_html( get_admin_page_title() ); ?></h1>
	  <div class="notice notice-info">
	
	<div class="w3-container">
				
		<div class="w3-row w3-padding-32">
			<div class="w3-col m12 w3-container">
            <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

			<font color="#4d4d4d" style="font-size:17px;">
			<br>
			
		
		Publisher's Registered Email : <b>
		<?
		global $wpdb;
		$quer = "SELECT * FROM ".$wpdb->prefix . "perpayment";
		$pprow = $wpdb->get_row($quer, ARRAY_A);
		$ppemailid = $pprow['emailid'];
		$ppid = $pprow['ppid'];
		$ppunique = md5($ppid ."|".$ppemailid);
		?>
		<?=$ppemailid;?></b><br/><br/>
		<hr/>
		<br/>
		Ad Status : 
		<? 
		if($ppemailid){ ?>
		<b style="color:green;">Active</b>
		<br/><br/>
		Note: To stop showing PerPayment Ads – Deactivate the PerPayment Plugin
		<? }else{ ?>
		<b style="color:red;">Inactive</b>
		<? }?>
		

			</font>
			
			
			</div>
			
		</div>
		
	</div>
	
	
	<br/><br/>

    </div>
</div>