<?php

namespace App\Models;
/*use Illuminate\Support\Facades\Hash;*/
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
/*use Illuminate\Database\Eloquent\Model;*/

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
        'password' => 'hashed',
    ];
     /**
     * Create and save a new user.
     *
     * @param string $name
     * @param string $email
     * @param string $password
     * @return User
     */
    public static function createUser($name, $email, $password)
    {
        return self::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password), // Şifreyi şifreleyerek kaydediyoruz
        ]);
    }

    /**
     * Güncelleme ve kaydetme işlemi için kullanıcı bilgilerini güncelle.
     *
     * @param int $userId
     * @param array $userData
     * @return User
     */
    public static function updateUser($userId, $userData)
    {
        $user = self::find($userId);
        if (!$user) {
            // Kullanıcı bulunamadı, hata yapılabilir.
            return null;
        }

        // Güncelleme işlemlerini yap
        $user->name = $userData['name'];
        $user->email = $userData['email'];
        $user->password = Hash::make($userData['password']); // Şifreyi güncelleyerek şifrele
        $user->save();

        return $user;
    }
}

