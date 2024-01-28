<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4396b250c2a02d46d80223f6d64ddcec
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Shab\\Marketplace\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Shab\\Marketplace\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4396b250c2a02d46d80223f6d64ddcec::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4396b250c2a02d46d80223f6d64ddcec::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4396b250c2a02d46d80223f6d64ddcec::$classMap;

        }, null, ClassLoader::class);
    }
}