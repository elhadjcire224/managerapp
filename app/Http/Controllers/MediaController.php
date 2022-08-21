<?php

namespace App\Http\Controllers;

use Image;
use DateTime;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function save(array $images,string $code,string $color)
    {
        $infos = [];
        foreach ($images as $image) {
            
            $time = (new DateTime())->format('Y-m-d_H_i_s_v');
            $extension = $image->extension();
            $image_name = $time.$code.'.'.$extension;
            $path = 'public/img/' . $image_name;

            $img = Image::make($image);
            
            $img->text($code,100,20,function($font) use($color){
                $font->color($color);
                $font->file(public_path('jetFont.ttf'));
                $font->size(30);
                $font->align('center');
                $font->valign('top');
            });
            Storage::put($path,$img->encode());
            $infos[] = [$path,$extension];
        }
        return $infos;
    }

    public function destroy($medias)
    {
        foreach($medias as $media){
            Storage::delete($media);
        }
    }
    public function download(Request $request)
    {
        if(auth()->check()){
            return Storage::download($request->mediapath);
        }

        
    }
}
