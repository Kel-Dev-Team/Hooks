<?php
/**
 * Hooks
 *
 * A framework for adding hooks to a system.
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2017, British Columbia Institute of Technology
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
use Kel\MissingConfigFile;

/**
 * The load class
 */
class Load
{
	/**
	 * load a config file
	 * @param  string $path the path to the file to be loaded
	 * @return mixed       
	 */
    public static function config($path='')
    {
        if (file_exists($path)) {
            return include($path);
        } else {
            throw new MissingConfigFile("The config file $path was not found", 1);
        }
    }

    /**
     * load a hook
     * @param  string $hook_path The path to the hook file to be loaded
     * @return mixed
     */
    public static function hook($hook_path = '')
    {
        if (file_exists($hook_path)) {
            return include($hook_path);
        } else {
            throw new MissingHook("The hook @ $file_path was not found!", 1);
        }
    }
}
