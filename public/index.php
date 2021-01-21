<?php

require_once '../config/config.php';

spl_autoload_register(fn($class) => require_once SRC_DIR . '/' . LIBRARY . $class . '.php');

$app = new Bootstrap();