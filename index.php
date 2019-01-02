<?php

use app\services\GameWorker;

require(__DIR__ . '/vendor/autoload.php');

$config = require(__DIR__ . '/app/config/main.php');

$gameWorker = new GameWorker();
$gameWorker->run($config);
