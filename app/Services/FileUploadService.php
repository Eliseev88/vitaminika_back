<?php

namespace App\Services;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileUploadService
{
    public function upload($file, $pathDir)
    {
        $originalExt = $file->getClientOriginalExtension();
        $fileName = Str::random(10) . "." . $originalExt;

        $fileUploaded = $file->storeAs( $pathDir, $fileName, 'public');

        if ($fileUploaded === false) {
            throw new Exception('File upload errors1');
        }

        return $fileUploaded;
    }
}
