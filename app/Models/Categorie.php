<?php

namespace App\Models;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Categorie extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $categories = [
        'cat_id', 'cat_name',
    ];


}