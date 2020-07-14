<?php
/**
 * Created by PhpStorm.
 * User: Awesome_Urch
 * Date: 7/12/2020
 * Time: 5:03 PM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
//use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
//use League\Flysystem\File;

//use SebastianBergmann\CodeCoverage\Report\Html\File;

//use App\Http\Requests;
//use App\Http\Controllers\Controller;


class UploadFileController extends Controller {

    public function showUploadFile(Request $request) {
        $file = $request->file('file_contents');

        //print_r($request); die();

        //Display File Name
        echo 'File Name: '.$file->getClientOriginalName();
        echo '<br>';

        //Display File Extension
        echo 'File Extension: '.$file->getClientOriginalExtension();
        echo '<br>';

        $extension = $file->getClientOriginalExtension();

        //Display File Real Path
        echo 'File Real Path: '.$file->getRealPath();
        echo '<br>';

        //Display File Size
        echo 'File Size: '.$file->getSize();
        echo '<br>';

        //Display File Mime Type
        echo 'File Mime Type: '.$file->getMimeType();


        $bookDetailArray = explode(".",$file->getClientOriginalName());

        //Move Uploaded File
        $destinationPath = 'uploads';
        $file->move($destinationPath,uniqid() . '_' . $bookDetailArray[0] . "." . $file->extension());
    }

    public function saveFile(Request $request){
        $picName = $request->file('image')->getClientOriginalName();
        $picName = uniqid() . '_' . $picName;
        $path = 'uploads' . DIRECTORY_SEPARATOR . 'user_files' . DIRECTORY_SEPARATOR . 'cnic' . DIRECTORY_SEPARATOR;
        //$destinationPath = public_path($path); // upload path
        $destinationPath = $path;
        //File::makeDirectory($destinationPath, 0777, true, true);
        Storage::disk('local')->makeDirectory('path/to');
        $request->file('image')->move($destinationPath, $picName);
    }
}