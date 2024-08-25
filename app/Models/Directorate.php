<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Governorate;
use App\Models\Neighborhood;

class Directorate extends Model
{
    // protected $fillable =[
    //     'id',
    //     'dir_name',
    //     'gov_id'

    // ];
    
    protected $table = "directorates";
    protected $primaryKey = "dir_id";
    protected $fillable=['dir_id', 'dir_name', 'gov_id'];
    


    // دالة للربط بين المحافظات والمديريات 
    public function governorate()
    {
        //        
        return $this-> belongsTo( Governorate::class,'gov_id' ,'gov_id');
    }

    public function neighborhood()
    {
        //             الرقم الرئيسي الرقم الثانوي  المودل الي معاه العلاقة 
        return $this-> hasMany(Neighborhood::class , 'dir_id' , 'dir_id');
    }

    // use HasFactory;

}
