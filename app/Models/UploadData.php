<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UploadData extends Model
{
  

   // $conn=new mysqli("localhost","root","","donations");
    
  //  if($conn){
  //  }
  //  else{
     }
 
    $image = $_REQUEST['image'];
    $name = $_REQUEST['name'];
    
    $img = base64_decode($image);
    $image = $name;
    file_put_contents($image, $img);
    
    $conn->query("insert into upload (image) values('".$image."')");

//}
 