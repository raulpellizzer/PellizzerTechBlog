<?php

namespace App\Models;

use Exception;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
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
     * @param  array  $credentials
     * @return boolean
     */
    public function validateData($credentials)
    {
        $validation = false;
        $userName     = $credentials['userNameRegister'];
        $password     = $credentials['passwordRegister'];
        $confPassword = $credentials['confPasswordRegister'];
        $email        = $credentials['email'];

        if (trim($userName) != "" && trim($email) != "" && trim($password) != "") {
            if (strlen($userName) >= 7 && strlen($password) >= 8 && $password === $confPassword) {
                if (preg_match('/[!@#$%&*()<>{}[\]-]/', $password)) {
                    if (preg_match('/[A-Z]/', $password))
                        $validation = true;
                }
            }
        }
        
        return $validation;
    }

    /**
     * Checks if given username or email already exists in the application
     *
     * @param  string  $userName
     * @param  string  $email
     * @return boolean
     */
    public function checkUserInDB($userName, $email)
    {
        $users = DB::select('select * from users where name = :name or email = :email', ['name' => $userName, 'email' => $email]);
        return sizeof($users) > 0 ? false : true;
    }

    /**
     * Checks if given username already exists in the application by its username
     *
     * @param  string  $userName
     * @return boolean
     */
    public function checkUserInDBByName($userName)
    {
        $user = DB::select('select name from users where name = :name ', ['name' => $userName]);
        return sizeof($user) > 0 ? true : false;
    }

    /**
     * Update login attempts for given user, if invalid credentials
     *
     * @param  string  $userName
     * @return void
     */
    public function updateLoginAttempts($userName)
    {
        $user = DB::select('select login_attempts from users where name = :name ', ['name' => $userName]);
        $loginAttempts = $user[0]->login_attempts + 1;
        DB::table('users')->where('name', $userName)->update(['login_attempts' => $loginAttempts]);
    }

    /**
     * Resets the login attempt counter when successfully loggin in
     *
     * @param  string  $userName
     * @return void
     */
    public function resetLoginAttempts($userName)
    {
        DB::table('users')->where('name', $userName)->update(['login_attempts' => 0]);
    }

    /**
     * Retrieve login attempts for given user
     *
     * @param  string  $userName
     * @return integer
     */
    public function getLoginAttempts($userName)
    {
        $user = DB::select('select login_attempts from users where name = :name ', ['name' => $userName]);
        return $user[0]->login_attempts;
    }

    /**
     * Retrieve blocked time for a given user
     *
     * @param  string  $userName
     * @return string timestamp
     */
    public function getBlockedTime($userName)
    {
        $user = DB::select('select blocked_until from users where name = :name ', ['name' => $userName]);
        return $user[0]->blocked_until;
    }

    /**
     * Sets a block time for given username
     *
     * @param  string  $userName
     * @return void
     */
    public function setBlockedTime($userName, $blockedDate) {
        DB::table('users')->where('name', $userName)->update(['blocked_until' => $blockedDate]);
    }

    /**
     * Unblocks user
     *
     * @param  string  $userName
     * @return void
     */
    public function unblockUser($userName) {
        DB::table('users')->where('name', $userName)->update(['blocked_until' => NULL, 'login_attempts' => 0]);
    }

    /**
     * Retrieves all emails from active users
     *
     * @return array
     */
    public function getEmails()
    {
        $emails = DB::select('select email from users where active = 1 and registration_verified = 1');
        return $emails;
    }

    /**
     * Encrypts string
     *
     * @param  string  $password
     * @return string
     */
    public function encryptPassword($password)
    {
        return bcrypt($password);
    }

    /**
     * Validate if data provided by user is valid for registration
     *
     * @param  array  $credentials
     * @return boolean
     */
    public function authenticate($credentials)
    {
        return Auth::attempt($credentials) ? true : false;
    }

    /**
     * Check if user account is active
     *
     * @param  string  $name
     * @return array
     */
    public function isUserActive($name)
    {
        $status = DB::select('select active from users where name = :name', ['name' => $name]);
        return $status;
    }

    /**
     * Check if user account was verified through email
     *
     * @param  string  $name
     * @return array
     */
    public function wasAccountVerified($name)
    {
        $status = DB::select('select registration_verified from users where name = :name', ['name' => $name]);
        return $status;
    }

    /**
     * Check if the authenticated user has admin privileges
     *
     * @param  string  $email
     * @return integer
     */
    public function isAdmin($email)
    {
        $privilege = DB::select('select isAdmin from users where email = :email', ['email' => $email]);
        return $privilege[0]->isAdmin;
    }

    /**
     * Retrieve data for user control panel
     *
     * @return array
     */
    public function getCPUserData()
    {
        $data = DB::table('users')->select('id', 'name', 'email', 'created_at', 'active')->get();
        return $data;
    }

    /**
     * Update user status
     *
     * @param  array  $input
     * @return boolean
     */
    public function updateUserStatus($input)
    {
        try {
            $checkBoxMarkedIds = $this->getMarkedCheckBoxIds($input);
            $userIds           = DB::table('users')->select('id')->get();

            foreach ($userIds as $user) {
                if (in_array($user->id, $checkBoxMarkedIds))
                    DB::table('users')->where('id', $user->id)->update(['active' => 1]);
                else
                    DB::table('users')->where('id', $user->id)->update(['active' => 0]);
            }

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Strips the marked checkbox input names and retrieves the marked id
     *
     * @param  array  $input
     * @return array
     */
    public function getMarkedCheckBoxIds($input)
    {
        $markedIds = array();

        for ($i = 1; $i < sizeof($input); $i++) {
            $id = str_split($input[$i], 5);
            array_push($markedIds, $id[1]);
        }

        return $markedIds;
    }

    /**
     * Retrieves user ID
     *
     * @param  string  $name
     * @return integer
     */
    public function getUserId($name)
    {
        $id = DB::select('select id from users where name = :name', ['name' => $name]);
        return $id[0]->id;
    }
}