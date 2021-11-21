<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
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


    public function saveUser($fname, $lname, $email, $pass){
        $data = DB::table('users')->insert([
            'fname' => $this->sanitizeString($fname),
            'lname' => $this->sanitizeString($lname),
            'email' => $this->sanitizeString($email),
            'password' => Hash::make($pass)
        ]);

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
}
