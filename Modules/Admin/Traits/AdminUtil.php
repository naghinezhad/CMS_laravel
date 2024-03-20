<?php

namespace App\Traits\Admin;

trait AdminUtil
{
    public function uploadImages($file, $path)
    {
        $filename = time() . '_' . $file->getClientOriginalName();
        $year = date('Y');
        $destinationPath = public_path($path . '/' . $year);
        
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }
        
        $file->move($destinationPath, $filename);
        
        return $path . '/' . $year . '/' . $filename;
    }
    
    public function createSlug($title, $separator = '-')
    {
        $slug = trim($title);
        $slug = strtolower($slug);
        $slug = preg_replace('/[^a-z0-9' . preg_quote($separator, '/') . ']+/', $separator, $slug);
        $slug = trim($slug, $separator);
        
        return $slug;
    }
    
    public function formatBytes($bytes, $decimals = 2)
    {
        $size = ['B', 'KB', 'MB', 'GB', 'TB'];
        $factor = floor((strlen($bytes) - 1) / 3);
        $formatted = sprintf("%.{$decimals}f", $bytes / pow(1024, $factor));
        return $formatted . ' ' . @$size[$factor];
    }
}
