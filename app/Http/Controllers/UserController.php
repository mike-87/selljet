<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Category;
use App\Models\Ad;

class UserController extends Controller
{
    private $user;
    private $category;
    private $allCategories;

    function __construct(){
        $this->user = new User();
        $this->category = new Category();
        $this->allCategories = $this->category->getCategories();
    }

    // registracija korisnika
    public function registerUser(Request $request){
        // provera da li su svi podaci uneti, ako nisu biće prazan string
        $fname = (isset($request->fname)) ? $request->fname : '';
        $lname = (isset($request->lname)) ? $request->lname : '';
        $email = (isset($request->email)) ? $request->email : '';
        $pass = (isset($request->pass)) ? $request->pass : '';
        $repeatPass = (isset($request->repeatPass)) ? $request->repeatPass : '';

        // ukoliko je neki od neophodnih podataka prazan string ili šifre nisu identične vratiće korisniku grešku
        if(
            strlen($fname) == 0 || 
            strlen($lname) == 0 || 
            strlen($email) == 0 || 
            strlen($pass) == 0 || 
            strlen($repeatPass) == 0 || 
            $pass !== $repeatPass
        ) {
            // ovde će vratiti greška
            return false;
        } else {
            // ovde će se nastaviti upis podataka
            $data = $this->user->saveUser($fname, $lname, $email, $pass);
            return $data;
        }
    }

    // logovanje korisnika
    public function loginUser(Request $request){
        $username = (isset($request->username)) ? $request->username : '';
        $password = (isset($request->password)) ? $request->password : '';

        if(
            strlen($username) == 0 || 
            strlen($password) == 0
        ) {
            // ovde će vratiti greška
            return false;
        } else {
            // ovde će se nastaviti upis podataka
            $data = $this->user->loginUser($username, $password);
            return response()->json($data, 200);
        }
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/');
    }

    // ako nema ulogovanog usera treba da nas vrati na welcome stranicu
    public function welcomeScreen(){
        if(is_null(session('user'))){
            return view('/welcome', [
                'categories' => $this->allCategories,
                'ads' => Ad::getAllAds()
            ]);
        } else {
            return view('home', [
                'user' => session('user'),
                'categories' => $this->allCategories,
                'ads' => Ad::getAllAds(),
                'sections' => $this->category->getSectionsCategories()
            ]);
        }
        
    }

    // ako ima ulogovanog usera onda uvek vraća na home stranicu
    public function homeScreen(){
        if(is_null(session('user'))){
            return view('/welcome', [
                'categories' => $this->allCategories,
                'ads' => Ad::getAllAds()
            ]);
        } else {
            return view('home', [
                'user' => session('user'),
                'categories' => $this->allCategories,
                'ads' => Ad::getAllAds(),
                'sections' => $this->category->getSectionsCategories()
            ]);
        }
    }
}
