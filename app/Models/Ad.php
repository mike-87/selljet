<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use DB;

class Ad extends Model
{
    use HasFactory;

    public $timestamps = false;

    // vraća sve oglase
    public static function getAllAds(){
        $data = Ad::join('users', 'users.users_id', '=', 'ads.owner')
                ->join('categories', 'categories.categories_id', '=', 'ads.category_id')
                ->orderBy('ads.created_at', 'desc')
                ->simplePaginate();
        
        return $data;
    }

    // vrača pojedinačni oglas
    public static function getAd($id){
        $data = Ad::join('users', 'users.users_id', '=', 'ads.owner')
                ->join('categories', 'categories.categories_id', '=', 'ads.category_id')
                ->where('ads_id', $id)
                ->first();
        
        return $data;
    }

    // vraća oglase po kategorijama
    public static function getCategoryAd($category_id){
        $data = Ad::join('users', 'users.users_id', '=', 'ads.owner')
                ->join('categories', 'categories.categories_id', '=', 'ads.category_id')
                ->where('ads.category_id', $category_id)
                ->orderBy('ads.created_at', 'desc')
                ->simplePaginate();
        
        return $data;
    }

    // čuvanje oglasa
    public static function storeAd($title, $describe, $price, $condition, $category, $phone, $location, $image){

        if($image == ''){
            $imageName = 'selljet.jpg';
        } else {
            $imageName = 'img_' . session()->get('user')->users_id . Str::random(15).'_'.$image->getClientOriginalName();
            $image->move(public_path().'/images/', $img = $imageName);
        }

        $data = DB::table('ads')->insert([
            'title' => $title,
            'description' => $describe,
            'price' => $price,
            'condition' => $condition,
            'image' => $imageName,
            'phone' => $phone,
            'location' => $location,
            'category_id' => $category,
            'owner' => session()->get('user')->users_id
        ]);

        return $data;
    }
}
