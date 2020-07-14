<?php
/**
 * Created by PhpStorm.
 * User: Awesome_Urch
 * Date: 11/18/2019
 * Time: 3:59 PM
 */

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function showAllCategories(){
        return response()->json(Category::all());
    }

    public function showAllCategory(){
        return response()->json(Category::all());
    }

    public function showOneCategory($id){
        return response()->json(Category::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories'
        ]);

        $category = Category::create($request->all());

        return response()->json($category, 201);
    }

    public function update($id, Request $request)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());

        return response()->json($category, 200);
    }

    public function delete($id)
    {
        Category::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }

}