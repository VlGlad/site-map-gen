Библиотека для генерации карты сайта из массива. Тестовое для Pyrobyte.

# Установка

`composer require vlglad/sitemap-gen:dev-master`

# Использование

При создании экземпляра класса библиотки требуется передать два параметра: массив с данными и тип файла
```
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
$file_type = 'xml';
```
После создаем экземпляр
`$sitemap = new Sitemap($data_arr, $file_type);`
При необходимости можно получить или изменить переданные параметры с помощью геттеров и сеттеров

Для создания файла вызываем метод save() с директорией для сохранения файла в качестве параметра
`$sitemap->save('/var/www/project/public/site-map-gen/');`
