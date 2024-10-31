<link rel="stylesheet" href="<?=plugin_dir_url(__FILE__);?>css/w3.css">
<div class="wrap" style="font-size:15px">
      <h1><img src="<?=plugin_dir_url(__FILE__);?>images/headless-logo.png" width="200" align="absmiddle"> - <?php echo esc_html( get_admin_page_title() ); ?></h1>
	  <div class="notice notice-info">
	
	<div class="w3-container">
				
		<div class="w3-row w3-padding-32">
			<div class="w3-col m6 w3-container">
            <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

			<font color="#4d4d4d" style="font-size:17px;">
<br/><br/>
Realtime analysis of PerPayment AdSell Network performance of your account on the internet. 
<br/><br/>
Detailed analytics of PerPayment, HireKhan, Fundacle & American IRS® customer impressions, signup & payment.
<br/><br/>
Click below to visit PerPayment Official site to view income analytics.


			</font>
			
			<br/>
			<form action="https://www.perpayment.com/View_Income_Analytics" target="_blank" method="post">
			<?php
			// output security fields for the registered setting "pp_options"
			settings_fields( 'pp_options' );
			// output setting sections and their fields
			// (sections are registered for "pp", each field is registered to a specific section)
			do_settings_sections( 'pp' );
			// output save settings button
			submit_button( __( 'View Income Analytics', 'textdomain' ) );
			?>
		  </form>
			
			</div>
			<div class="w3-col m6 w3-container w3-center">
			
            </div>
		</div>
		
	</div>
	
	
	<br/><br/>

    </div>
</div>