<link rel="stylesheet" href="<?=plugin_dir_url(__FILE__);?>css/w3.css">
<div class="wrap" style="font-size:15px">
      <h1><img src="<?=plugin_dir_url(__FILE__);?>images/headless-logo.png"  width="200" align="absmiddle"> - <?php echo esc_html( get_admin_page_title() ); ?></h1>
	  <div class="notice notice-info">
	
	<div class="w3-container">
				
		<div class="w3-row w3-padding-32">
			<div class="w3-col m7 w3-container">
			<h1>Setup PerPayment Ads – Instant Ad Approval</h1>
			<br/><font style="color:#4d4d4d;font-size:15px;">Sign In with your PerPayment Account to automatically setup ads on all your WordPress pages, below image ads will be auto configured</font>
			<br/><br/><br/><br/>
			
	<script>
	function showhidepass() {
		  var x = document.getElementById("newpassword");
		  if (x.type === "password") {
			x.type = "text";
			document.getElementById('#showhidetext').innerHTML = 'Hide';
		  } else {
			x.type = "password";
			document.getElementById('#showhidetext').innerHTML = 'Show';
		  }
		}
	</script>
	<?
	if(isset($_REQUEST['logout'])){
		unset($_SESSION['ppidsess']);
		unset($_SESSION['ppemailsess']);
	}	
	?>
	<div class="w3-card-4" style="width:70%">
    <header class="w3-container w3-light-blue">
      <h3>PerPayment Account</h3>
    </header>
    <div class="w3-container">
      <br/><br/>
	  <? 		
		if(isset($_SESSION['ppidsess']) && ($_SESSION['ppidsess'])){
		?><font style="font-size:18px;color:#4d4d4d">Logged in as <b><?=$_SESSION['ppemailsess'];?></b>  |  
			<a href="<?php echo admin_url( 'admin.php'); ?>?page=Set-Up-Ads&logout=1">Logout</a></font><?
		}else{
		if(isset($_REQUEST['err'])){ ?><h4 style="color:red">Invalid account details entered.</h4><? }
			?>
		<form action="<?php echo admin_url( 'admin-post.php'); ?>" id="commonform" method="post">
		<input type="hidden" name="action" value="get_pp_userid" />
		
			<input id="email" placeholder="Email" type="email" name="emailid" autocapitalize="none" dir="ltr" spellcheck="false" autocomplete="off" data-valid="true" aria-labelledby="label-email" aria-required="false" class="email-input  w3-margin-right ctHidden form-control" required="">
			<a onclick="showhidepass();" href="javascript:void(0);" style="text-decoration:none;" id="showhidetext" class="btn btn-tertiary-inline btn-sm" aria-label="form_action_button">Show</a>			
			<input tabindex="" placeholder="Password" id="newpassword" name="ipassword" type="password" data-valid="true" aria-labelledby="label-new-password" aria-required="false" class="form-control w3-margin-right" required="">
			
			<input type="submit" name="submit" id="submit" class="button w3-margin-right" style="border-color:#000000;background-color:black;color:#ffffff;" value="Click to Login"/>
		
			<div id="create_acct_submit_btn_container">
			<br/>
			<p class="tos-text">Note: If you have made PerPayment Account by Gmail Validation – PerPayment User ID & Password is sent to your registered email address.</p>
			<p class="tos-text">By login into an account, you agree to PerPayment Inc <a target="_blank" id="tos-link" href="https://www.perpayment.com/termsandconditions">Terms &amp; Conditions</a> and <a target="_blank" id="privacy-link" href="https://www.perpayment.com/privacypolicy">Privacy Policy</a></p></div>
		<br>
		<a href="https://www.perpayment.com/forgot_password" target="_blank">Forgot Password?</a>
			
		</form>
		<?
		}?>		
	  
      
      <br>
	  <br/><br/>
    </div>
	</div>
			
			</div>
			<div class="w3-col m5 w3-container w3-center">
			<br/><br/>
			<img src="<?=plugin_dir_url(__FILE__);?>images/499.png" width="100%"/>
            </div>
		</div>
		<div class="w3-row w3-padding-32">		
		
			<div class="w3-row">
			
			<div class="w3-col m4">
			<div class="w3-panel w3-topbar  w3-border-amber w3-margin">
				<h1>American Business A-I-R-S Number</h1>
				<font style="color:#4d4d4d;font-size:17px;">On conversion you earn $499</font>
				<br/><br/><img width="100%" src="<?=plugin_dir_url(__FILE__);?>images/American-Business-970x250.jpg">
				<br/><br/>
			</div> 
			</div>
			<div class="w3-col m4">			
			<div class="w3-panel w3-topbar w3-border-amber w3-margin">
				<h1>American Founder A-I-R-S Number</h1>
				<font style="color:#4d4d4d;font-size:17px;">On conversion you earn $299</font>
				<br/><br/><img width="100%" src="<?=plugin_dir_url(__FILE__);?>images/American-Founder-970x250.jpg">
				<br/><br/>
			</div>
			</div>
			<div class="w3-col m4">
			<div class="w3-panel w3-topbar  w3-border-black w3-margin">
				<h1>HireKhan Manpower</h1>
				<font style="color:#4d4d4d;font-size:17px;">On conversion you earn upto $499</font>
				<br/><br/><img width="100%" src="<?=plugin_dir_url(__FILE__);?>images/HireKhan-Manpower-970x250.jpg">
				<br/><br/>
			</div> 
			</div>
			
			</div>
			<div class="w3-row">
						
			<div class="w3-col m4">
			<div class="w3-panel w3-topbar  w3-border-amber w3-margin">
				<h1>American IRS – Website Seal</h1>
				<font style="color:#4d4d4d;font-size:17px;">On conversion you earn $49</font>
				<br/><br/><img width="100%" src="<?=plugin_dir_url(__FILE__);?>images/American-IRS-970x250.jpg">
				<br/><br/>
			</div> 
			</div>
			<div class="w3-col m4">
			<div class="w3-panel w3-topbar w3-border-gray w3-margin">
				<h1>Fundacle Investor</h1>
				<font style="color:#4d4d4d;font-size:17px;">On conversion you earn $150</font>
				<br/><br/><img width="100%" src="<?=plugin_dir_url(__FILE__);?>images/Fundacle-Investor-970x250.jpg">
				<br/><br/>
			</div> 
			</div>
			<div class="w3-col m4">			
			<div class="w3-panel w3-topbar w3-border-gray w3-margin">
				<h1>Fundacle Businessman</h1>
				<font style="color:#4d4d4d;font-size:17px;">On conversion you earn $150</font>
				<br/><br/><img width="100%" src="<?=plugin_dir_url(__FILE__);?>images/Fundacle-Businessman-970x250.jpg">
				<br/><br/>
			</div>
			</div>			
			<div class="w3-col m4">			
			<div class="w3-panel w3-topbar  w3-border-blue w3-margin">
				<h1>PerPayment – Refer & Earn</h1>
				<font style="color:#4d4d4d;font-size:17px;">On conversion you earn upto $499</font>
				<br/><br/><img width="250" src="<?=plugin_dir_url(__FILE__);?>images/PerPayment-logo.png">
				<br/><br/>
			</div>
			</div>
			
			</div>		
		
		</div>
		
		<hr/>
		
		
	</div>
	
	
	<br/><br/>

    </div>
</div>