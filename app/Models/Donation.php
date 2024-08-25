<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    protected $table = "donations";
    protected $primaryKey = "donation_id";
    protected $fillable=['donation_id', 'donation_title', 'donation_desc', 'image', 'donation_quantity', 'res_quantity','donation_dir','delivery_place','delivery_time','cat_id','user_id','donation_exp'];
    
    public function getImageAttribute($value)
    {
        if ($value) {
            return asset('images/' . $value);
           // return asset('images/' . $value);
        } else {
            return asset('images/default.png');
        }
    } 
    public function user()
    {
        //                        table    f.k    p.k 
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function category()
    {
        //                        table    f.k    p.k 
        return $this->belongsTo(Category::class,'cat_id','cat_id');
    }

    public function directorate()
    {
        //        
        return $this-> belongsTo(Directorate::class,'donation_dir' ,'dir_id');
    }

    public function reservations(){
        return $this->hasMany(Reservation::class,'res_donr_id');
    } //جزء خاص بالتطبيق

  //علاقة بين جدولي التبرعات والحجوزات من اجل التبرعات في قائمة انتظار تسليمها
    public function reservation_asl(){
        return $this -> belongsTo(Reservation::class,'donation_id','res_donr_id');
    } 


    //اظهار اسم المحافظة
    // public function governorate(){
    //     return $this -> hasOneThrough(Directorate::class,'dir_id','gov_id');


    // }

}
