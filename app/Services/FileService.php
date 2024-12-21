<?php

namespace App\Services;

class FileService
{
    public function deleteByPath(string $path): bool
    {
        $file = public_path('/storage/' . $path);
        if (file_exists($file)) {
            unlink($file);
            return true;
        }

        return false;
    }
}
