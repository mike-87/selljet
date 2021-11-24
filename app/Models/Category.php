<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    // vraća sve kategorije i podkategorije
    public static function getCategories(){
        $categories = Category::get();

        $allCategories = $categories->whereNull('parent_id');

        self::formatCategories($allCategories, $categories);

        return $allCategories;
    }

    // koristi se da pokupimo sve potkategorije i da ih spojimo sa roditeljem
    private static function formatCategories($allCategories, $categories){
        foreach($allCategories as $category){
            $category->children = $categories->where('parent_id', $category->categories_id)->values();

            if($category->children->isNotEmpty()){
                self::formatCategories($category->children, $categories);
            }
        }
    }

    // vraća naziv kategorija na osnovu ID-ja
    public static function getCategoryName($id){
        $data = Category::where('categories_id', $id)->value('name');

        return $data;
    }

    // vraća sve kategorije na osnovu parent_id
    public static function getSectionsCategories(){
        $data = Category::where('parent_id', null)->get();

        return $data;
    }

    // vraća sve kategorije na osnovu parent_id
    public static function getAllChildCategories($parent_id){
        $data = Category::where('parent_id', $parent_id)->get();

        return $data;
    }
}
