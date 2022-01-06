<?php

namespace App\Http\Tools;


use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class FileManager
{
    private $diskName;
    public $imagesDirectory = 'public/images';

    /**
     * @param string $diskName
     */
    function __construct(string $diskName = 'local')
    {
        $this->diskName = $diskName;
    }

    /**
     * @param $filePath
     * @return false|string
     */
    public function storeImage($filePath = null)
    {
        $file = file_get_contents($filePath);
        $generatedHash = hash('sha256', base64_encode($file));
        if (!Storage::disk($this->diskName)->exists($this->imagesDirectory . '/' . $generatedHash)) {
            Storage::putFileAs($this->imagesDirectory, new File($filePath), $generatedHash);
        }
        return $generatedHash;
    }

    /**
     * @param $path
     * @param array $filters
     * @return false|string
     */
    public function getImage($path = null, array $filters = [])
    {
        $name = (isset($filters['name'])) ? $filters['name'] : 'Imagen';
        $output = (isset($filters['output'])) ? $filters['output'] : 'html';
        $codec = (isset($filters['codec'])) ? $filters['codec'] : 'base64';

        $image = Storage::get($this->imagesDirectory . '/' . $path);
        $url = Storage::url($this->imagesDirectory . '/' . $path);

        switch ($output) {
            case 'html':
                switch ($codec) {
                    case 'base64':
                        return "<img src='data:image/bmp;base64," . base64_encode($image) . "' alt='" . $name . "'>";
                    default:
                        return "<img src='" . $url . "' alt='" . $name . "'>";
                }
            case 'url':
                switch ($codec) {
                    case 'base64':
                        return base64_encode($url);
                    case 'sha256':
                        return hash('sha256', $url);
                    default:
                        return $url;
                }
            default:
                switch ($codec) {
                    case 'base64':
                        return base64_encode($image);
                    case 'sha256':
                        return hash('sha256', $image);
                    default:
                        return $image;
                }
        }
    }

    public function deleteImage(){

    }

}
