<?php

namespace Vlglad\SitemapGen\Writers;

use Vlglad\SitemapGen\Interfaces\WriterInterface;

abstract class BaseWriter implements WriterInterface
{
    protected function checkDirectory(string $file_path){
        if (!is_dir($file_path)) {
            mkdir($file_path, 655, true);
        }
    }

    abstract public function save(string $file_path, array $map_arr);
}