<?php
/**
 * Created by PhpStorm.
 * User: Awesome_Urch
 * Date: 11/18/2019
 * Time: 3:59 PM
 */

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function showAllBooks(){
        return response()->json(Book::all());
    }

    public function showOneBook($id){
        return response()->json(Book::find($id));
    }

    public function update($id, Request $request)
    {
        $book = Book::findOrFail($id);
        $book->update($request->all());

        return response()->json($book, 200);
    }

    public function delete($id)
    {
        Book::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }

}