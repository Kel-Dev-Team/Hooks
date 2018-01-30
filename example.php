<?php 
require_once __DIR__.'/vendor/autoload.php';
use Kel\Load;
use Kel\Hooks;

// Load::init();
$hook = new  Hooks;
$hook->add_hook('init', "init.php");
$hook->add_hook('final', "init.php");
$hook->d();
