<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit03d6175cea5f6bfba9b7ba68a1483115
{
    public static $files = array (
        '3109cb1a231dcd04bee1f9f620d46975' => __DIR__ . '/..' . '/paragonie/sodium_compat/autoload.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Pusher\\' => 7,
            'Psr\\Log\\' => 8,
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Pusher\\' => 
        array (
            0 => __DIR__ . '/..' . '/pusher/pusher-php-server/src',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit03d6175cea5f6bfba9b7ba68a1483115::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit03d6175cea5f6bfba9b7ba68a1483115::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit03d6175cea5f6bfba9b7ba68a1483115::$classMap;

        }, null, ClassLoader::class);
    }
}
