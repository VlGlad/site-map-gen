<?php

namespace Vlglad\SitemapGen\Writers;


class XmlFileWriter extends BaseWriter
{
    public function save(string $file_path, array $map_arr)
    {
        $this->checkDirectory($file_path);

        $xml = new \SimpleXMLElement("<urlset/>");

        $len = count($map_arr);
        for ($i = 0; $i < $len; $i++){
            $url = $xml->addChild('url');
            $url->addChild('loc', $map_arr[$i]['loc']);
            $url->addChild('lastmod', $map_arr[$i]['lastmod']);
            $url->addChild('priority', $map_arr[$i]['priority']);
            $url->addChild('changefreq', $map_arr[$i]['changefreq']);
        }
        $xml_doc = new \DOMDocument("1.0");
        $xml_doc->formatOutput = true;
        $xml_doc->appendChild($xml_doc->importNode(dom_import_simplexml($xml), true));
        
        if (file_put_contents($file_path . 'sitemap.xml', $xml_doc->saveXML()) === false){
            throw new \Exception('Failed to create xml file');
        }
    }
}