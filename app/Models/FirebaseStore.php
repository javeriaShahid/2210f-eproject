<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kreait\Firebase\Factory;

class FirebaseStore extends Model
{
    use HasFactory;

    public static function storeFiles( $file  , $folder , $existingFile = null){

            $folderName  = $folder;
            $fireBaseCredentials = public_path('FirebaseCredientals\dazzle-firebase.json');

            $firebase = (new Factory)
                            ->withServiceAccount($fireBaseCredentials)
                            ->withDefaultStorageBucket("dazzle-123.appspot.com")
                            ->createStorage();
            if($existingFile != null){
                 $objectPath = parse_url($existingFile, PHP_URL_PATH);
                 $urlParts = explode('/', $objectPath);
                 $fileName = end($urlParts);
                 $folderPathParts = array_slice($urlParts, 2, 3);
                 $folderPath = implode('/', $folderPathParts);
                 $folderPath = urldecode($folderPath);
                 $firebase->getBucket()->object($folderPath)->delete();
            }
            $imageName = $file->getClientOriginalName();
            $imagePath = $folderName . $imageName;

            $firebase->getBucket()->upload(
                fopen($file->getPathname(), 'r'),
                ['name' => $imagePath]
            );

            // Get public URL
            $publicUrl = $firebase->getBucket()->object($imagePath)->signedUrl(new \DateTime('2030-12-31'));

            return $publicUrl ;

    }



}
