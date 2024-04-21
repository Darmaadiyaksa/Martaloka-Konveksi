<?php











namespace Composer;

use Composer\Autoload\ClassLoader;
use Composer\Semver\VersionParser;






class InstalledVersions
{
private static $installed = array (
  'root' => 
  array (
    'pretty_version' => 'dev-main',
    'version' => 'dev-main',
    'aliases' => 
    array (
    ),
    'reference' => '4b0e42eab0c412dab8ccc1666813233d533f329a',
    'name' => 'laravel/laravel',
  ),
  'versions' => 
  array (
    'asm89/stack-cors' => 
    array (
      'pretty_version' => 'v2.1.1',
      'version' => '2.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '73e5b88775c64ccc0b84fb60836b30dc9d92ac4a',
    ),
    'awobaz/compoships' => 
    array (
      'pretty_version' => '2.2.3',
      'version' => '2.2.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '404901e2ebd6794f70d2710a56edd4b0c500ce1f',
    ),
    'barryvdh/laravel-dompdf' => 
    array (
      'pretty_version' => 'v2.0.1',
      'version' => '2.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '9843d2be423670fb434f4c978b3c0f4dd92c87a6',
    ),
    'brick/math' => 
    array (
      'pretty_version' => '0.11.0',
      'version' => '0.11.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '0ad82ce168c82ba30d1c01ec86116ab52f589478',
    ),
    'carbonphp/carbon-doctrine-types' => 
    array (
      'pretty_version' => '3.2.0',
      'version' => '3.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '18ba5ddfec8976260ead6e866180bd5d2f71aa1d',
    ),
    'composer/semver' => 
    array (
      'pretty_version' => '3.4.0',
      'version' => '3.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '35e8d0af4486141bc745f23a29cc2091eb624a32',
    ),
    'cordoval/hamcrest-php' => 
    array (
      'replaced' => 
      array (
        0 => '*',
      ),
    ),
    'davedevelopment/hamcrest-php' => 
    array (
      'replaced' => 
      array (
        0 => '*',
      ),
    ),
    'dflydev/dot-access-data' => 
    array (
      'pretty_version' => 'v3.0.2',
      'version' => '3.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f41715465d65213d644d3141a6a93081be5d3549',
    ),
    'doctrine/inflector' => 
    array (
      'pretty_version' => '2.0.10',
      'version' => '2.0.10.0',
      'aliases' => 
      array (
      ),
      'reference' => '5817d0659c5b50c9b950feb9af7b9668e2c436bc',
    ),
    'doctrine/instantiator' => 
    array (
      'pretty_version' => '2.0.0',
      'version' => '2.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c6222283fa3f4ac679f8b9ced9a4e23f163e80d0',
    ),
    'doctrine/lexer' => 
    array (
      'pretty_version' => '3.0.1',
      'version' => '3.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '31ad66abc0fc9e1a1f2d9bc6a42668d2fbbcd6dd',
    ),
    'dompdf/dompdf' => 
    array (
      'pretty_version' => 'v2.0.4',
      'version' => '2.0.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '093f2d9739cec57428e39ddadedfd4f3ae862c0f',
    ),
    'dragonmantank/cron-expression' => 
    array (
      'pretty_version' => 'v3.3.3',
      'version' => '3.3.3.0',
      'aliases' => 
      array (
      ),
      'reference' => 'adfb1f505deb6384dc8b39804c5065dd3c8c8c0a',
    ),
    'egulias/email-validator' => 
    array (
      'pretty_version' => '4.0.2',
      'version' => '4.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ebaaf5be6c0286928352e054f2d5125608e5405e',
    ),
    'ezyang/htmlpurifier' => 
    array (
      'pretty_version' => 'v4.17.0',
      'version' => '4.17.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'bbc513d79acf6691fa9cf10f192c90dd2957f18c',
    ),
    'fakerphp/faker' => 
    array (
      'pretty_version' => 'v1.23.0',
      'version' => '1.23.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e3daa170d00fde61ea7719ef47bb09bb8f1d9b01',
    ),
    'filp/whoops' => 
    array (
      'pretty_version' => '2.15.4',
      'version' => '2.15.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a139776fa3f5985a50b509f2a02ff0f709d2a546',
    ),
    'fruitcake/laravel-cors' => 
    array (
      'pretty_version' => 'v2.2.0',
      'version' => '2.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '783a74f5e3431d7b9805be8afb60fd0a8f743534',
    ),
    'fruitcake/php-cors' => 
    array (
      'pretty_version' => 'v1.3.0',
      'version' => '1.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '3d158f36e7875e2f040f37bc0573956240a5a38b',
    ),
    'graham-campbell/result-type' => 
    array (
      'pretty_version' => 'v1.1.2',
      'version' => '1.1.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fbd48bce38f73f8a4ec8583362e732e4095e5862',
    ),
    'guzzlehttp/guzzle' => 
    array (
      'pretty_version' => '7.8.1',
      'version' => '7.8.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '41042bc7ab002487b876a0683fc8dce04ddce104',
    ),
    'guzzlehttp/promises' => 
    array (
      'pretty_version' => '2.0.2',
      'version' => '2.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'bbff78d96034045e58e13dedd6ad91b5d1253223',
    ),
    'guzzlehttp/psr7' => 
    array (
      'pretty_version' => '2.6.2',
      'version' => '2.6.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '45b30f99ac27b5ca93cb4831afe16285f57b8221',
    ),
    'guzzlehttp/uri-template' => 
    array (
      'pretty_version' => 'v1.0.3',
      'version' => '1.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ecea8feef63bd4fef1f037ecb288386999ecc11c',
    ),
    'hamcrest/hamcrest-php' => 
    array (
      'pretty_version' => 'v2.0.1',
      'version' => '2.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '8c3d0a3f6af734494ad8f6fbbee0ba92422859f3',
    ),
    'illuminate/auth' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.52.16',
      ),
    ),
    'illuminate/broadcasting' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.52.16',
      ),
    ),
    'illuminate/bus' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.52.16',
      ),
    ),
    'illuminate/cache' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.52.16',
      ),
    ),
    'illuminate/collections' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.52.16',
      ),
    ),
    'illuminate/conditionable' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.52.16',
      ),
    ),
    'illuminate/config' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.52.16',
      ),
    ),
    'illuminate/console' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.52.16',
      ),
    ),
    'illuminate/container' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.52.16',
      ),
    ),
    'illuminate/contracts' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.52.16',
      ),
    ),
    'illuminate/cookie' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.52.16',
      ),
    ),
    'illuminate/database' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.52.16',
      ),
    ),
    'illuminate/encryption' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.52.16',
      ),
    ),
    'illuminate/events' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.52.16',
      ),
    ),
    'illuminate/filesystem' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.52.16',
      ),
    ),
    'illuminate/hashing' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.52.16',
      ),
    ),
    'illuminate/http' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.52.16',
      ),
    ),
    'illuminate/log' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.52.16',
      ),
    ),
    'illuminate/macroable' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.52.16',
      ),
    ),
    'illuminate/mail' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.52.16',
      ),
    ),
    'illuminate/notifications' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.52.16',
      ),
    ),
    'illuminate/pagination' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.52.16',
      ),
    ),
    'illuminate/pipeline' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.52.16',
      ),
    ),
    'illuminate/queue' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.52.16',
      ),
    ),
    'illuminate/redis' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.52.16',
      ),
    ),
    'illuminate/routing' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.52.16',
      ),
    ),
    'illuminate/session' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.52.16',
      ),
    ),
    'illuminate/support' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.52.16',
      ),
    ),
    'illuminate/testing' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.52.16',
      ),
    ),
    'illuminate/translation' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.52.16',
      ),
    ),
    'illuminate/validation' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.52.16',
      ),
    ),
    'illuminate/view' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.52.16',
      ),
    ),
    'intervention/image' => 
    array (
      'pretty_version' => '2.7.2',
      'version' => '2.7.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '04be355f8d6734c826045d02a1079ad658322dad',
    ),
    'kodova/hamcrest-php' => 
    array (
      'replaced' => 
      array (
        0 => '*',
      ),
    ),
    'laravel/framework' => 
    array (
      'pretty_version' => 'v9.52.16',
      'version' => '9.52.16.0',
      'aliases' => 
      array (
      ),
      'reference' => '082345d76fc6a55b649572efe10b11b03e279d24',
    ),
    'laravel/laravel' => 
    array (
      'pretty_version' => 'dev-main',
      'version' => 'dev-main',
      'aliases' => 
      array (
      ),
      'reference' => '4b0e42eab0c412dab8ccc1666813233d533f329a',
    ),
    'laravel/sail' => 
    array (
      'pretty_version' => 'v1.26.0',
      'version' => '1.26.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c60fe037004e272efd0d81f416ed2bfc623d70b4',
    ),
    'laravel/sanctum' => 
    array (
      'pretty_version' => 'v2.15.1',
      'version' => '2.15.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '31fbe6f85aee080c4dc2f9b03dc6dd5d0ee72473',
    ),
    'laravel/serializable-closure' => 
    array (
      'pretty_version' => 'v1.3.3',
      'version' => '1.3.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '3dbf8a8e914634c48d389c1234552666b3d43754',
    ),
    'laravel/tinker' => 
    array (
      'pretty_version' => 'v2.8.2',
      'version' => '2.8.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b936d415b252b499e8c3b1f795cd4fc20f57e1f3',
    ),
    'laravel/ui' => 
    array (
      'pretty_version' => 'v4.2.2',
      'version' => '4.2.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a58ec468db4a340b33f3426c778784717a2c144b',
    ),
    'laravelcollective/html' => 
    array (
      'pretty_version' => 'v6.4.1',
      'version' => '6.4.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '64ddfdcaeeb8d332bd98bef442bef81e39c3910b',
    ),
    'league/commonmark' => 
    array (
      'pretty_version' => '2.4.2',
      'version' => '2.4.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '91c24291965bd6d7c46c46a12ba7492f83b1cadf',
    ),
    'league/config' => 
    array (
      'pretty_version' => 'v1.2.0',
      'version' => '1.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '754b3604fb2984c71f4af4a9cbe7b57f346ec1f3',
    ),
    'league/flysystem' => 
    array (
      'pretty_version' => '3.24.0',
      'version' => '3.24.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b25a361508c407563b34fac6f64a8a17a8819675',
    ),
    'league/flysystem-local' => 
    array (
      'pretty_version' => '3.23.1',
      'version' => '3.23.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b884d2bf9b53bb4804a56d2df4902bb51e253f00',
    ),
    'league/fractal' => 
    array (
      'pretty_version' => '0.20.1',
      'version' => '0.20.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '8b9d39b67624db9195c06f9c1ffd0355151eaf62',
    ),
    'league/mime-type-detection' => 
    array (
      'pretty_version' => '1.15.0',
      'version' => '1.15.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ce0f4d1e8a6f4eb0ddff33f57c69c50fd09f4301',
    ),
    'maatwebsite/excel' => 
    array (
      'pretty_version' => '3.1.55',
      'version' => '3.1.55.0',
      'aliases' => 
      array (
      ),
      'reference' => '6d9d791dcdb01a9b6fd6f48d46f0d5fff86e6260',
    ),
    'maennchen/zipstream-php' => 
    array (
      'pretty_version' => '3.1.0',
      'version' => '3.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b8174494eda667f7d13876b4a7bfef0f62a7c0d1',
    ),
    'markbaker/complex' => 
    array (
      'pretty_version' => '3.0.2',
      'version' => '3.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '95c56caa1cf5c766ad6d65b6344b807c1e8405b9',
    ),
    'markbaker/matrix' => 
    array (
      'pretty_version' => '3.0.1',
      'version' => '3.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '728434227fe21be27ff6d86621a1b13107a2562c',
    ),
    'masterminds/html5' => 
    array (
      'pretty_version' => '2.8.1',
      'version' => '2.8.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f47dcf3c70c584de14f21143c55d9939631bc6cf',
    ),
    'mews/captcha' => 
    array (
      'pretty_version' => '3.3.2',
      'version' => '3.3.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '7aee0e80bcf7eb17fc0d574244e384e56ae2af77',
    ),
    'mockery/mockery' => 
    array (
      'pretty_version' => '1.6.7',
      'version' => '1.6.7.0',
      'aliases' => 
      array (
      ),
      'reference' => '0cc058854b3195ba21dc6b1f7b1f60f4ef3a9c06',
    ),
    'monolog/monolog' => 
    array (
      'pretty_version' => '2.9.2',
      'version' => '2.9.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '437cb3628f4cf6042cc10ae97fc2b8472e48ca1f',
    ),
    'mtdowling/cron-expression' => 
    array (
      'replaced' => 
      array (
        0 => '^1.0',
      ),
    ),
    'myclabs/deep-copy' => 
    array (
      'pretty_version' => '1.11.1',
      'version' => '1.11.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '7284c22080590fb39f2ffa3e9057f10a4ddd0e0c',
    ),
    'nesbot/carbon' => 
    array (
      'pretty_version' => '2.72.3',
      'version' => '2.72.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '0c6fd108360c562f6e4fd1dedb8233b423e91c83',
    ),
    'nette/schema' => 
    array (
      'pretty_version' => 'v1.3.0',
      'version' => '1.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a6d3a6d1f545f01ef38e60f375d1cf1f4de98188',
    ),
    'nette/utils' => 
    array (
      'pretty_version' => 'v4.0.4',
      'version' => '4.0.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd3ad0aa3b9f934602cb3e3902ebccf10be34d218',
    ),
    'nikic/php-parser' => 
    array (
      'pretty_version' => 'v4.18.0',
      'version' => '4.18.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '1bcbb2179f97633e98bbbc87044ee2611c7d7999',
    ),
    'nunomaduro/collision' => 
    array (
      'pretty_version' => 'v6.4.0',
      'version' => '6.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f05978827b9343cba381ca05b8c7deee346b6015',
    ),
    'nunomaduro/termwind' => 
    array (
      'pretty_version' => 'v1.15.1',
      'version' => '1.15.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '8ab0b32c8caa4a2e09700ea32925441385e4a5dc',
    ),
    'phar-io/manifest' => 
    array (
      'pretty_version' => '2.0.3',
      'version' => '2.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '97803eca37d319dfa7826cc2437fc020857acb53',
    ),
    'phar-io/version' => 
    array (
      'pretty_version' => '3.2.1',
      'version' => '3.2.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '4f7fd7836c6f332bb2933569e566a0d6c4cbed74',
    ),
    'phenx/php-font-lib' => 
    array (
      'pretty_version' => '0.5.5',
      'version' => '0.5.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '671df0f3516252011aa94f9e8e3b3b66199339f8',
    ),
    'phenx/php-svg-lib' => 
    array (
      'pretty_version' => '0.5.1',
      'version' => '0.5.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '8a8a1ebcf6aea861ef30197999f096f7bd4b4456',
    ),
    'phpoffice/phpspreadsheet' => 
    array (
      'pretty_version' => '1.29.0',
      'version' => '1.29.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fde2ccf55eaef7e86021ff1acce26479160a0fa0',
    ),
    'phpoption/phpoption' => 
    array (
      'pretty_version' => '1.9.2',
      'version' => '1.9.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '80735db690fe4fc5c76dfa7f9b770634285fa820',
    ),
    'phpunit/php-code-coverage' => 
    array (
      'pretty_version' => '9.2.31',
      'version' => '9.2.31.0',
      'aliases' => 
      array (
      ),
      'reference' => '48c34b5d8d983006bd2adc2d0de92963b9155965',
    ),
    'phpunit/php-file-iterator' => 
    array (
      'pretty_version' => '3.0.6',
      'version' => '3.0.6.0',
      'aliases' => 
      array (
      ),
      'reference' => 'cf1c2e7c203ac650e352f4cc675a7021e7d1b3cf',
    ),
    'phpunit/php-invoker' => 
    array (
      'pretty_version' => '3.1.1',
      'version' => '3.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '5a10147d0aaf65b58940a0b72f71c9ac0423cc67',
    ),
    'phpunit/php-text-template' => 
    array (
      'pretty_version' => '2.0.4',
      'version' => '2.0.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '5da5f67fc95621df9ff4c4e5a84d6a8a2acf7c28',
    ),
    'phpunit/php-timer' => 
    array (
      'pretty_version' => '5.0.3',
      'version' => '5.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '5a63ce20ed1b5bf577850e2c4e87f4aa902afbd2',
    ),
    'phpunit/phpunit' => 
    array (
      'pretty_version' => '9.6.17',
      'version' => '9.6.17.0',
      'aliases' => 
      array (
      ),
      'reference' => '1a156980d78a6666721b7e8e8502fe210b587fcd',
    ),
    'psr/clock' => 
    array (
      'pretty_version' => '1.0.0',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e41a24703d4560fd0acb709162f73b8adfc3aa0d',
    ),
    'psr/clock-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'psr/container' => 
    array (
      'pretty_version' => '2.0.2',
      'version' => '2.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c71ecc56dfe541dbd90c5360474fbc405f8d5963',
    ),
    'psr/container-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.1|2.0',
      ),
    ),
    'psr/event-dispatcher' => 
    array (
      'pretty_version' => '1.0.0',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'dbefd12671e8a14ec7f180cab83036ed26714bb0',
    ),
    'psr/event-dispatcher-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'psr/http-client' => 
    array (
      'pretty_version' => '1.0.3',
      'version' => '1.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => 'bb5906edc1c324c9a05aa0873d40117941e5fa90',
    ),
    'psr/http-client-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'psr/http-factory' => 
    array (
      'pretty_version' => '1.0.2',
      'version' => '1.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e616d01114759c4c489f93b099585439f795fe35',
    ),
    'psr/http-factory-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'psr/http-message' => 
    array (
      'pretty_version' => '2.0',
      'version' => '2.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '402d35bcb92c70c026d1a6a9883f06b2ead23d71',
    ),
    'psr/http-message-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'psr/log' => 
    array (
      'pretty_version' => '3.0.0',
      'version' => '3.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fe5ea303b0887d5caefd3d431c3e61ad47037001',
    ),
    'psr/log-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0.0 || 2.0.0 || 3.0.0',
        1 => '1.0|2.0|3.0',
      ),
    ),
    'psr/simple-cache' => 
    array (
      'pretty_version' => '3.0.0',
      'version' => '3.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '764e0b3939f5ca87cb904f570ef9be2d78a07865',
    ),
    'psr/simple-cache-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0|2.0|3.0',
      ),
    ),
    'psy/psysh' => 
    array (
      'pretty_version' => 'v0.11.22',
      'version' => '0.11.22.0',
      'aliases' => 
      array (
      ),
      'reference' => '128fa1b608be651999ed9789c95e6e2a31b5802b',
    ),
    'ralouphie/getallheaders' => 
    array (
      'pretty_version' => '3.0.3',
      'version' => '3.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '120b605dfeb996808c31b6477290a714d356e822',
    ),
    'ramsey/collection' => 
    array (
      'pretty_version' => '2.0.0',
      'version' => '2.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a4b48764bfbb8f3a6a4d1aeb1a35bb5e9ecac4a5',
    ),
    'ramsey/uuid' => 
    array (
      'pretty_version' => '4.7.5',
      'version' => '4.7.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '5f0df49ae5ad6efb7afa69e6bfab4e5b1e080d8e',
    ),
    'rhumsaa/uuid' => 
    array (
      'replaced' => 
      array (
        0 => '4.7.5',
      ),
    ),
    'sabberworm/php-css-parser' => 
    array (
      'pretty_version' => '8.4.0',
      'version' => '8.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e41d2140031d533348b2192a83f02d8dd8a71d30',
    ),
    'sebastian/cli-parser' => 
    array (
      'pretty_version' => '1.0.2',
      'version' => '1.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '2b56bea83a09de3ac06bb18b92f068e60cc6f50b',
    ),
    'sebastian/code-unit' => 
    array (
      'pretty_version' => '1.0.8',
      'version' => '1.0.8.0',
      'aliases' => 
      array (
      ),
      'reference' => '1fc9f64c0927627ef78ba436c9b17d967e68e120',
    ),
    'sebastian/code-unit-reverse-lookup' => 
    array (
      'pretty_version' => '2.0.3',
      'version' => '2.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ac91f01ccec49fb77bdc6fd1e548bc70f7faa3e5',
    ),
    'sebastian/comparator' => 
    array (
      'pretty_version' => '4.0.8',
      'version' => '4.0.8.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fa0f136dd2334583309d32b62544682ee972b51a',
    ),
    'sebastian/complexity' => 
    array (
      'pretty_version' => '2.0.3',
      'version' => '2.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '25f207c40d62b8b7aa32f5ab026c53561964053a',
    ),
    'sebastian/diff' => 
    array (
      'pretty_version' => '4.0.6',
      'version' => '4.0.6.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ba01945089c3a293b01ba9badc29ad55b106b0bc',
    ),
    'sebastian/environment' => 
    array (
      'pretty_version' => '5.1.5',
      'version' => '5.1.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '830c43a844f1f8d5b7a1f6d6076b784454d8b7ed',
    ),
    'sebastian/exporter' => 
    array (
      'pretty_version' => '4.0.6',
      'version' => '4.0.6.0',
      'aliases' => 
      array (
      ),
      'reference' => '78c00df8f170e02473b682df15bfcdacc3d32d72',
    ),
    'sebastian/global-state' => 
    array (
      'pretty_version' => '5.0.7',
      'version' => '5.0.7.0',
      'aliases' => 
      array (
      ),
      'reference' => 'bca7df1f32ee6fe93b4d4a9abbf69e13a4ada2c9',
    ),
    'sebastian/lines-of-code' => 
    array (
      'pretty_version' => '1.0.4',
      'version' => '1.0.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e1e4a170560925c26d424b6a03aed157e7dcc5c5',
    ),
    'sebastian/object-enumerator' => 
    array (
      'pretty_version' => '4.0.4',
      'version' => '4.0.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '5c9eeac41b290a3712d88851518825ad78f45c71',
    ),
    'sebastian/object-reflector' => 
    array (
      'pretty_version' => '2.0.4',
      'version' => '2.0.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b4f479ebdbf63ac605d183ece17d8d7fe49c15c7',
    ),
    'sebastian/recursion-context' => 
    array (
      'pretty_version' => '4.0.5',
      'version' => '4.0.5.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e75bd0f07204fec2a0af9b0f3cfe97d05f92efc1',
    ),
    'sebastian/resource-operations' => 
    array (
      'pretty_version' => '3.0.3',
      'version' => '3.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '0f4443cb3a1d92ce809899753bc0d5d5a8dd19a8',
    ),
    'sebastian/type' => 
    array (
      'pretty_version' => '3.2.1',
      'version' => '3.2.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '75e2c2a32f5e0b3aef905b9ed0b179b953b3d7c7',
    ),
    'sebastian/version' => 
    array (
      'pretty_version' => '3.0.2',
      'version' => '3.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c6c1022351a901512170118436c764e473f6de8c',
    ),
    'spatie/backtrace' => 
    array (
      'pretty_version' => '1.5.3',
      'version' => '1.5.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '483f76a82964a0431aa836b6ed0edde0c248e3ab',
    ),
    'spatie/flare-client-php' => 
    array (
      'pretty_version' => '1.4.3',
      'version' => '1.4.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '5db2fdd743c3ede33f2a5367d89ec1a7c9c1d1ec',
    ),
    'spatie/ignition' => 
    array (
      'pretty_version' => '1.11.3',
      'version' => '1.11.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '3d886de644ff7a5b42e4d27c1e1f67c8b5f00044',
    ),
    'spatie/laravel-ignition' => 
    array (
      'pretty_version' => '1.6.4',
      'version' => '1.6.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '1a2b4bd3d48c72526c0ba417687e5c56b5cf49bc',
    ),
    'symfony/console' => 
    array (
      'pretty_version' => 'v6.4.4',
      'version' => '6.4.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '0d9e4eb5ad413075624378f474c4167ea202de78',
    ),
    'symfony/css-selector' => 
    array (
      'pretty_version' => 'v6.4.3',
      'version' => '6.4.3.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ee0f7ed5cf298cc019431bb3b3977ebc52b86229',
    ),
    'symfony/deprecation-contracts' => 
    array (
      'pretty_version' => 'v3.4.0',
      'version' => '3.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '7c3aff79d10325257a001fcf92d991f24fc967cf',
    ),
    'symfony/error-handler' => 
    array (
      'pretty_version' => 'v6.4.4',
      'version' => '6.4.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c725219bdf2afc59423c32793d5019d2a904e13a',
    ),
    'symfony/event-dispatcher' => 
    array (
      'pretty_version' => 'v6.4.3',
      'version' => '6.4.3.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ae9d3a6f3003a6caf56acd7466d8d52378d44fef',
    ),
    'symfony/event-dispatcher-contracts' => 
    array (
      'pretty_version' => 'v3.4.0',
      'version' => '3.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a76aed96a42d2b521153fb382d418e30d18b59df',
    ),
    'symfony/event-dispatcher-implementation' => 
    array (
      'provided' => 
      array (
        0 => '2.0|3.0',
      ),
    ),
    'symfony/finder' => 
    array (
      'pretty_version' => 'v6.4.0',
      'version' => '6.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '11d736e97f116ac375a81f96e662911a34cd50ce',
    ),
    'symfony/http-foundation' => 
    array (
      'pretty_version' => 'v6.4.4',
      'version' => '6.4.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ebc713bc6e6f4b53f46539fc158be85dfcd77304',
    ),
    'symfony/http-kernel' => 
    array (
      'pretty_version' => 'v6.4.4',
      'version' => '6.4.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '7a186f64a7f02787c04e8476538624d6aa888e42',
    ),
    'symfony/mailer' => 
    array (
      'pretty_version' => 'v6.4.4',
      'version' => '6.4.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '791c5d31a8204cf3db0c66faab70282307f4376b',
    ),
    'symfony/mime' => 
    array (
      'pretty_version' => 'v6.4.3',
      'version' => '6.4.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '5017e0a9398c77090b7694be46f20eb796262a34',
    ),
    'symfony/polyfill-ctype' => 
    array (
      'pretty_version' => 'v1.29.0',
      'version' => '1.29.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ef4d7e442ca910c4764bce785146269b30cb5fc4',
    ),
    'symfony/polyfill-intl-grapheme' => 
    array (
      'pretty_version' => 'v1.29.0',
      'version' => '1.29.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '32a9da87d7b3245e09ac426c83d334ae9f06f80f',
    ),
    'symfony/polyfill-intl-idn' => 
    array (
      'pretty_version' => 'v1.29.0',
      'version' => '1.29.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a287ed7475f85bf6f61890146edbc932c0fff919',
    ),
    'symfony/polyfill-intl-normalizer' => 
    array (
      'pretty_version' => 'v1.29.0',
      'version' => '1.29.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'bc45c394692b948b4d383a08d7753968bed9a83d',
    ),
    'symfony/polyfill-mbstring' => 
    array (
      'pretty_version' => 'v1.29.0',
      'version' => '1.29.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '9773676c8a1bb1f8d4340a62efe641cf76eda7ec',
    ),
    'symfony/polyfill-php72' => 
    array (
      'pretty_version' => 'v1.29.0',
      'version' => '1.29.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '861391a8da9a04cbad2d232ddd9e4893220d6e25',
    ),
    'symfony/polyfill-php80' => 
    array (
      'pretty_version' => 'v1.29.0',
      'version' => '1.29.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '87b68208d5c1188808dd7839ee1e6c8ec3b02f1b',
    ),
    'symfony/polyfill-php83' => 
    array (
      'pretty_version' => 'v1.29.0',
      'version' => '1.29.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '86fcae159633351e5fd145d1c47de6c528f8caff',
    ),
    'symfony/polyfill-uuid' => 
    array (
      'pretty_version' => 'v1.29.0',
      'version' => '1.29.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '3abdd21b0ceaa3000ee950097bc3cf9efc137853',
    ),
    'symfony/process' => 
    array (
      'pretty_version' => 'v6.4.4',
      'version' => '6.4.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '710e27879e9be3395de2b98da3f52a946039f297',
    ),
    'symfony/routing' => 
    array (
      'pretty_version' => 'v6.4.3',
      'version' => '6.4.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '3b2957ad54902f0f544df83e3d58b38d7e8e5842',
    ),
    'symfony/service-contracts' => 
    array (
      'pretty_version' => 'v3.4.1',
      'version' => '3.4.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fe07cbc8d837f60caf7018068e350cc5163681a0',
    ),
    'symfony/string' => 
    array (
      'pretty_version' => 'v6.4.4',
      'version' => '6.4.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '4e465a95bdc32f49cf4c7f07f751b843bbd6dcd9',
    ),
    'symfony/translation' => 
    array (
      'pretty_version' => 'v6.4.4',
      'version' => '6.4.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'bce6a5a78e94566641b2594d17e48b0da3184a8e',
    ),
    'symfony/translation-contracts' => 
    array (
      'pretty_version' => 'v3.4.1',
      'version' => '3.4.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '06450585bf65e978026bda220cdebca3f867fde7',
    ),
    'symfony/translation-implementation' => 
    array (
      'provided' => 
      array (
        0 => '2.3|3.0',
      ),
    ),
    'symfony/uid' => 
    array (
      'pretty_version' => 'v6.4.3',
      'version' => '6.4.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '1d31267211cc3a2fff32bcfc7c1818dac41b6fc0',
    ),
    'symfony/var-dumper' => 
    array (
      'pretty_version' => 'v6.4.4',
      'version' => '6.4.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b439823f04c98b84d4366c79507e9da6230944b1',
    ),
    'symfony/yaml' => 
    array (
      'pretty_version' => 'v6.3.7',
      'version' => '6.3.7.0',
      'aliases' => 
      array (
      ),
      'reference' => '9758b6c69d179936435d0ffb577c3708d57e38a8',
    ),
    'theseer/tokenizer' => 
    array (
      'pretty_version' => '1.2.2',
      'version' => '1.2.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b2ad5003ca10d4ee50a12da31de12a5774ba6b96',
    ),
    'tijsverkoyen/css-to-inline-styles' => 
    array (
      'pretty_version' => 'v2.2.7',
      'version' => '2.2.7.0',
      'aliases' => 
      array (
      ),
      'reference' => '83ee6f38df0a63106a9e4536e3060458b74ccedb',
    ),
    'vlucas/phpdotenv' => 
    array (
      'pretty_version' => 'v5.6.0',
      'version' => '5.6.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '2cf9fb6054c2bb1d59d1f3817706ecdb9d2934c4',
    ),
    'voku/portable-ascii' => 
    array (
      'pretty_version' => '2.0.1',
      'version' => '2.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b56450eed252f6801410d810c8e1727224ae0743',
    ),
    'webmozart/assert' => 
    array (
      'pretty_version' => '1.11.0',
      'version' => '1.11.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '11cb2199493b2f8a3b53e7f19068fc6aac760991',
    ),
    'yajra/laravel-datatables' => 
    array (
      'pretty_version' => 'v9.0.0',
      'version' => '9.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f16d4c701418d4f60a81e5452933b15b312dde90',
    ),
    'yajra/laravel-datatables-buttons' => 
    array (
      'pretty_version' => 'v9.1.4',
      'version' => '9.1.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'afc40285b09b0960180b17b96c5429b4be772143',
    ),
    'yajra/laravel-datatables-editor' => 
    array (
      'pretty_version' => 'v1.25.4',
      'version' => '1.25.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '23962356700d6b31f49bb119665b13e87303e13f',
    ),
    'yajra/laravel-datatables-fractal' => 
    array (
      'pretty_version' => 'v9.1.0',
      'version' => '9.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '4b313041247108650c9ce5deb678defb7e00e794',
    ),
    'yajra/laravel-datatables-html' => 
    array (
      'pretty_version' => 'v9.4.0',
      'version' => '9.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'cec3e77746ff68f6f51e22250061b59d4ec1311c',
    ),
    'yajra/laravel-datatables-oracle' => 
    array (
      'pretty_version' => 'v10.11.0',
      'version' => '10.11.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '6badd623d6352284a926de604b55db881057ca67',
    ),
  ),
);
private static $canGetVendors;
private static $installedByVendor = array();







