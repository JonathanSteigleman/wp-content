<?php
/*
    QR code generator - Leaflet Maps Marker Plugin
*/
//info: construct path to wp-load.php
while(!is_file('wp-load.php')) {
	if(is_dir('..' . DIRECTORY_SEPARATOR)) chdir('..' . DIRECTORY_SEPARATOR);
	else die('Error: Could not construct path to wp-load.php - please check <a href="https://www.mapsmarker.com/path-error">https://www.mapsmarker.com/path-error</a> for more details');
}
include( 'wp-load.php' );
//info: check if plugin is active (didnt use is_plugin_active() due to problems reported by users)
function lmm_is_plugin_active( $plugin ) {
	$active_plugins = get_option('active_plugins');
	$active_plugins = array_flip($active_plugins);
	if ( isset($active_plugins[$plugin]) || lmm_is_plugin_active_for_network( $plugin ) ) { return true; }
}
function lmm_is_plugin_active_for_network( $plugin ) {
	if ( !is_multisite() )
		return false;
	$plugins = get_site_option( 'active_sitewide_plugins');
	if ( isset($plugins[$plugin]) )
				return true;
	return false;
}
if (!lmm_is_plugin_active('leaflet-maps-marker/leaflet-maps-marker.php') ) {
	echo sprintf(__('The plugin "Leaflet Maps Marker" is inactive on this site and therefore this API link is not working.<br/><br/>Please contact the site owner (%1s) who can activate this plugin again.','lmm'), antispambot(get_bloginfo('admin_email')) );
} else {
	$lmm_options = get_option( 'leafletmapsmarker_options' );
	if (isset($_GET['layer'])) {
		$url = LEAFLET_PLUGIN_URL . 'leaflet-fullscreen.php?layer=' . htmlspecialchars($_GET['layer']);
	} else if (isset($_GET['marker'])) {
		$url = LEAFLET_PLUGIN_URL . 'leaflet-fullscreen.php?marker=' . htmlspecialchars($_GET['marker']);
	}
	//info: Google QR settings
	$google_qr_link = 'https://chart.googleapis.com/chart?chs=' . intval($lmm_options[ 'misc_qrcode_size' ]) . 'x' . intval($lmm_options[ 'misc_qrcode_size' ]) . '&cht=qr&chl=' . $url;
	echo '<script type="text/javascript">window.location.href = "' . $google_qr_link . '";</script>  ';
} //info: end plugin active check
