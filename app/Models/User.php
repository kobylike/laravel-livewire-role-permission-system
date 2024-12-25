<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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

    // use App\Models\User;

    // // Fetch all users without roles
    // $users = User::doesntHave('roles')->get();

    // // Assign the "User" role to each of them
    // foreach ($users as $user) {
    //     $user->assignRole('User');
    //     echo "Assigned 'User' role to: {$user->name}\n";
    // }

//     public function before(User $user, string $ability): ?bool
// {
//     if ($user->hasRole('Super Admin')) {
//         return true;
//     }

//     return null; // see the note above in Gate::before about why null must be returned here.
// }

}




//each time you want to assign super admin


// $user = \App\Models\User::create([
//     'name' => 'Super Admin',
//     'email' => 'superadmin@example.com',
//     'password' => bcrypt('superadminpassword'),
//     'phone' => '1111111232',
// ]);

// $user->assignRole('Super Admin');
