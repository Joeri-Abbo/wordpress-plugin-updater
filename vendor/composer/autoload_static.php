<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit50a4ee07271e4059eef707603a3657fb
{
    public static $files = array (
        'c0fcc04072e922b899abaa2c6838e2c6' => __DIR__ . '/../..' . '/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PluginUpdater\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PluginUpdater\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit50a4ee07271e4059eef707603a3657fb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit50a4ee07271e4059eef707603a3657fb::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit50a4ee07271e4059eef707603a3657fb::$classMap;

        }, null, ClassLoader::class);
    }
}