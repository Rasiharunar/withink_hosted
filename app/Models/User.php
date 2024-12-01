<?php

namespace App\Models;
use Illuminate\Support\Str;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'device_code',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    protected static function boot()
    {
        parent::boot();

        // Event to generate a unique device_code before creating a user
        static::creating(function ($user) {
            $user->device_code = self::generateUniqueDeviceCode();
        });
    }

    /**
     * Generate a unique device code.
     *
     * @return string
     */
    private static function generateUniqueDeviceCode()
    {
        do {
            $code = Str::random(10); // Generate a random string with 10 characters
        } while (self::where('device_code', $code)->exists()); // Check for uniqueness

        return $code;
    }

}
