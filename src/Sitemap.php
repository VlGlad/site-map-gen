<?php

namespace Vlglad\SitemapGen;

use Vlglad\SitemapGen\Writers\CsvFileWriter;
use Vlglad\SitemapGen\Writers\JsonFileWriter;
use Vlglad\SitemapGen\Writers\XmlFileWriter;


class Sitemap
{
    private $map_arr;
    private $file_format;

    public function __construct(array $map_arr, string $file_format) {
        $this->map_arr = $this->validateMapArr($map_arr);
        $this->file_format = $this->validateFileFormat($file_format);
    }

    public function getMapArr()
    {
        return $this->map_arr;
    }

    public function setMapArr($map_arr)
    {
        $this->map_arr = $this->validateMapArr($map_arr);
    }

    public function getFileFormat()
    {
        return $this->file_format;
    }

    public function setFileFormat($file_format)
    {
        $this->file_format = $this->validateFileFormat($file_format);
    }

    private function validateMapArr(array $map_arr) {
        if (!is_array($map_arr)){
            throw new \InvalidArgumentException('$map_arr should be an array type');
        }

        foreach ($map_arr as $arr) {
            if (!is_array($arr) || !isset($arr['loc']) || !isset($arr['lastmod']) || !isset($arr['priority']) || !isset($arr['changefreq'])){
                throw new \InvalidArgumentException('$map_arr should consist of arrays with "loc", "lastmod", "priority" and "changefreq" keys');
            }
        }
        
        return $map_arr;
    }

    private function validateFileFormat(string $file_format) {
        if (!is_string($file_format) || !in_array(strtolower($file_format), ['xml', 'csv', 'json'])){
            throw new \InvalidArgumentException("$file_format should be string 'xml' or 'csv' or 'json'");
        }
        return $file_format;
    }

    public function save($file_path){
        $class_name = "Vlglad\\SitemapGen\\Writers\\" . ucfirst($this->file_format) . "FileWriter";
        $writer = new $class_name;
        $writer->save($file_path, $this->map_arr);
    }
}