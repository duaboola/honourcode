<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbe7789f6b4d9de1709c4953a2c336bf4
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbe7789f6b4d9de1709c4953a2c336bf4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbe7789f6b4d9de1709c4953a2c336bf4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbe7789f6b4d9de1709c4953a2c336bf4::$classMap;

        }, null, ClassLoader::class);
    }
}
