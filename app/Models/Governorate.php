<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Directorate;

use Illuminate\Notifications\Notifiable;//جزء خاص بالتطبيق
use Laravel\Sanctum\HasApiTokens;//جزء خاص بالتطبيق


class Governorate extends Model
{
    
 //جزء خاص بالتطبيق

 use HasApiTokens, HasFactory, Notifiable;


 protected $table = "governorates";
 protected $primaryKey = 'gov_id';
 protected $fillable=['gov_id', 'gov_name',];

 

    // دالة للربط بين المحافظات والمديريات 
    public function directorates()
    {
        //             الرقم الرئيسي الرقم الثانوي  المودل الي معاه العلاقة 
        return $this-> hasMany(Directorate::class , 'gov_id' , 'gov_id');
    }
    // use HasFactory;

    
 
     /**
      * The attributes that should be hidden for serialization.
      *
      * @var array<int, string>
      */
     //protected $hidden = [
      //   'password',
       //  'remember_token',
     //];
 
     /**
      * The attributes that should be cast.
      *
      * @var array<string, string>
      */
     protected $casts = [
         'email_verified_at' => 'datetime',
     ];

     public function directorate_asl()
     {
         return $this->belongsToMany(Directorate::class, Neighborhood::class, 'dir_id', 'dir_id');
       //  return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
        }
   
}
