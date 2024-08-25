<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Beneficiary extends Model
{
    //   use HasFactory;
    // one to one with users 
  

    protected $table='beneficiaries';
    protected $fillable = [
        'id',
        'user_id',
        // 'ben_name',
        'ben_phone',
        'ben_cardnum',
        'gov_id',
        'dir_id',
        'neigh_id',
        'allowed_in_month',
        'conf_ben'
    ];

    public function user()
    {
        //                        table    f.k    p.k 
        return $this->belongsTo(User::class,'user_id','id');
    }

  

    //one to many with neighborhoods
    public function neighborhood()
    {
  //             الرقم الرئيسي        الرقم الثانوي       المودل الي معاه العلاقة 
       return $this->belongsTo(Neighborhood::class , 'neigh_id' , 'neigh_id');

    }

    public function mediator()
    {
  //             الرقم الرئيسي        الرقم الثانوي       المودل الي معاه العلاقة 
       return $this->belongsTo(Mediator::class , 'neigh_id' , 'neigh_id');

    }

    // public function beneficiaries()
    // {
    //     //        
    //     return $this->hasManyThrough(Neighborhood::class,'neigh_id' ,'neigh_id');
    //   }




}
