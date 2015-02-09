<?php

require(__DIR__.'/vendor/autoload.php');
$tool = &Clips\get_clips_tool();
$router = $tool->load_class('Router', true);
$router->route();
