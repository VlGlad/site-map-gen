<?php

namespace Vlglad\SitemapGen\Writers;

class CsvFileWriter extends BaseWriter
{
    public function save(string $file_path, array $map_arr)
    {
        $this->checkDirectory($file_path);

        $data = [['loc', 'lastmod', 'priority', 'changefreq']];

        $len = count($map_arr);
        for ($i = 0; $i < $len; $i++){
            $data[] = [
                $map_arr[$i]['loc'],
                $map_arr[$i]['lastmod'],
                $map_arr[$i]['priority'],
                $map_arr[$i]['changefreq']];
        }
        
        $file = fopen($file_path . 'sitemap.csv', 'w');
    
        if ($file === false) {
            throw new \Exception('Failed to create csv file');
        }
    
        foreach ($data as $row) {
            if (fputcsv($file, $row, ';') === false) {
                fclose($file);
                throw new \Exception('Failed to append csv into file');
            }
        }
    
        fclose($file);
    }
}