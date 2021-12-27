<?php

namespace App\Helpers;

class Sanitize
{
    public static function normalizeString(string $string = '')
    {
        $string = strip_tags($string);
        $string = preg_replace('/[\r\n\t ]+/', ' ', $string);
        $string = preg_replace('/[\"\*\/\:\<\>\?\'\|]+/', ' ', $string);
        $string = strtolower($string);
        $string = html_entity_decode( $string, ENT_QUOTES, "utf-8" );
        $string = htmlentities($string, ENT_QUOTES, "utf-8");
        $string = str_replace('iso', '', $string);
        $string = preg_replace('/.png|.jpg|.jpeg|.gif|\[(.*?)\]|\((.*?)\)+/', '', $string);
        $string = str_replace('(', '', $string);
        $string = str_replace(')', '', $string);
        $string = str_replace('@', '', $string);
		$string = str_replace('[', '', $string);
		$string = str_replace(']', '', $string);
        $string = preg_replace("/(&)([a-z])([a-z]+;)/i", '$2', $string);
        $string = str_replace(' ', '_', $string);
        $string = str_replace('.', '_', $string);
        $string = str_replace('-', '_', $string);
        $string = rawurlencode($string);
        $string = str_replace('%', '_', $string);
        $string = preg_replace('/_+/', '_', $string);
        $string = preg_replace('/[.*?!@-_ ]+$/', '', $string);
        // $string = str_replace('/\.+$/', '', $string);
       
        return $string;
    }
}
