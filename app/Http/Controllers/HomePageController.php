<?php
/**
 * Created by PhpStorm.
 * User: Awesome_Urch
 * Date: 7/16/2020
 * Time: 7:29 AM
 */

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function showBooksAndCategories(){
        return response()->json(['categories'=>Category::all(),'books'=>Book::all()]);
    }
}