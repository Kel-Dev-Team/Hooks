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

/**
 * a sample hook function
 * @var string $hook_name The name of the hook that triggered this function to run. This value is passed in by the system but can be omitted.
 * @return void This function should not return anything! As the system does not make use of any value returned.
 */
return function ($hook_name = '') {
    global $hem;
    $hem = (is_null($hem)) ? 1 : $hem ;
    echo "<br/>hook $hem -- $hook_name<br />";
    $hem++;
};
