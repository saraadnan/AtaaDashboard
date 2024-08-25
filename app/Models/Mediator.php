<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mediator extends Model
{
  


  protected $table = "mediators";
  protected $primaryKey = "med_id";
 protected $fillable=['med_id', 'med_name', 'med_phone', 'med_cardnum', 'user_id', 'neigh_id'];

    // use HasFactory;

    public function user()
    {
        //                                     f.k    p.k 
        return $this->belongsTo(User::class,'user_id','id');
    }

    
      //one to many with neighborhoods
      public function neighborhood()
      {
    //             الرقم الرئيسي الرقم الثانوي  المودل الي معاه العلاقة 
         return $this-> belongsTo(Neighborhood::class , 'neigh_id' , 'neigh_id');
  
      }

 public function beneficiaries()
      {
          //        
          return $this->hasMany(Beneficiary::class,'neigh_id' ,'neigh_id');
      }
      // public function beneficiaries()
      // {
      //     //        
      //     return $this->hasManyThrough(Neighborhood::class,'neigh_id' ,'neigh_id');
      //   }

}