public static function getInstalledPackages()
{
$packages = array();
foreach (self::getInstalled() as $installed) {
$packages[] = array_keys($installed['versions']);
}


if (1 === \count($packages)) {
return $packages[0];
}

return array_keys(array_flip(\call_user_func_array('array_merge', $packages)));
}









public static function isInstalled($packageName)
{
foreach (self::getInstalled() as $installed) {
if (isset($installed['versions'][$packageName])) {
return true;
}
}

return false;
}














public static function satisfies(VersionParser $parser, $packageName, $constraint)
{
$constraint = $parser->parseConstraints($constraint);
$provided = $parser->parseConstraints(self::getVersionRanges($packageName));

return $provided->matches($constraint);
}










public static function getVersionRanges($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

$ranges = array();
if (isset($installed['versions'][$packageName]['pretty_version'])) {
$ranges[] = $installed['versions'][$packageName]['pretty_version'];
}
if (array_key_exists('aliases', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['aliases']);
}
if (array_key_exists('replaced', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['replaced']);
}
if (array_key_exists('provided', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['provided']);
}

return implode(' || ', $ranges);
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getVersion($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['version'])) {
return null;
}

return $installed['versions'][$packageName]['version'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getPrettyVersion($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['pretty_version'])) {
return null;
}

return $installed['versions'][$packageName]['pretty_version'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getReference($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['reference'])) {
return null;
}

return $installed['versions'][$packageName]['reference'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getRootPackage()
{
$installed = self::getInstalled();

return $installed[0]['root'];
}







public static function getRawData()
{
return self::$installed;
}



















public static function reload($data)
{
self::$installed = $data;
self::$installedByVendor = array();
}




private static function getInstalled()
{
if (null === self::$canGetVendors) {
self::$canGetVendors = method_exists('Composer\Autoload\ClassLoader', 'getRegisteredLoaders');
}

$installed = array();

if (self::$canGetVendors) {
foreach (ClassLoader::getRegisteredLoaders() as $vendorDir => $loader) {
if (isset(self::$installedByVendor[$vendorDir])) {
$installed[] = self::$installedByVendor[$vendorDir];
} elseif (is_file($vendorDir.'/composer/installed.php')) {
$installed[] = self::$installedByVendor[$vendorDir] = require $vendorDir.'/composer/installed.php';
}
}
}

$installed[] = self::$installed;

return $installed;
}
}
