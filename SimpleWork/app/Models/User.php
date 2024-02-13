<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;
use Laravel\Sanctum\HasApiTokens;
use function Laravel\Prompts\error;

class User extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;
    public $timestamps = false;
    public function task(): HasMany{

        return $this->hasMany(Task::class, 'userId');
    }
    public  function getRole($id){

        $file = Role::find($id);
        $path = (string) $file->role;

        return $path;
    }
    static public function getSingle($id)
    {
        return self::find($id);
    }
    static public function getUser(){
        $return = User::paginate(10);
        if (!empty(Request::get('firstname')) && !empty(Request::get('lastname'))) {
            if (User::get()->where('lastname', '=', Request::get('lastname'))->where('firstname', '=', Request::get('firstname'))) {
                $return = User::get()->where('lastname', '=', Request::get('lastname'))->where('firstname', '=', Request::get('firstname'));
            }
        }
        else if (!empty(Request::get('firstname'))){
            $return = User::get()->where('firstname','=',Request::get('firstname'));
        }
        else  if (!empty(Request::get('lastname'))){
            $return = User::get()->where('lastname','=',Request::get('lastname'));
        }

        return $return;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'date_coming' => 'datetime',
        'password' => 'hashed',
    ];
}
