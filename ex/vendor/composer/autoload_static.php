<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6122c20c33b5421b65cb49a94937ccbe
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'EG\\' => 3,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'EG\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6122c20c33b5421b65cb49a94937ccbe::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6122c20c33b5421b65cb49a94937ccbe::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
