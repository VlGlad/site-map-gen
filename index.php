<?php

require_once('/var/www/project/public/site-map-gen/vendor/autoload.php');

use Vlglad\SitemapGen\Sitemap;
use Vlglad\SitemapGen\Writers\CsvFileWriter;

$a = [
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
$cc = new CsvFileWriter;
$b = 'csv';
$aa = new Sitemap($a, $b);
$aa->save('/');