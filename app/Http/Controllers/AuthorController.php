<?php
/**
 * Created by PhpStorm.
 * User: Awesome_Urch
 * Date: 11/18/2019
 * Time: 3:59 PM
 */

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function showAllAuthors(){
        return response()->json(Author::all());
    }

    public function showOneAuthor($id){
        return response()->json(Author::find($id));
    }

    public function create(Request $request)
    {
        $author = Author::create($request->all());

        return response()->json($author, 201);
    }

    public function update($id, Request $request)
    {
        $author = Author::findOrFail($id);
        $author->update($request->all());

        return response()->json($author, 200);
    }

    public function delete($id)
    {
        Author::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }

}