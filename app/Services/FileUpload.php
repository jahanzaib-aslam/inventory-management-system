<?php

namespace App\Services;

use Symfony\Component\HttpKernel\Exception\HttpException;

class FileUpload {

    public function upload(string $path, $image): string
    {
        try{

            $filNameWithExtension = $image->getClientOriginalName();
            $fileName = pathinfo($filNameWithExtension, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $image1 = trim(str_replace(' ', '', $fileName . '_' . time() . '.' . $extension));
            $image->storeAs($path, $image1);
            // Storage::disk('s3')->setVisibility($path, 'public')

            return $image1;

        }catch(\Exception $e){
            throw new HttpException('Unable to upload file. '. $e->getMessage());
        }


    }
}
