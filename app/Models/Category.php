<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $categories = [
        'cat_id', 'cat_name',
    ];
    use HasFactory;
    protected $primaryKey = "cat_id";

}
