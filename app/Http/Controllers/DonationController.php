<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Directorate;
use App\Models\Donation;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DonationController extends Controller
{
    //
    
         // العرض

    public function getAllDon (){
      if (Auth::check()){
        // $now = Carbon::now()->addDays(2)->format('Y-m-d');
        // $donation = Donation::with('directorate')->get();
        // $dv = $donation->governorate;
        // return response()->json($now);
        $donation = Donation::with('directorate')->get();  
        $directorate = Directorate::get();
        $category = Category::where('cat_id','>','0')->where('cat_id','<>','3')->get();
        // $count = Donation::with('reservations')->get();
        return view('donation' , compact('donation','directorate','category')); //عرض الـ View  مع البيانات الراجعة في قاعدة البيانات في المتغير 
      
      }
      else 
      return view('auth.login');

    }

      public function create (){
        if (Auth::check()){
        $category = Category::where('cat_id','>','0')->where('cat_id','<>','3')->get();
        $directorate = Directorate::get();
        return view('addDonation' ,compact('category','directorate')); 
        }
        else 
        return view('auth.login');
  

    }

    public function store( Request $request){

        //التحقق من البيانات قبل اضافتها لقاعدة البيانات
        // $validator = $request->validate([
        // 'donation_title'=> 'required ',
        // 'donation_desc'=> 'required ',
        // 'donation_quantity'=> 'required',
        // 'image'=> 'required',
        // 'donation_dir'=> 'required',
        // 'delivery_time'=> 'required',
        // 'delivery_place'=> 'required',
        // 'cat_id'=>'required',
        // ]);


        // images قبل اضافة الصورة لقاعدة البيانات يجب حفظها في المجلد 
        // اسم الصورة + .+الوقت
        $file_ex =  $request->image->extension();
        $imageName = time().'.'.$file_ex; 
        // مسار الصورة اسم المجلد
        $path = 'images';
        $request->image->move(public_path('images'), $imageName);
        // $path = $request->file('image')->store('public/images');

  

          $donation = new Donation();

          $donation->donation_title = $request->input('donation_title');
          $donation->donation_desc = $request->get('donation_desc');
          $donation->donation_quantity = $request->input('donation_quantity');
          $donation->image = $imageName;
          $donation->donation_exp = $request->input('donation_exp');
          $donation->donation_dir = $request->input('donation_dir');
          $donation->delivery_place = $request->input('delivery_place');
          $donation->delivery_time = $request->input('delivery_time');
          $donation->cat_id  = $request->input('cat_id');
          $donation->user_id = auth()->user()->id;

          $donation->save();
          return redirect('donation')-> with(['add_success' => __('الإضـافـة')]);
        
    }


    // // طريقه الحذف 
     public function delete($id ){

      $donation= Donation ::find($id); //where('id'.$category_id)->dba_firstkey();
      $donation->delete();
      return redirect('donation')-> with(['delete_success'=> __('الحـــذف ')]);
     }


    //    //كود التعديل
       public function editdonation(Request $request){

        // $file_ex =  $request->image->extension();
        $imageName = time().'.'.$request->image->extension();
        // مسار الصورة اسم المجلد
        $path = 'images';
        $request->image->move(public_path('images'), $imageName);
         
      $update =[
         'donation_title' => $request->input('donation_title'),
          'donation_desc' => $request->get('donation_desc'),
          'donation_quantity' => $request->input('donation_quantity'),
          'image' => $imageName,
          'donation_exp' => $request->input('donation_exp'),
          'donation_dir' => $request->input('donation_dir'),
          'delivery_place' => $request->input('delivery_place'),
          'delivery_time' => $request->input('delivery_time'),
         'cat_id'  => $request->input('cat_id'),
          'user_id' => auth()->user()->id,
      ];

     
      DB::table('donations')->where('donation_id',$request->donation_id)->update($update);
      return redirect('beneficiary')-> with(['update_success' => __('التعديـل')]);
     }


     public function getAllRes (){
      if (Auth::check()){

        $res = Reservation::with('donation')->orderby('res_donr_id')->get();  
        $directorate = Directorate::get();
        $category = Category::where('cat_id','>','0')->where('cat_id','<>','3')->get();
        // $count = Donation::with('reservations')->get();
        return view('getAllRes' , compact('res','directorate','category')); //عرض الـ View  مع البيانات الراجعة في قاعدة البيانات في المتغير 
        // return response()->json($res);
      }
      else 
      return view('auth.login');

    }

    public function getAllNotRes (){
      if (Auth::check()){

        $donation = Donation::where('res_quantity','0')->get();  
        $directorate = Directorate::get();
        $category = Category::where('cat_id','>','0')->where('cat_id','<>','3')->get();
        // $count = Donation::with('reservations')->get();
        return view('getAllNotRes' , compact('donation','directorate','category')); //عرض الـ View  مع البيانات الراجعة في قاعدة البيانات في المتغير 
        // return response()->json($res);
      }
      else 
      return view('auth.login');

    }

    public function deleteNotRes($id){

      $donation= Donation ::find($id); //where('id'.$category_id)->dba_firstkey();
      $donation->delete();
      return redirect('getAllNotRes')-> with(['delete_success'=> __('الحـــذف ')]);



    }



    // عرض كافة التبرعات مع اسم المحافظة
    public function getgov(){
      $donation = Donation::with(['directorate' => function ($q) {

        $q->with('governorate');
  
        }])->get();
        return response()->json($donation);
  
    }




//عرض التبرعات الغير محجوزة من قبل المستخدم مع اسم المحافظة
    public function bendonation($id){
      $now = Carbon::now()->format('Y-m-d');
      $donation = Donation::with('category')->with('user')->with(['directorate' => function ($q) {

        $q->with('governorate');
  
        }])->whereDoesntHave('reservations' , function ($q) use ($id){

      $q->where('res_user_id',$id);

      })
      ->whereRaw('donation_quantity <> res_quantity')//اظهار التبرعات الغير محجوزة
      ->where('donation_exp','>',$now)///اخفاء المواد المنتهية
      ->orwhere('donation_exp',null)
      ->get(); 
      return response()->json($donation);

    }

    public function getQuntall_donation(){
      $now = Carbon::now()->format('Y-m-d');
  $res=Donation::with('directorate')->with('category')->with('user')
  ->whereRaw('donation_quantity <> res_quantity')//اظهار التبرعات الغير محجوزة
  ->where('donation_exp','>',$now)///اخفاء المواد المنتهية
  ->orwhere('donation_exp','=',null)//اظهار التبرعات التي لاتحتوي على تاريخ انتهاء
  ->orderBy('donation_id','desc')->get(); 
  return response()->json($res);
   }
}


