<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitbe7789f6b4d9de1709c4953a2c336bf4
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitbe7789f6b4d9de1709c4953a2c336bf4', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitbe7789f6b4d9de1709c4953a2c336bf4', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitbe7789f6b4d9de1709c4953a2c336bf4::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
