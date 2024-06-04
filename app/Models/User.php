<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'sername',
        'last_name',
        'phone_number',
        'department',
        'email',
        'password',
        'UserPhoto',
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
        'password' => 'hashed',
    ];

    public static function uploadImage(Request $request, $image = null){
        if($request->hasFile('UserPhoto')){
            if($image){
                Storage::delete($image);
            }
            $folder =date('Y-m-d');
            return $request->file('UserPhoto')->store("images/{$folder}");
        }
        return $image ? $image : 'images/2024-06-04/swSOXExWQ8qR9dPv4rhVsuTGx3lfAMxwQTNbr5IP.png';
    }

    
    public function adzaklad()
    {
        return $this->belongsTo(zaklad::class, 'id', 'userid');
    }
}
