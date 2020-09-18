<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5f50c41c87b73acb9f05645ee2082a66
{
    public static $prefixLengthsPsr4 = array (
        'Z' => 
        array (
            'Zend\\Escaper\\' => 13,
        ),
        'P' => 
        array (
            'Pis0sion\\src\\' => 13,
            'PhpOffice\\PhpWord\\' => 18,
            'PhpOffice\\Common\\' => 17,
            'PalePurple\\RateLimit\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Zend\\Escaper\\' => 
        array (
            0 => __DIR__ . '/..' . '/zendframework/zend-escaper/src',
        ),
        'Pis0sion\\src\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'PhpOffice\\PhpWord\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpoffice/phpword/src/PhpWord',
        ),
        'PhpOffice\\Common\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpoffice/common/src/Common',
        ),
        'PalePurple\\RateLimit\\' => 
        array (
            0 => __DIR__ . '/..' . '/palepurple/rate-limit/src',
        ),
    );

    public static $classMap = array (
        'PclZip' => __DIR__ . '/..' . '/pclzip/pclzip/pclzip.lib.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5f50c41c87b73acb9f05645ee2082a66::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5f50c41c87b73acb9f05645ee2082a66::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5f50c41c87b73acb9f05645ee2082a66::$classMap;

        }, null, ClassLoader::class);
    }
}
