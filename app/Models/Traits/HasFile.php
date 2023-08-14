<?php
namespace App\Models\Traits;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\Log;

trait HasFile {
    
    public function removeFile(string|null $file_name) {
        if(is_null($file_name)) {
            return;
        }
        $parts = explode('/', $file_name);
        // this is not a user uploaded photo, so don't remove
        if(! in_array('retailer', $parts) || in_array('user', $parts)) {
            return; 
        }
        $parts[1] = 'public';
        $url = implode('/', $parts);
        Storage::delete($url);
    }
    
    public function saveFile(string $property_name, string|null $temp_files_path, string $dir): string|null
    {
        
        $property = $this[$property_name];
        if ($property === $temp_files_path) {
            return $property;
        }
        
        $this->removeFile($property);
        
        // if there is no incoming file we are done
        if(!$temp_files_path) {
            return null;
        }
        //save the new temp file
        $temp_files = Storage::files($temp_files_path);
        $temp_file_path = $temp_files[0];
        $parts = explode('/', $temp_file_path);
        $img_url = $dir.$this->id.'/'.end($parts);
        Storage::move(
            $temp_file_path,
            $img_url
        );
        Storage::deleteDirectory($temp_files_path);
        return Storage::url($img_url);
    }
}