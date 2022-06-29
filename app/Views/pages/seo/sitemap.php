<?php
$content = <<< SHUBHKAMNAVENTURES
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
SHUBHKAMNAVENTURES;

$content .= '<url>';
$content .= '<loc>'.site_url().'</loc>';
$content .= '<lastmod>'.date("Y/m/d H:m:s").'</lastmod>';
$content .= '</url>';

$content .= '<url>';
$content .= '<loc>'.site_url("administrative").'</loc>';
$content .= '<lastmod>'.date("Y/m/d H:m:s").'</lastmod>';
$content .= '</url>';

$content .= '<url>';
$content .= '<loc>'.site_url("academic").'</loc>';
$content .= '<lastmod>'.date("Y/m/d H:m:s").'</lastmod>';
$content .= '</url>';

$content .= '<url>';
$content .= '<loc>'.site_url("contact").'</loc>';
$content .= '<lastmod>'.date("Y/m/d H:m:s").'</lastmod>';
$content .= '</url>';

$content .= '<url>';
$content .= '<loc>'.site_url("login").'</loc>';
$content .= '<lastmod>'.date("Y/m/d H:m:s").'</lastmod>';
$content .= '</url>';

$content .= '<url>';
$content .= '<loc>'.site_url("admin").'</loc>';
$content .= '<lastmod>'.date("Y/m/d H:m:s").'</lastmod>';
$content .= '</url>';

$content .= <<< SHUBHKAMNAVENTURES
</urlset>
SHUBHKAMNAVENTURES;

echo $content;
?>
