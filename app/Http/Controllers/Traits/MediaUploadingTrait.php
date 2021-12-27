<?php
namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Helpers\Sanitize;

trait MediaUploadingTrait
{

	public function storeMedia(Request $request)
	{
		// Validates file size
		if (request()->has('size')) {
			$this->validate(request(), [
				'file' => 'max:' . request()->input('size') * 1024,
			]);
		}
		
		// If width or height is preset - we are validating it as an image
		if (request()->has('width') || request()->has('height')) {
			$this->validate(request(), [
				'file' => sprintf(
					'image|dimensions:max_width=%s,max_height=%s',
					request()->input('width', 100000),
					request()->input('height', 100000)
				),
			]);
		}
		
		$path = storage_path('tmp/uploads');
		
		try {
			if (!file_exists($path)) {
				mkdir($path, 0755, true);
			}
		} catch (\Exception $e) {

		}
		
		$file = $request->file('file');		

        $originname = trim($file->getClientOriginalName());

		$filename = pathinfo($originname, PATHINFO_FILENAME);
		$extension = pathinfo($originname, PATHINFO_EXTENSION);

		// $filtername=$this->normalizeString($filename);

		$filtername = Sanitize::normalizeString($filename);

		$name = $filtername.'.'.$extension;
		 

        // $name = strtolower($name);
		
		// $name = str_replace(' ', '_', $name);
		// $name = str_replace(['@','&','*','%','$','#'], '', $name);
		// $name = str_replace(['[',']','{','}','(',')'], '', $name);
		// $name = preg_replace('/--+/', '-', $name);
		// $name = str_replace('-', '_', $name);

		Log::debug($name);
		
		$file->move($path, $name);
		
		return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
	}


	public static function normalizeString ($string = '')
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
		
		return $string;
	}

 }

