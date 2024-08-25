<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Directorate;


use Illuminate\Notifications\Notifiable;////جزء خاص بالتطبيق 
use Laravel\Sanctum\HasApiTokens;////جزء خاص بالتطبيق 

class Neighborhood extends Model 

{
use HasApiTokens, HasFactory, Notifiable;

    protected $table = "neighborhoods";
    protected $primaryKey = "neigh_id";
    protected $fillable=['neigh_id', 'neigh_name', 'dir_id', 'gov_id'];
    

      // دالة للربط بين المستفيدين والأحياء 
      public function beneficiaries()
      {
          //        
          return $this->hasMany( Beneficiary::class,'neigh_id' ,'neigh_id');
      }
  

    public function directorate()
    {
        //        
        return $this-> belongsTo( Directorate::class,'dir_id' ,'dir_id');
    }

    // use HasFactory;

    public function mediators()
    {
        //        
        return $this-> hasMany( Mediator::class,'neigh_id' ,'neigh_id');
    }


    //جزء خاص بالتطبيق 
   
    //  /**
    //      * The attributes that are mass assignable.
    //      *
    //      * @var array<int, string>
    //      */
    //     protected $fillable = [
    //         'neigh_id', 'neigh_name', 'dir_id', 'gov_id',
    //     ];
    // //جزء خاص بالتطبيق 

    

}
