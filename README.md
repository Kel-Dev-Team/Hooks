# Hooks
A simple php framework for adding runtime hooks to a system.

**installation**

```bash
$ composer require kel/hooks
````

**example**

```php
use Kel\Load;
use Kel\Hooks;

//create a new Hooks instance 
//passing an array of config options is optional
//__NB: Multiple hooks can be added to the same hook point__
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
```

