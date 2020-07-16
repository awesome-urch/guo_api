<?php
/**
 * Created by PhpStorm.
 * User: Awesome_Urch
 * Date: 7/12/2020
 * Time: 5:03 PM
 */

namespace App\Http\Controllers;

use App\Book;
use App\Category;
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

        //return response()->json($request->categories, 201);

        /*//Display File Name
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
        echo 'File Mime Type: '.$file->getMimeType();*/

        //return response()->json($request->categories, 201);


        $bookDetailArray = explode(".",$file->getClientOriginalName());

        $bookPath = uniqid() . '_' . $bookDetailArray[0] . "." . $file->extension();

        //Move Uploaded File
        $destinationPath = 'uploads';
        $file->move($destinationPath,$bookPath);

        $book = Book::create([
            'name'  =>  $request->title,
            'description' =>  $request->description,
            'path' =>  $bookPath,
        ]);


        $categoryArray = array_map('intval',explode(",",$request->categories));
        //return response()->json($categoryArray, 201);


        //$categories = Category::find([2,3]); // Modren Chairs, Home Chairs
        $categoryIds = Category::find($categoryArray); // Modren Chairs, Home Chairs
        //$categoryIds = Category::find([4,8]);
        $book->categories()->attach($categoryIds);

        return response()->json($book, 201);

    }



    /*public function saveFile(Request $request){
        $picName = $request->file('image')->getClientOriginalName();
        $picName = uniqid() . '_' . $picName;
        $path = 'uploads' . DIRECTORY_SEPARATOR . 'user_files' . DIRECTORY_SEPARATOR . 'cnic' . DIRECTORY_SEPARATOR;
        //$destinationPath = public_path($path); // upload path
        $destinationPath = $path;
        //File::makeDirectory($destinationPath, 0777, true, true);
        Storage::disk('local')->makeDirectory('path/to');
        $request->file('image')->move($destinationPath, $picName);
    }*/
}