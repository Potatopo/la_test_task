<?php

use src\Manufacture\Bakery\Bakery;
use src\Entity\BaseRequest;

function myAutoLoad($className)
{
    $classPieces = explode("\\", $className);
    switch ($classPieces[0]) {
        case 'src':
            include __DIR__ .'/'. implode(DIRECTORY_SEPARATOR, $classPieces) . '.php';
            break;
    }
}
spl_autoload_register('myAutoLoad', '', true);

$bakery = new Bakery();

// The second parameter is optional, for example 'php order.php americano s'
$bakery->produce(new BaseRequest($argv[1], $argv[2]));
