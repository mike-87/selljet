<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Ad;
use App\Models\Category;

class AdController extends Controller
{
    // pojedinačni oglas
    public function adPreview($id){
        $data = Ad::getAd($id);

        return view('adPreview', [
            'adData' => $data,
            'user' => session('user'),
            'categories' => Category::getCategories(),
            'sections' => Category::getSectionsCategories()
        ]);
    }

    // svi oglasi prema kategoriji
    public function adCategory($id){
        $data = Ad::getCategoryAd($id);

        return view('category', [
            'ads' => $data,
            'category' => Category::getCategoryName($id),
            'user' => session('user'),
            'categories' => Category::getCategories(),
            'sections' => Category::getSectionsCategories()
        ]);
    }

    // čuva oglas u bazu
    public function saveAd(Request $request){
        //dd($request->all(), session()->get('user')->id);
        $title = (isset($request->title)) ? $request->title : '';
        $describeAd = (isset($request->describeAd)) ? $request->describeAd : '';
        $price = (isset($request->price)) ? $request->price : '';
        $condition = (isset($request->condition)) ? $request->condition : '';
        $category = (isset($request->subcategory)) ? $request->subcategory : '';
        $phone = (isset($request->phone)) ? $request->phone : '';
        $location = (isset($request->location)) ? $request->location : '';
        $image = (isset($request->image)) ? $request->image : '';

        // ukoliko je neki od neophodnih podataka prazan string vratiće korisniku grešku
        if(
            strlen($title) == 0 || 
            strlen($describeAd) == 0 || 
            strlen($price) == 0 || 
            strlen($condition) == 0 || 
            strlen($category) == 0 || 
            strlen($phone) == 0 || 
            strlen($location) == 0 || 
            strlen($image) == 0
        ) {
            // ovde će vratiti greška
            return false;
        } else {
            // ovde će se nastaviti upis podataka
            $data = Ad::storeAd($title, $describeAd, $price, $condition, $category, $phone, $location, $image);
            return redirect('/home');
        }
    }
}
