<?php
return [
    ['/', 'HomeController@index'],
    ['/about', 'AboutController@about'],
    ['/library', 'LibraryController@index'],
    ['/topic/{id}', 'LibraryController@topic'], // ID категории (HTML, CSS и т.д.)
    ['/page/{id}', 'LibraryController@page'],   // ID конкретного учебника
    ['/lesson/{id}', 'LibraryController@lesson'], // ID конкретного урока
    ['*', 'DYNAMIC_MODULES_FALLBACK'],
    ['*', 'DYNAMIC_MODULES_FALLBACK', 'POST'],
];