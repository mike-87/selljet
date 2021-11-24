<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // dobavlja sve kategorije na osnovu roditelja
    public function getChildCategories($parentID){
        $data = Category::getAllChildCategories($parentID);

        return response()->json($data, 200);
    }
}
