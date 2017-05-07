<?php
/**
 * Created by PhpStorm.
 * User: Sofia
 * Date: 30/04/2017
 * Time: 03:47 PM
 */

namespace App\Http\Controllers;


class directories
{

    public static $imagesAplicationPath =  'images/aplication/';


    public static function  getAplicationPath() {
        return self::$imagesAplicationPath;

    }

    public static function getCurriculumPath() {
        return self::$imagesAplicationPath . 'curriculum/';
    }

    public static function getBlogPath() {
        return self::$imagesAplicationPath . 'blog/';
    }
}