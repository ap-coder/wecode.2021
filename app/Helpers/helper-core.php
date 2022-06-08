<?php
/**
 * format_size
 */
if(!function_exists('format_size')){
    function format_size($filesize){
        $size = '--';
        switch ($filesize){
            case $filesize < 1024:
                $size = $filesize .' B';
            break;
            case $filesize < 1048576:
                $size = round($filesize / 1024, 2) .' KB';
            break;
            case $filesize < 1073741824:
                $size = round($filesize / 1048576, 2) . ' MB';
            break;
            case $filesize < 1099511627776:
                $size = round($filesize / 1073741824, 2) . ' GB';
            break;
        }
        return $size;
    }
}


/**
 * file_upload_max_size
 */
if(!function_exists('file_upload_max_size')){
    function file_upload_max_size(){
        static $max_size = -1;
        if ($max_size < 0) {
            $post_max_size = parse_size(ini_get('post_max_size'));
            if ($post_max_size > 0) {
                $max_size = $post_max_size;
            }
            $upload_max = parse_size(ini_get('upload_max_filesize'));
            if ($upload_max > 0 && $upload_max < $max_size) {
                $max_size = $upload_max;
            }
        }
        return $max_size;
    }
}


/**
 * parse_size
 */
if(!function_exists('parse_size')){
    function parse_size($size){
        $unit = preg_replace('/[^bkmgtpezy]/i', '', $size);
        $size = preg_replace('/[^0-9\.]/', '', $size);
        if ($unit) {
            return round($size * pow(1024, stripos('bkmgtpezy', $unit[0])));
        } else {
            return round($size);
        }
    }
}

/**
 * maybe_serialize
 */
if(!function_exists('maybe_serialize')){
    function maybe_serialize($data){
        if (is_array($data) || is_object($data)) {return serialize($data);}
        if (is_serialized($data, false)){return serialize($data);}
        return $data;
    }
}