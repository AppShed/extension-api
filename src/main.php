<?php

// Based on composers autoload_real

class AppShedAutoLoader
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/../vendor/composer/ClassLoader.php';
        }
    }

    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('AppShedAutoLoader', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader();
        spl_autoload_unregister(array('AppShedAutoLoader', 'loadClassLoader'));

        $loader->setPsr4('AppShed\\Remote\\', [__DIR__ . '/AppShed/Remote']);
        $loader->register(true);

        return $loader;
    }
}

return AppShedAutoLoader::getLoader();
