<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $fillable = ['id', 'name', 'email', 'date_of_birth', 'gender', 'country', 'salary', 'created_at'];
}
