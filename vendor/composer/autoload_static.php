<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit777fd687a00bda96a5619a5cd65501b1
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'DiDom\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'DiDom\\' => 
        array (
            0 => __DIR__ . '/..' . '/imangazaliev/didom/src/DiDom',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit777fd687a00bda96a5619a5cd65501b1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit777fd687a00bda96a5619a5cd65501b1::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
