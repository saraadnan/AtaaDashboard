<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Person extends Model{
   use HasApiTokens, HasFactory, Notifiable;


   protected $table = "persons";
   // protected $primaryKey = 'id';
//  protected $fillable=['id','fistname','lastname','phone','address',];

}