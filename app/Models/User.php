<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Validate if data provided by user is valid for registration
     *
     * @param  string  $userName
     * @param  string  $email
     * @param  string  $password
     * @param  string  $confPassword
     * @return boolean
     */
    public function validateData($userName, $email, $password, $confPassword)
    {
        $validation = false;

        if (trim($userName) != "" && trim($email) != "" && trim($password) != "") {
            if (strlen($userName) >= 7 && strlen($password) >= 8 && $password === $confPassword) {
                if (preg_match('/[!@#$%&*()<>{}[\]]/', $password)) {
                    if (preg_match('/[A-Z]/', $password))
                        $validation = true;
                }
            }
        }
        
        return $validation;
    }
}