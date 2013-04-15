<?php

// if scabbia installation on different directory
// if (file_exists($scabbiaPath = __DIR__ . '/../scabbia-dev/src')) {
//     define('SCABBIA_PATH', $scabbiaPath);
// }

if(!file_exists($scabbiaLoader = 'vendor/autoload.php')) {
    throw new RuntimeException('Unable to load Scabbia Framework. Run `php composer.phar install` or define a php constant named SCABBIA_PATH to locate the framework installation.');
}

$loader = require($scabbiaLoader);

if (defined('SCABBIA_PATH') && SCABBIA_PATH !== false) {
    $loader->set('Scabbia', SCABBIA_PATH);
}

use Scabbia\Framework;

Framework::$development = 1;
Framework::load($loader);

Framework::runApplication(new \Scabbia\Application());
// Framework::runApplicationByEndpoint(array(
//         'Scabbia\\Application' => array('http://localhost', 'https://localhost')
//     ));
