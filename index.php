<?php

require_once('/var/www/project/public/site-map-gen/vendor/autoload.php');

use Vlglad\SitemapGen\Sitemap;

$data_arr = [
    [
        'loc' => "https://site.ru/",
        'lastmod' => date("Y-m-d H:i:s"),
        'priority' => '1',
        'changefreq' => 'hourly'
    ],
    [
        'loc' => "https://site.ru/news",
        'lastmod' => date("Y-m-d H:i:s"),
        'priority' => '0.5',
        'changefreq' => 'daily'
    ]
];
$file_type = 'json';

$sitemap = new Sitemap($data_arr, $file_type);
$sitemap->save('');
