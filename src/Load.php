<?php
namespace Kel;

use Kel\MissingHook;
use Kel\MissingConfigFile;

class Load
{
    public function __construct()
    {
    }

    public static function config($path='')
    {
        if (file_exists($path)) {
            return include($path);
        } else {
            throw new MissingConfigFile("The config file $path was not found", 1);
        }
    }

    public static function hook($hook_path = '')
    {
        if (file_exists($hook_path)) {
            return include($hook_path);
        } else {
            throw new MissingHook("The hook @ $file_path was not found!", 1);
        }
    }
}
