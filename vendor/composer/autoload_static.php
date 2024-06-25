<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0aea9bbf8a0e28e76ac3a18f6c7838e6
{
    public static $files = array (
        '941748b3c8cae4466c827dfb5ca9602a' => __DIR__ . '/..' . '/rmccue/requests/library/Deprecated.php',
    );

    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WpOrg\\Requests\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WpOrg\\Requests\\' => 
        array (
            0 => __DIR__ . '/..' . '/rmccue/requests/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Culqi\\Cards' => __DIR__ . '/..' . '/culqi/culqi-php/lib/Culqi/Cards.php',
        'Culqi\\Charges' => __DIR__ . '/..' . '/culqi/culqi-php/lib/Culqi/Charges.php',
        'Culqi\\Client' => __DIR__ . '/..' . '/culqi/culqi-php/lib/Culqi/Client.php',
        'Culqi\\Culqi' => __DIR__ . '/..' . '/culqi/culqi-php/lib/Culqi/Culqi.php',
        'Culqi\\Customers' => __DIR__ . '/..' . '/culqi/culqi-php/lib/Culqi/Customers.php',
        'Culqi\\Error\\AuthenticationError' => __DIR__ . '/..' . '/culqi/culqi-php/lib/Culqi/Error/Errors.php',
        'Culqi\\Error\\CulqiException' => __DIR__ . '/..' . '/culqi/culqi-php/lib/Culqi/Error/Errors.php',
        'Culqi\\Error\\InputValidationError' => __DIR__ . '/..' . '/culqi/culqi-php/lib/Culqi/Error/Errors.php',
        'Culqi\\Error\\InvalidApiKey' => __DIR__ . '/..' . '/culqi/culqi-php/lib/Culqi/Error/Errors.php',
        'Culqi\\Error\\MethodNotAllowed' => __DIR__ . '/..' . '/culqi/culqi-php/lib/Culqi/Error/Errors.php',
        'Culqi\\Error\\NotFound' => __DIR__ . '/..' . '/culqi/culqi-php/lib/Culqi/Error/Errors.php',
        'Culqi\\Error\\UnableToConnect' => __DIR__ . '/..' . '/culqi/culqi-php/lib/Culqi/Error/Errors.php',
        'Culqi\\Error\\UnhandledError' => __DIR__ . '/..' . '/culqi/culqi-php/lib/Culqi/Error/Errors.php',
        'Culqi\\Events' => __DIR__ . '/..' . '/culqi/culqi-php/lib/Culqi/Events.php',
        'Culqi\\Iins' => __DIR__ . '/..' . '/culqi/culqi-php/lib/Culqi/Iins.php',
        'Culqi\\Orders' => __DIR__ . '/..' . '/culqi/culqi-php/lib/Culqi/Orders.php',
        'Culqi\\Plans' => __DIR__ . '/..' . '/culqi/culqi-php/lib/Culqi/Plans.php',
        'Culqi\\Refunds' => __DIR__ . '/..' . '/culqi/culqi-php/lib/Culqi/Refunds.php',
        'Culqi\\Resource' => __DIR__ . '/..' . '/culqi/culqi-php/lib/Culqi/Resource.php',
        'Culqi\\Subscriptions' => __DIR__ . '/..' . '/culqi/culqi-php/lib/Culqi/Subscriptions.php',
        'Culqi\\Tokens' => __DIR__ . '/..' . '/culqi/culqi-php/lib/Culqi/Tokens.php',
        'Culqi\\Transfers' => __DIR__ . '/..' . '/culqi/culqi-php/lib/Culqi/Transfers.php',
        'Requests' => __DIR__ . '/..' . '/rmccue/requests/library/Requests.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0aea9bbf8a0e28e76ac3a18f6c7838e6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0aea9bbf8a0e28e76ac3a18f6c7838e6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0aea9bbf8a0e28e76ac3a18f6c7838e6::$classMap;

        }, null, ClassLoader::class);
    }
}
