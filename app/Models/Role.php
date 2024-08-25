<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public $guarded = [];

    //  protected $fillable =[
    //     'id',
    //     'name',
    //     'display_name',

    // ];

    public function users()
    {
  return $this->belongsToMany('App\Models\User');
    }
}
