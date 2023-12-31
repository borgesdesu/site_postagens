<?php

require_once 'App/Core/core.php';

require_once 'lib/Database/Connection.php';

require_once 'App/Controller/HomeController.php';
require_once 'App/Controller/ErrorController.php';
require_once 'App/Controller/PostController.php';
require_once 'App/Controller/SobreController.php';
require_once 'App/Controller/AdminController.php';

require_once 'App/Model/Post.php';
require_once 'App/Model/Comment.php';

require_once 'vendor/autoload.php';

$template = file_get_contents('App/Template/estrutura.html');

ob_start();
$core = new Core;
$core->start($_GET);
$output = ob_get_contents();
ob_end_clean();

$readyTemplate = str_replace('{{dynamic_area}}', $output, $template);

echo $readyTemplate;
