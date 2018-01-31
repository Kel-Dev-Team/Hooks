<?php
/**
 * Hooks
 *
 * A simple php framework for adding runtime hooks to a system.
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
require_once __DIR__.'/vendor/autoload.php';
use Kel\Load;
use Kel\Hooks;

//create a new Hooks instance 
//passing an array of config options is optional
$hook = new  Hooks(Load::config(__DIR__.'/config.php'));

//add a hook init.php to the hook point init
//the hook point is created if it does not exist 
$hook->add_hook('init', "init.php"); 

//add a hook init.php to the hook point final
$hook->add_hook('final', "init.php");

//run the hook init
$hook->run_hook('init');

//run the hook final
$hook->run_hook('final');
