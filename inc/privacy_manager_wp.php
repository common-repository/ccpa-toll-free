<?php defined('ABSPATH') or die('No script kiddies please!');

if (isset($_POST['submit'])) {
	$hotline_code = sanitize_text_field( $_POST['pm'] );
	add_option('privacy_manager_hotline_code', $hotline_code, '', 'yes');
	$option_value = get_option('privacy_manager_hotline_code');
	if (!empty($option_value)) {
		update_option('privacy_manager_hotline_code', $hotline_code);
	} else {
		update_option('privacy_manager_hotline_code', $hotline_code);
	}
}
?>
<div class="wrap">
	<div class="col-md-12">
		<div class="row ad">
			<h1>General Settings</h1>
			<div id="message" class="updated notice is-dismissible">
			<!-- Help Text Begin -->
			<p style="font-size:16px;">You successfully installed the CCPA Toll Free plugin! To activate the 866-I-OPT-OUT
			privacy hotline and privacy request manager web form for your privacy policy:</p></div>
			<hr>
			<div id="welcome-panel" class="welcome-panel">
			<ol>
				<li><a target="_blank" href="https://dashboard.ccpatollfree.com/#/signup?utm_source=wordpress-admin&utm_medium=wp-dashboard&utm_campaign=wp-plugin-v1">Click here</a> to sign up for a free trial account and then verify your email address</li>
				
				<li><a target="_blank" href="https://dashboard.ccpatollfree.com/#/products">Click here</a> to open the CCPA Toll Free dashboard</li>
				
				<li>Click the “PUBLISHING HELP” button on the dashboard and copy your Privacy Hotline WP Code</li>
				
				<li>Paste your Privacy Hotline WP Code in the box below</li>
				
				<li>In your WP Admin panel, navigate to Pages —> All Page and then edit your Privacy Policy</li>
				
				<li>Add the short code [CCPA-Toll-Free], including the [ ]s, to your Privacy Policy in the location where you would like to publish your privacy hotline</li>
				
				<li>To use the web form privacy request manager, email support-wp@ccpatollfree.com with the domain name from which you wish to submit web form requests and we'll add your doman to our white list</li> 
			</ol>
			</div>
			<!-- Help Text End -->
			<!-- Form for adding Service Code Begin -->
			<form method="POST">
				<table class="form-table" role="presentation">
					<tbody>
						<tr>
							<th scope="row"><label for="blogname">Privacy Hotline WP Code</label></th>
							<td><input type="text" id="pm" name="pm" placeholder="Enter your Privacy Hotline WP Code" value="<?php echo get_option('privacy_manager_hotline_code'); ?>" class="regular-text"></td>
						</tr>
					</tbody>
				</table>
				<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p>
			</form>
			<!-- Form for adding Service Code End -->
		</div>
	</div>
</div>