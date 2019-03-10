<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;

chdir(dirname(__DIR__));

require 'vendor/autoload.php';

return call_user_func(function() {

    $container = require 'config/container.php';
});