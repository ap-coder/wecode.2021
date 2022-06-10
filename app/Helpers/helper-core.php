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

/**
 * get_media_mimes_thumbnail
 */
if(!function_exists('get_media_mimes_thumbnail')){
    function get_media_mimes_thumbnail($attachment, $type, $size = 'thumbnail'){
        if($attachment or in_array($type, ['svg', 'webp', 'bmp'])){
            $src = get_attachment_data_url($attachment, $size);
        }
        else {
            if(file_exists(public_path("public/libs/filetypes/{$type}.svg"))){
                $src = asset("libs/filetypes/{$type}.svg");
            } else {
                $src = asset("libs/filetypes/search.svg");
            }
        }
        return $src;
    }
}

/**
 * get_attachment_data_url
 */
if(!function_exists('get_attachment_data_url')){
    function get_attachment_data_url($attachment, $size = 'thumbnail'){
        $file = maybe_unserialize($attachment);
        if(isset($file[$size]) and $file){
            return url($file[$size]);
        }
        elseif(isset($file['file']) and $file){
            return url($file['file']);
        }
        else{
            return false;
        }
    }
}

/**
 * get_media_mimes_thumbnail
 */
if(!function_exists('get_media_mimes_thumbnail')){
    function get_media_mimes_thumbnail($attachment, $type, $size = 'thumbnail'){
        if($attachment or in_array($type, ['svg', 'webp', 'bmp'])){
            $src = get_attachment_data_url($attachment, $size);
        }
        else {
            if(file_exists(public_path("public/libs/filetypes/{$type}.svg"))){
                $src = asset("libs/filetypes/{$type}.svg");
            } else {
                $src = asset("libs/filetypes/search.svg");
            }
        }
        return $src;
    }
}


/**
 * serialize v1.0
 */

/**
 * maybe_unserialize
 */
if(!function_exists('maybe_unserialize')){
    function maybe_unserialize($original, $default = [] ){
        if ($original and is_serialized($original)){
            return @unserialize($original);
        } else{
            return ($default)? $default : $original;
        }
    }
}

/**
 * is_serialized
 */
if(!function_exists('is_serialized')){
    function is_serialized($data, $strict = true){
        if (!is_string($data)) {return false;}
        $data = trim($data);
        if ('N;' == $data) {return true;}
        if (strlen($data) < 4) {return false;}
        if (':' !== $data[1]) {return false;}
        if ($strict) {
            $lastc = substr($data, -1);
            if (';' !== $lastc && '}' !== $lastc) {return false;}
        } else {
            $semicolon = strpos($data, ';');
            $brace = strpos($data, '}');
            if (false === $semicolon && false === $brace) {return false;}
            if (false !== $semicolon && $semicolon < 3) {return false;}
            if (false !== $brace && $brace < 4) {return false;}
        }
        $token = $data[0];
        switch ($token) {
            case 's':
                if ($strict) {if ('"' !== substr($data, -2, 1)) {return false;}}
                elseif (false === strpos($data, '"')) {return false;}
            case 'a':
            case 'O':
                return (bool) preg_match("/^{$token}:[0-9]+:/s", $data);
            case 'b':
            case 'i':
            case 'd':
                $end = $strict ? '$' : '';
                return (bool) preg_match("/^{$token}:[0-9.E-]+;$end/", $data);
        }
        return false;
    }
}

/**
 * is_serialized_string
 */
if(!function_exists('is_serialized_string')){
    function is_serialized_string($data){
        if (!is_string($data)) {return false;}
        $data = trim($data);
        if (strlen($data) < 4) {return false;} 
        elseif (':' !== $data[1]) {return false;} 
        elseif (';' !== substr($data, -1)) {return false;}
        elseif ($data[0] !== 's') {return false;}
        elseif ('"' !== substr($data, -2, 1)) {return false;}
        else {return true;}
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

/**
 * get_username
 */
if(!function_exists('get_username')){
    function get_username($user_id, $meta = false, $name_meta = array()){
        $name  = DB::table('users')->where('id', $user_id)->value('name');
        return $name;
    }
}

/**
 * get_attachment_url
 */
if(!function_exists('get_attachment_url')){
    function get_attachment_url($id, $size = 'thumbnail'){
        $attachment_file = DB::table('attachments')->where('at_id', $id)->value('at_files');
        $file = maybe_unserialize($attachment_file);
        if(isset($file[$size]) and $file)
        {
            return url($file[$size]);
        }
        elseif(isset($file['file']) and $file)
        {
            return url($file['file']);
        }
        else
        {
            return false;
        }
    }
}
