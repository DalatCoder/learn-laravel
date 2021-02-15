<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait StorageImageTrait
{
    public function storageTraitUpload($request, $fieldname, $foldername): ?array
    {
        if (!$request->hasFile($fieldname)) {
            return null;
        }

        $file = $request[$fieldname];
        $filenameOriginal = $file->getClientOriginalName();
        $filenameHashed = \Illuminate\Support\Str::random(20) . '.' . $file->getClientOriginalExtension();
        $storePath = 'public/' . $foldername . '/' . auth()->id();

        $filepath = $request->file($fieldname)->storeAs($storePath, $filenameHashed);

        return [
            'file_name' => $filenameOriginal,
            'file_path' => Storage::url($filepath)
        ];
    }

    public function storageTraitUploadMultiple($file, $foldername)
    {
        $filenameOriginal = $file->getClientOriginalName();
        $filenameHashed = \Illuminate\Support\Str::random(20) . '.' . $file->getClientOriginalExtension();
        $storePath = 'public/' . $foldername . '/' . auth()->id();

        $filepath = $file->storeAs($storePath, $filenameHashed);

        return [
            'file_name' => $filenameOriginal,
            'file_path' => Storage::url($filepath)
        ];
    }
}
