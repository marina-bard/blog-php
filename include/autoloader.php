<?php
/**
 * Created by PhpStorm.
 * User: marina
 * Date: 14.1.16
 * Time: 14.45
 */

function __autoload($classname)
{
    $classname = mb_strtolower($classname);
    switch ($classname) {
        case 'post':
            require_once ("../include/model/".$classname.".php");
            break;
        case 'config':
            require_once ("../config/".$classname.".php");
            break;
        default:
            require_once ("../include/storage/".$classname.".php");
            break;
    }
}
