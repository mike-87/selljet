<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    private $user;

    function __construct(){
        $this->user = new User();
    }

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
}
