<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf3cf24dc57cb53947ea0ca9f12e47549
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf3cf24dc57cb53947ea0ca9f12e47549::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf3cf24dc57cb53947ea0ca9f12e47549::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
