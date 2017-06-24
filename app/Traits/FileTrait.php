<?php
/**
 * Created by PhpStorm.
 * User: Mig
 * Date: 6/10/2017
 * Time: 19:29
 */
namespace App\Traits;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait FileTrait
{
    // Todo fix bug file name cannot in thai
    public function storeFile($file)
    {
        $ex = $file->getClientOriginalExtension();
        Storage::disk('local')->put($file->getFilename(). '.' . $ex, File::get($file));

        $fileRecord = [
            'name' => $file->getFilename(). '.' . $ex,
            'mime' => $file->getClientMimeType(),
            'original_name' => $file->getClientOriginalName(),
        ];

        $file = \App\File::create($fileRecord);
        return $file;
    }

    public function deleteFile($file)
    {
        Storage::delete($file->name);
    }
}