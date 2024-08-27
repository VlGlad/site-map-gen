<?php

namespace Vlglad\SitemapGen\Interfaces;


interface WriterInterface
{
    public function save(string $file_path, array $map_arr);
}