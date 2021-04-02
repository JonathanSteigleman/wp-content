<?php
/*
    Admin footer for APIS page - Maps Marker Pro
*/
?>

<?php
//info prevent file from being accessed directly
if (basename($_SERVER['SCRIPT_FILENAME']) == 'admin-header-apis.php') { die ("Please do not access this file directly. Thanks!<br/><a href='https://www.mapsmarker.com/go'>www.mapsmarker.com</a>"); }
$pro_feature_banner_inline = ' <a href="' . LEAFLET_WP_ADMIN_URL . 'admin.php?page=leafletmapsmarker_pro_upgrade" title="' . esc_attr__('This feature is available in the pro version only! Click here to find out how you can start a free 30-day-trial easily','lmm') . '"><img src="'. LEAFLET_PLUGIN_URL .'inc/img/pro-feature-banner.png" width="75" height="15" style="display:inline;" /></a>';

echo '<p><div class="updated" style="padding:10px;margin:10px 0;clear:both;"><h3 style="margin:10px 0;">Important notice</h3>' . __('Leaflet Maps Marker has earned its retirement - existing users get a parting gift: a 50% coupon code for an unexpiring Maps Marker Pro license (<a href="https://demo.mapsmarker.com" target="_blank">view demo</a>). For a limited time only, get yours now!</a><p><strong><a href="https://www.mapsmarker.com/v3.12.3" target="_blank">Read more & get 50% coupon code</a></strong>') . '</div></p>';
