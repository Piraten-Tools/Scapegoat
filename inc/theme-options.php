<?php
/* ------------------ */
/* theme options page */
/* ------------------ */

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );


add_action('admin_init', 'scapegoat_add_init');
function scapegoat_add_init() {
	$file_dir = get_template_directory_uri();
	wp_enqueue_style('scapegoatCss', $file_dir.'/inc/theme-options.css', false, '1.0', 'all');
	wp_enqueue_script('scapegoatJs', $file_dir.'/inc/theme-options.js', false, '1.0', 'all');
}



// Einstellungen registrieren (http://codex.wordpress.org/Function_Reference/register_setting)
function theme_options_init(){
	register_setting( 'scapegoat_options', 'scapegoat_theme_options', 'scapegoat_validate_options' );
}

// Seite in der Dashboard-Navigation erstellen
function theme_options_add_page() {
	// Seitentitel, Titel in der Navi, Berechtigung zum Editieren (http://codex.wordpress.org/Roles_and_Capabilities) , Slug, Funktion
	add_theme_page('Theme-Options', 'Theme-Options', 'edit_theme_options', 'theme-options', 'scapegoat_theme_options_page' );
}

// Optionen-Seite erstellen
function scapegoat_theme_options_page() {
	global $select_options, $radio_options;
	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false; ?>

	<div class="wrap" id="arrr">

		<!-- Titel -->
		<?php screen_icon(); ?><h2><?php _e('Scapegoat Theme-Options','scapegoat'); ?></h2> 

		<!-- Message -->
		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade">
			<p><strong><?php _e('Settings saved!','scapegoat'); ?></strong></p>
		</div>
		<?php endif; ?>

		<!-- Settings -->
		<form method="post" action="options.php">
			<?php settings_fields( 'scapegoat_options' ); ?>
			<?php $options = get_option( 'scapegoat_theme_options' ); ?>

			<h3><?php _e('Graphics','scapegoat'); ?></h3>
			<p><?php printf(__('Choose an Image from your <a target="_blank" href="%s/wp-admin/upload.php">Library</a> or <a target="_blank" href="%s/wp-admin/media-new.php">upload</a> a new one.','scapegoat'), get_home_url(), get_home_url()); ?></p>
			<table class="form-table">
				<tr valign="top">
					<th scope="row">Logo (Url)</th>
					<td>
						<input id="scapegoat_theme_options[logo]" class="regular-text" type="text" name="scapegoat_theme_options[logo]" value="<?php esc_attr_e( $options['logo'] ); ?>" />
					</td>
				</tr>
			</table>
			<h3><?php _e('Appearance','scapegoat'); ?></h3>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><?php _e('Sidebar alignment','scapegoat'); ?></th>
					<td>
						<label for="sidebar-right">
							<input id="sidebar-right" type="radio" name="scapegoat_theme_options[alignment-option]" value="sidebar-right" <?php checked( 'sidebar-right' == $options['alignment-option'] ); ?> /> <?php _e('Right','scapegoat'); ?> <span class="description"><?php _e('Default','scapegoat'); ?></span>
						</label>
						<br />
						<label for="sidebar-left">
							<input id="sidebar-left" type="radio" name="scapegoat_theme_options[alignment-option]" value="sidebar-left" <?php checked( 'sidebar-left' == $options['alignment-option'] ); ?> /> <?php _e('Left','scapegoat'); ?>
						</label>
						
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e('Frontpage','scapegoat'); ?></th>
					<td>
						<label for="show-slider">
							<input id="show-slider" type="radio" name="scapegoat_theme_options[header-option]" value="show-slider" <?php checked( 'show-slider' == $options['header-option'] ); ?> /> <?php _e('Slider','scapegoat'); ?>
						</label>

						<table class="widefat slider">
							<tr valign="top">
								<th scope="row"><?php _e('Category (ID)','scapegoat'); ?></th>
								<td><input id="scapegoat_theme_options[slider-cat]" class="small-text" type="text" name="scapegoat_theme_options[slider-cat]" value="<?php esc_attr_e( $options['slider-cat'] ); ?>" /> <span class="description"><?php _e('Default: All','scapegoat'); ?></span></td>
							</tr>
							<tr valign="top">
								<th scope="row"><?php _e('Amount of slides','scapegoat'); ?></th>
								<td><input id="scapegoat_theme_options[slider-num]" class="small-text" type="text" name="scapegoat_theme_options[slider-num]" value="<?php esc_attr_e( $options['slider-num'] ); ?>" /> <span class="description"><?php _e('Default: 6','scapegoat'); ?></span></td>
							</tr>
						</table>
						<label for="show-header">
							<input id="show-header" type="radio" name="scapegoat_theme_options[header-option]" value="show-header" <?php checked( 'show-header' == $options['header-option'] ); ?> /> <?php _e('Header','scapegoat'); ?> <span class="description"><?php _e('Default Wordpress Header Function','scapegoat'); ?></span>
						</label>
						<br />
						<label for="show-none">
							<input id="show-none" type="radio" name="scapegoat_theme_options[header-option]" value="show-none" <?php checked( 'show-none' == $options['header-option'] ); ?> /> <?php _e('Nothing','scapegoat'); ?>
						</label>
					</td>
				</tr>
			</table>

			<h3><?php _e('Social Networks','scapegoat'); ?></h3>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><span class="social-icon rss"><i class="fa fa-rss"></i></span> Feed</th>
					<td><input id="scapegoat_theme_options[rss]" class="regular-text" type="text" name="scapegoat_theme_options[rss]" value="<?php esc_attr_e( $options['rss'] ); ?>" /> <span class="description"> <?php _e('Default: http://yoururl.com/feed/','scapegoat'); ?></span></td>
				</tr>
				<tr valign="top">
					<th scope="row"><span class="social-icon mail"><i class="fa fa-envelope"></i></span> Newsletter</th>
					<td><input id="scapegoat_theme_options[mail]" class="regular-text" type="text" name="scapegoat_theme_options[mail]" value="<?php esc_attr_e( $options['mail'] ); ?>" /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><span class="social-icon podcast"><i class="fa fa-microphone"></i></span> Podcast</th>
					<td><input id="scapegoat_theme_options[podcast]" class="regular-text" type="text" name="scapegoat_theme_options[podcast]" value="<?php esc_attr_e( $options['podcast'] ); ?>" /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><span class="social-icon twitter"><i class="fa fa-twitter"></i></span> Twitter</th>
					<td><input id="scapegoat_theme_options[twitter]" class="regular-text" type="text" name="scapegoat_theme_options[twitter]" value="<?php esc_attr_e( $options['twitter'] ); ?>" /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><span class="social-icon facebook"><i class="fa fa-facebook"></i></span> Facebook</th>
					<td><input id="scapegoat_theme_options[facebook]" class="regular-text" type="text" name="scapegoat_theme_options[facebook]" value="<?php esc_attr_e( $options['facebook'] ); ?>" /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><span class="social-icon google"><i class="fa fa-google-plus"></i></span> Google +</th>
					<td><input id="scapegoat_theme_options[google]" class="regular-text" type="text" name="scapegoat_theme_options[google]" value="<?php esc_attr_e( $options['google'] ); ?>" /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><span class="social-icon youtube"><i class="fa fa-youtube-play"></i></span> Youtube</th>
					<td><input id="scapegoat_theme_options[youtube]" class="regular-text" type="text" name="scapegoat_theme_options[youtube]" value="<?php esc_attr_e( $options['youtube'] ); ?>" /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><span class="social-icon vimeo"><i class="fa fa-vimeo-square"></i></span> Vimeo</th>
					<td><input id="scapegoat_theme_options[vimeo]" class="regular-text" type="text" name="scapegoat_theme_options[vimeo]" value="<?php esc_attr_e( $options['vimeo'] ); ?>" /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><span class="social-icon flickr"><i class="fa fa-flickr"></i></span> Flickr</th>
					<td><input id="scapegoat_theme_options[flickr]" class="regular-text" type="text" name="scapegoat_theme_options[flickr]" value="<?php esc_attr_e( $options['flickr'] ); ?>" /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><span class="social-icon github"><i class="fa fa-github"></i></span> Github</th>
					<td><input id="scapegoat_theme_options[github]" class="regular-text" type="text" name="scapegoat_theme_options[github]" value="<?php esc_attr_e( $options['github'] ); ?>" /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><span class="social-icon tumblr"><i class="fa fa-tumblr"></i></span> Tumblr</th>
					<td><input id="scapegoat_theme_options[tumblr]" class="regular-text" type="text" name="scapegoat_theme_options[tumblr]" value="<?php esc_attr_e( $options['tumblr'] ); ?>" /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><span class="social-icon appdotnet"><i class="fa fa-adn"></i></span> APP.net</th>
					<td><input id="scapegoat_theme_options[appdotnet]" class="regular-text" type="text" name="scapegoat_theme_options[appdotnet]" value="<?php esc_attr_e( $options['appdotnet'] ); ?>" /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><span class="social-icon instagram"><i class="fa fa-instagram"></i></span> Instagram</th>
					<td><input id="scapegoat_theme_options[instagram]" class="regular-text" type="text" name="scapegoat_theme_options[instagram]" value="<?php esc_attr_e( $options['instagram'] ); ?>" /></td>
				</tr>
			</table>
			<!-- Submit -->
			<p class="submit"><input type="submit" class="button-primary" value="<?php _e('Save','scapegoat'); ?>" /></p>
		</form>
	</div>
<?php }

function scapegoat_validate_options($input) {
	// $input['copyright'] = wp_filter_nohtml_kses( $input['copyright'] );
	return $input;
}

?>