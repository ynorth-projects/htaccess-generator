<?php

/**
 * Generate redirects to camps/locations pages.
 */
function generateCampsLocationsRedirects() {
  $destDomain = 'www.ymcanorth.org';

  $data = [
    ['andoverymca.org', '/locations/andover_ymca_community_center'],
    ['campnl.org', '/camps/camp_northern_lights'],
  ];

  foreach ($data as $item) {
    $sourceDomain = str_replace('.', '\.', $item[0]);
    $destPage = $item[1];

    $template = "RewriteCond %{HTTP_HOST} ^$sourceDomain [NC,OR]\n";
    $template .= "RewriteCond %{HTTP_HOST} ^www\.$sourceDomain [NC]\n";
    $template .= 'RewriteRule ^(.*)$ ' . 'https://' . $destDomain . $destPage . " [L,R=301]\n\n";

    echo $template;
  }

}

echo "# Locations/Camps redirects.\n\n";
generateCampsLocationsRedirects();
