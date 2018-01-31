<?php
/**
 * Hooks
 *
 * A framework for adding hooks to a system.
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2018, Kel Dev Team (http://dev.kingchionline.com/)
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	Hooks
 * @author	Kel Dev Team
 * @copyright	Copyright (c) 2018, Kel Dev Team (http://dev.kingchionline.com/)
 * @link	http://dev.kingchionline.com/
 * @since	Version 1.0.0
 * @filesource
 */
namespace Kel;

use Kel\MissingHook;
use Kel\Load;
use Kel\InvalidHook;
use Kel\UnknownHook;
use Kel\MissingConfig;

/**
 * Hooks Class
 *
 * This class manages adding and running hooks.
 *
 * @package		Hooks
 * @author		Kel Dev Team
 * @link		http://dev.kingchionline.com/hooks
 */
class Hooks
{
	/**
	 * An array of config values
	 * @var array
	 */
    protected $config = [
        'hooks_dir' => __DIR__.'/../hooks',
        'accepted_hooks' => false
    ];

    /**
     * An array where the hooks are stored
     * @var array
     */
    protected $hooks = [];

    /**
     * An array of accepted hooks. Default of false
     * @var mixed
     */
    protected $accepted = false;

    /**
     * The constructor
     * @param array $config An array of configuration options
     */
    public function __construct($config = [])
    {
    	if (is_array($config) && !empty($config)) {
    		$this->config = array_merge($this->config, $config);
    		$required_options = ['hooks_dir'];
    		foreach ($required_options as $option) {
    			if (!in_array($option, $this->config)) {
    				throw new MissingConfig("The configuration option $option was not set!", 1);
    				
    			}
    		}
    	}
    }

    /**
     * Add a hook to the system
     * @param string $hook the hook point to add the hook to
     * @param string $path the path to the file where the hook is
     * Nb: The path is relative to the __"hooks_dir"__ in the config array and the file must return a callable
     * @return
     */
    public function add_hook($hook ='', $path='')
    {
        $hooks_dir = realpath($this->config['hooks_dir']);
        if (file_exists($hooks_dir.'/'.$path)) {
            $this->hooks[$hook][] = $path;
        } else {
            throw new MissingHook("The hook @ $path was not found!", 1);
        }
    }

    /**
     * Check if a particlar hook is accepted by the system
     * @param  string  $hook_name The name of the hook to be checked
     * @return boolean            
     */
    protected function is_accepted($hook_name = '')
    {
    	if ($this->accepted == false) {
    		return true;
    	}
    	return in_array($hook_name, $this->accepted);
    }

    /**
     * run all the hooks attached to a hook point
     * @param  string $hook the name of the hook point to run
     * @return 
     */
    public function run_hook($hook='')
    {
        $hooks_dir = realpath($this->config['hooks_dir']);
        if (array_key_exists($hook, $this->hooks)) {
            if (is_array($this->hooks[$hook]) && !empty($this->hooks[$hook])) {
                foreach ($this->hooks[$hook] as $hook_file) {
                    $hook = Load::hook($hooks_dir.'/'.$hook_file);
                    if (is_callable($hook)) {
                        $hook();
                    } else {
                        throw new InvalidHook("The hook @ $hook_file could not be called!", 1);
                    }
                }
            }
        } else {
            throw new UnknownHook("The hook $hook was not found!", 1);
        }
    }
}
