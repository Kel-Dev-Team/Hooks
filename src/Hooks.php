<?php
namespace Kel;

use Kel\MissingHook;
use Kel\UnknownHook;

class Hooks
{
    protected $config = [
        'hooks_dir' => __DIR__.'/../hooks'
    ];
    protected $hooks = [
        'init' => []
    ];

    public function add_hook($hook ='', $path='')
    {
        $hooks_dir = realpath($this->config['hooks_dir']);
        if (file_exists($hooks_dir.'/'.$path)) {
            $this->hooks[$hook][] = $path;
        } else {
            throw new MissingHook("The hook @ $path was not found!", 1);
        }
    }

    public function run_hook($hook='')
    {
        if (array_key_exists($hook, $this->hooks)) {
        } else {
            throw new UnknownHook("The hook $hook was not found!", 1);
        }
    }
    public function d()
    {
        var_dump($this->hooks);
    }
}
