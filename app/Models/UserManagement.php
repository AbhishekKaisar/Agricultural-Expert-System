<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserManagement extends Authenticatable
{
    use Notifiable;

    protected $table = 'user_management';

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'date_of_birth',
        'blood_group',
        'nid',
        'address',
        'image',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'status' => 'boolean',
    ];
}
