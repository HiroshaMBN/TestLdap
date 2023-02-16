<?php

$config = parse_ini_file('data.ini', true);
$serveURL = $config['LDAP']['ServeURL'];
$userField = $config['LDAP']['userField'];
$loginID = $config['LDAP']['LoginID'];
$DN = $config['LDAP']['DN'];
$DNArry =(str_replace(':', '=', $DN));
$password = $config['LDAP']['password'];
return [


    /*
    |--------------------------------------------------------------------------
    | Default LDAP Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the LDAP connections below you wish
    | to use as your default connection for all LDAP operations. Of
    | course you may add as many connections you'd like below.
    |
    */

    'default' => env('LDAP_CONNECTION', 'default'),

    /*
    |--------------------------------------------------------------------------
    | LDAP Connections
    |--------------------------------------------------------------------------
    |
    | Below you may configure each LDAP connection your application requires
    | access to. Be sure to include a valid base DN - otherwise you may
    | not receive any results when performing LDAP search operations.
    |
    */

    'connections' => [

        'default' => [

                'hosts' => [$serveURL],
                'username' => $loginID,
                'password' => $password,
                'port' => 389,
                'base_dn' => $DNArry,
                'timeout' => 5,
                'use_ssl' => env('LDAP_SSL', false),
                'use_tls' => env('LDAP_TLS', false),



                // 'hosts' => [env('LDAP_HOST', '10.128.41.32')],
                // 'username' => env('LDAP_USERNAME', 'bluechip\testpm'),
                // 'password' => env('LDAP_PASSWORD', 'zaq1@WSX'),
                // 'port' => env('LDAP_PORT', 389),
                // 'base_dn' => env('LDAP_BASE_DN', 'ou=users,ou=bcts,dc=bluechip,dc=lk'),
                // 'timeout' => env('LDAP_TIMEOUT', 5),
                // 'use_ssl' => env('LDAP_SSL', false),
                // 'use_tls' => env('LDAP_TLS', false),






        ],

    ],



    // 'hosts' => [env('LDAP_HOST', '10.128.41.32')],
    // 'username' => env('LDAP_USERNAME', 'bluechip\testpm'),
    // 'password' => env('LDAP_PASSWORD', 'zaq1@WSX'),
    // 'port' => env('LDAP_PORT', 389),
    // 'base_dn' => env('LDAP_BASE_DN', 'ou=users,ou=bcts,dc=bluechip,dc=lk'),
    // 'timeout' => env('LDAP_TIMEOUT', 5),
    // 'use_ssl' => env('LDAP_SSL', false),
    // 'use_tls' => env('LDAP_TLS', false),






    /*
    |--------------------------------------------------------------------------
    | LDAP Logging
    |--------------------------------------------------------------------------
    |
    | When LDAP logging is enabled, all LDAP search and authentication
    | operations are logged using the default application logging
    | driver. This can assist in debugging issues and more.
    |
    */

    'logging' => env('LDAP_LOGGING', true),

    'logging_channel' => env('LOG_CHANNEL', 'stack'),

    /*
    |--------------------------------------------------------------------------
    | LDAP Cache
    |--------------------------------------------------------------------------
    |
    | LDAP caching enables the ability of caching search results using the
    | query builder. This is great for running expensive operations that
    | may take many seconds to complete, such as a pagination request.
    |
    */

    'cache' => [
        'enabled' => env('LDAP_CACHE', false),
        'driver' => env('CACHE_DRIVER', 'file'),
    ],

];
