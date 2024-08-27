<?php

namespace Vlglad\SitemapGen\Writers;

class JsonFileWriter extends BaseWriter
{
    public function save(string $file_path, array $map_arr)
    {
        $this->checkDirectory($file_path);
        
        $json_data = json_encode($map_arr, JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES);

        if (file_put_contents($file_path . 'sitemap.json', $json_data) === false) {
            throw new \Exception('Failed to create json file');
        }
    }
}