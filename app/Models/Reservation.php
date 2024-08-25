<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{

    use HasFactory;
    protected $table = "reservations";
    protected $primaryKey = 'res_id';
    protected $fillable=['res_id','res_donr_id','res_user_id','res_month_id','donation_sign','delivery_conf','evaluation'];

    
    
    public function donation_asl(){
        return $this -> belongsTo(Donation::class,'res_donr_id','donation_id');
    } 
    
    //الموقع
    use HasFactory;
    public function donation()
    {
        //        
        return $this-> belongsTo( Donation::class,'res_donr_id' ,'donation_id');
    }
}
