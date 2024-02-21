<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Disable timestamps for this model
    public $timestamps = false;

    /**
     * Define a many-to-many relationship between User and Task models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function task()
    {
        // Define a many-to-many relationship where a user belongs to many tasks
        return $this->belongsToMany(Task::class, 'userId');
    }

    /**
     * Define a relationship between User and Role models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        // Define a many-to-one relationship where a user belongs to a role
        return $this->belongsTo(Role::class, 'roleId');
    }

    /**
     * Retrieve a single user by their ID.
     *
     * @param int $id
     * @return User|null
     */
    public static function getSingle($id)
    {
        return self::find($id);
    }

    /**
     * Retrieve users, optionally filtered by first name or last name, with pagination.
     *
     * @return \Illuminate\Contracts\Pagination\Paginator
     */
    public static function getUser()
    {
        $return = User::paginate(10);

        // Check if 'firstname' and 'lastname' parameters are present in the request
        if (!empty(Request::get('firstname')) && !empty(Request::get('lastname'))) {
            // Filter users by both first name and last name
            $return = User::where('lastname', Request::get('lastname'))
                ->where('firstname', Request::get('firstname'))
                ->get();
        } elseif (!empty(Request::get('firstname'))) {
            // Filter users by first name
            $return = User::where('firstname', Request::get('firstname'))->get();
        } elseif (!empty(Request::get('lastname'))) {
            // Filter users by last name
            $return = User::where('lastname', Request::get('lastname'))->get();
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
