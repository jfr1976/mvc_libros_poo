<?php
$config = Config::getInstance();

$config->set('CONTROLLERS_FOLDER', 'controllers/');
$config->set('MODELS_FOLDER', 'models/');
$config->set('VIEWS_FOLDER', 'views/');
$config->set('IMAGES_FOLDER', 'images/');
$config->set('DEFAULT_CONTROLLER', 'libros');

$config->set('DEFAULT_ACTION', 'listar');

$config->set('dbhost', 'localhost');
$config->set('dbname', 'libreria');
$config->set('dbuser', 'root');
$config->set('dbpass', '');