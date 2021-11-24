<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    //private const SALT_STRING = 'mp9B0(jGI)hIlxT';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // metoda za čuvanje novog korisnika
    public function saveUser($fname, $lname, $email, $pass){
        // provera da li je email već unet
        $userCheck = DB::table('users')->where('email', $this->sanitizeString($email))->count();

        if($userCheck == 0){
            $data = DB::table('users')->insert([
                'fname' => $this->sanitizeString($fname),
                'lname' => $this->sanitizeString($lname),
                'email' => $this->sanitizeString($email),
                'password' => Hash::make($pass)
            ]);
        } else {
            $data = 'email';
        }

        return $data;
    }

    // uklanja neke od specijalnih karaktera kako bismo izbegli da se izvrši neka JS skripta ili da se napravi SQL injection
    private function sanitizeString($string){
        $string = preg_replace('/\s+/', ' ', $string);
        $string = preg_replace('/</', '&lt;', $string);
        $string = preg_replace('/>/', '&gt;', $string);
        $string = preg_replace("/'/", '&apos;', $string);
        $string = preg_replace("/-/", '&hyphen;', $string);

        return $string;
    }

    // provera za login i logovanje
    public function loginUser($email, $password){
        $userCheck = DB::table('users')->where('email', $this->sanitizeString($email))->first();

        if(is_null($userCheck)){
            return 'unknownUser';
        } else {
            // provera da li je dobra kombinacija username/password
            if(Auth::attempt(
                array('email' => $this->sanitizeString($email), 'password' => $password)
                )
            ){
                Session::put('user', $userCheck);
                return true;
            } else {
                return false;
            }
        }
    }
}
