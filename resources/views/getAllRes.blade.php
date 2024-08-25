@include('menu.menuDonation')
         <div class="row col-lg-10" >
          <div class="col-md-7 grid-margin stretch-card col-lg-12"  >
            <div class="card">
              <div class="card-body" style="direction:rtl">
        
                      <!-- رسالة تم الحذف بنجاح -->
              @if (Session::has ('delete_success'))
              <div class="alert alert-danger" role="alert" style=" font-size: 1.3em ; font-size: 1.3em ;text-align: center">
                تــم <a href="#" class="alert-link"> {{ Session::get('delete_success') }} </a> بنجـاح.
        
        
              </div>
              @endif
               <!-- نهاية الرسالة -->
        
               <!-- رسالة تمت الاضافة بنجاح -->
                @if (Session::has ('add_success'))
                <div class="alert alert-success" role="alert" style=" font-size: 1.3em ;font-size: 1.3em ;text-align: center">
                  تمـت <a href="#" class="alert-link"> {{ Session::get('add_success') }} </a> بنجـاح.
        
        
                </div>
                @endif
                <!-- نهاية الرسالة -->
        
                 <!-- رسالة تم التعديـل  بنجاح -->
            @if (Session::has ('update_success'))
            <div class="alert alert-success" role="alert" style=" font-size: 1.3em ;font-size: 1.3em ;text-align: center">
              تـم <a href="#" class="alert-link"> {{ Session::get('update_success') }} </a> بنجـاح.
        
        
            </div>
            @endif
            <!-- نهاية الرسالة -->
        
        
            <a href="viewAddDon" >
              <button type="button" class="btn " id ="button_add_donors" >  اضـافـة تـبــرع</button>
            </a>

              
            
         
         
         
            {{-- <section style="background-color: #eee;">
              <div class="container py-5">
                <div class="row justify-content">
                  @foreach ($donation as $donation )
                    
             
                  <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card text-black">
                      <i class="fab fa-apple fa-lg pt-3 pb-1 px-3"></i>
                      <img
                        src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/3.webp"
                        class="card-img-top"
                        alt="Apple Computer"
                      />
                      <div class="card-body">
                        <div class="text-center">
                          <h4>  {{ $donation->donation_id }} </h1>
                          <h5 class="card-title" style="display: inline"> {{ $donation->category->cat_name }} </h5>
                          <p class=" mb-4" style="display: inline">{{ $donation->donation_title }}</p>
                        </div>
                        <div>
                          <div class="d-flex justify-content-between">
                            <span>Pro Display XDR</span><span>$5,999</span>
                          </div>
                          <div class="d-flex justify-content-between">
                            <span>Pro stand</span><span>$999</span>
                          </div>
                          <div class="d-flex justify-content-between">
                            <span>Vesa Mount Adapter</span><span>$199</span>
                          </div>
                        </div>
                        <div class="d-flex justify-content-between total font-weight-bold mt-4">
                          <span>Total</span><span>$7,197.00</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                
                  
                </div>
              </div>
            </section> --}}
<div class="row col-lg-12" dir="rtl">
         <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped text-center">
                  <thead>
                    <tr>
                      <th>
                        الرقـم
                      </th>
                      <th>
                        الصنف
                      </th>

                      <th>
                        صورة التبرع
                      </th>
                      
                      <th>
                       عنوان التبرع
                      </th>
                      <th>
                        وصف التبرع
                      </th>
                      {{-- <th>
                        الكمية
                      </th> --}}

                      {{-- <th>
                       الكمية المحجوزة
                      </th> --}}
                      <th>
                        تاريخ الانتهاء
                      </th>
                      <th>
                      المديرية
                      </th>
                      <th>
                       مكان التسليم 
                      </th>
                      <th>
                        زمان التسليم 
                       </th>
                       <th>
                        المتبرع 
                       </th>

                       <th>
                       تأكيد الاستلام 
                       </th>

                       <th>
                        التقييم 
                        </th>
                       <th   style="display:none;">
                        رقم المستخدم
                      </th>

                       <th>
                         المستفيد
                       </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($res as $res )
                      
                    
                    <tr>
                      <td class="tdonation_id">{{ $res->donation->donation_id }}
                      </td>
                      <td class="tcat_id">{{ $res->donation->category->cat_name }}
                      </td>
                      <td class="py-1 tdonation_image"> <img src="{{ $res->donation->image }}" alt="image"/>

                      </td>
                      <td class="tdonation_title"> {{ $res->donation->donation_title }}
                      </td>
                      <td class="tdonation_desc">{{ $res->donation->donation_desc }}

                      </td>
                      {{-- <td class="tdonation_quantity">{{ $res->donation->donation_quantity }}
                      </td> --}}

                      {{-- <td class="tdonation_quantity"> {{ $res->donation->res_quantity }}
                      </td> --}}
                      @if( $res->donation->category->cat_id ==2)
                      <td class="tdonation_exp">{{ $res->donation->donation_exp }}
                      </td>
                     @else
                     <td class="tdonation_exp">----------
                    </td>
                    @endif

                      <td class="tdir_id">{{ $res->donation->directorate->dir_name}}
                      </td>
                      <td class="tdelivery_place"> {{ $res->donation->delivery_place}}
                      </td>
                      <td class="tdelivery_time">{{ $res->donation->delivery_time}}

                      </td>
                      <td class="tuser_name"> {{ $res->donation->user->name}}

                    </td>
                     
                    <td class=" tuser_id" style="display: none" > {{ $res->donation->user->id }} 
                      </td>

                 @if(  $res->delivery_conf ==1)
                      <td>
                          تم الاستلام
                      </td>
                      @else
                      <td class="tdonation_exp">لم يتم الاستـلام
                     </td>
                     @endif

                     @if( $res->delivery_conf ==1)
                     <td>
                        {{  $res->evaluation}}
                     </td>
                     @else
                     <td class="tdonation_exp">--------
                    </td>
                    @endif

                    <td>
                      {{ $res->res_user_id }}
                    </td>
               
                      {{-- <td > 
                 
                        <a href={{ "deleteDon/".$donation['donation_id'] }}>  <button type="button" class="btn btn-danger" style="font-weight: bolder; font-size: 1em">حـذف</button></a> 
                        <button type="button" class="btn editbtn" wire:click="editgov{{ $donation->donation_id  }}"  data-toggle="modal"  data-target="#editModal" style="font-weight: bolder; font-size: 1em" value="{{ $donation->donation_id }}" >تـعـديـل</button> 
     
     
                     </td>  --}}
     
                    </tr>
                    @endforeach
                   </tbody>
                </table>
              </div>
            </div>
          </div>
         </div>
          <!--Edit Modal -->
 <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModelLabel">
  <div class="modal-dialog" role="document">
      <div class="modal-content clearfix">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <div class="modal-body">
              <h3 class="title"> تـعـديـل التـبــرع </h3>
             
              <div class="form-group">
                  
                 
              </div>
              <div class="form-group">
                <form action="{{ url('editdonation') }}" method="POST" id="editForm" style="text-align: right" >
                  @csrf
                  <input type="hidden" name="donation_id" :value="$donation->donation_id" id="donation_id">
                  <input type="hidden" name="user_id" :value="$donation->user->id" id="user_id">

                  <div class="form-group" style=" text-align: right ;"  >
                    <label for="image" style="font-size: 1.2em ; padding-bottom: 1%"  > صورة التبـرع  </label> 

                    <div class="ml-2 col-sm-6" style="margin-right: 25%">
                        <img src="https://placehold.it/80x80" id="preview" class="img-thumbnail" >
                      </div>
                    <div id="msg"></div>
                    {{-- <form method="post" > --}}
                      <input type="file" name="image" class="file" >
                      <div class="input-group my-3">
                        <input type="text" class="form-control" disabled placeholder="ارفـع صورة" id="file" style="background-color: rgb(238, 238, 238)">
                        <div >
                          <button type="button" class="browse btn " style="background-color: #63d78d ; color:white ; font-size: 1em">اختـار ...</button>
                        </div>
                      </div>
                    {{-- </form> --}}
                      <!-- رسالة التحقق من صحة البيانات المضافة -->
                  @error('image')
                  <span class="text-danger"> {{ $message }}</span>
         
                   @enderror

             <!-- نهاية رسالة التحقق من صحة البيانات المضافة -->
               
                    
                  </div>
                     
                  
                  <label for="donation_exp" style="font-size: 1.2em ; padding-bottom: 1%; text-align: right ;" > الصنـف </label>
                  <select class="form-control" name="cat_id" >
                    @foreach ($category as $category ) 
                      <option value="{{ $category->cat_id }}" style="font-size: 1.2em">
                        {{ $category->cat_name}}
                      </option>
                      
                   @endforeach 
                  </select> 
                  <!-- رسالة التحقق من صحة البيانات المضافة -->
                  @error('cat_id')
                  <span class="text-danger"> {{ $message }}</span>
         
                   @enderror

             <!-- نهاية رسالة التحقق من صحة البيانات المضافة -->
                  <br>
            {{-- <input type="hidden" name="userid" value="{{ $user }}"> --}}
              
              <label for="donation_title" style="font-size: 1.2em ; padding-bottom: 1% ;"  >  عنـوان التبـرع  </label> 
            {{-- <span class=" text-danger mr-2" style="color:"> يرجى كتابة الاسم كما هو موجود على الهوية </span> --}}

              <input type="text" class="form-control" name="donation_title" id="donation_title" placeholder=" عنوان التبرع" style="font-size: 1.1em " required>
                     <!-- رسالة التحقق من صحة البيانات المضافة -->
                     @error('donation_title')
                     <span class="text-danger"> {{ $message }}</span>
                                               
                     @enderror
                           
                     <!-- نهاية رسالة التحقق من صحة البيانات المضافة -->

                                 
              <br>
              <label for="donation_desc" style="font-size: 1.2em ; padding-bottom: 1%"  > وصـف التـبـرع </label> 
              <textarea class="form-control" name="donation_desc" id="donation_desc" placeholder="وصـف التـبـرع" style="font-size: 1.1em "  required></textarea>
                  <!-- رسالة التحقق من صحة البيانات المضافة -->
                     @error('dontaion_desc')
                     <span class="text-danger"> {{ $message }}</span>
                                
                     @enderror
            
                  <!-- نهاية رسالة التحقق من صحة البيانات المضافة -->

              
              <br>
              <label for="donation_quantity" style="font-size: 1.2em ; padding-bottom: 1%"  > كميـة التبـرع</label> 
              <input type="number" class="form-control" name="donation_quantity" id="donation_quantity" placeholder="كميـة التبـرع" style="font-size: 1.1em " min=1 required>
            <!-- رسالة التحقق من صحة البيانات المضافة -->
            @error('donation_quantity')
            <span class="text-danger"> {{ $message }}</span>
            
          @enderror

            <!-- نهاية رسالة التحقق من صحة البيانات المضافة -->
         
      <br>
      
              <label for="donation_exp" style="font-size: 1.2em ; padding-bottom: 1%"  > تاريخ الانتهاء</label> 
              <input type="date" class="form-control" name="donation_exp" id="donation_exp" placeholder="تاريخ الانتهاء" style="font-size: 1.1em " >
<br>

             
         
          <label for="neigh_id" style="font-size: 1.2em ; padding-bottom: 1% ; padding-right: 0%"> المديريـة </label> 
          <select class="form-control" name="donation_dir" required>
              @foreach ($directorate as $directorate ) 
         
                <option value="{{ $directorate->dir_id }}" style="font-size: 1.2em">
                  {{ $directorate->dir_name}}
                </option>
                
             @endforeach 

            </select>

             <!-- رسالة التحقق من صحة البيانات المضافة -->
                @error('donation_dir')
                <span class="text-danger"> {{ $message }}</span>
                           
                @enderror
       
             <!-- نهاية رسالة التحقق من صحة البيانات المضافة -->

            <br>
           
            <label for="delivery_place" style="font-size: 1.2em ; padding-bottom: 1%"  > مكـان التسليـم</label> 
            <input type="text" class="form-control" name="delivery_place" id="delivery_place" placeholder="مكـان التسليـم" style="font-size: 1.1em "  required>
                 <!-- رسالة التحقق من صحة البيانات المضافة -->
                     @error('donation_quantity')
                     <span class="text-danger"> {{ $message }}</span>
            
                      @enderror

                <!-- نهاية رسالة التحقق من صحة البيانات المضافة -->
           
            <br>

            
            <label for="delivery_time" style="font-size: 1.2em ; padding-bottom: 1%"  > وقـت التسليـم</label> 
            <input type="time" class="form-control" name="delivery_time" id="delivery_time" placeholder="مكـان التسليـم" style="font-size: 1.1em "  required>
                 <!-- رسالة التحقق من صحة البيانات المضافة -->
                     @error('delivery_time')
                     <span class="text-danger"> {{ $message }}</span>
            
                      @enderror

                <!-- نهاية رسالة التحقق من صحة البيانات المضافة -->
           
            <br>
            <button type="submit" class="btn btn-primary col-lg-12" style="font-size: 1.1em ; background-color: #181f39 ; "> تعديـل </button>

              </div>
          </div>
      </div>
  </div>
   <!--End Edit Modal -->
</div>
              </div>
            </div>
          </div>
        </div>
        

    <!-- main-panel ends -->
  </div>
     
  <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

  <!-- plugins:js -->
<script src="vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="vendors/chart.js/Chart.min.js"></script>
<script src="vendors/datatables.net/jquery.dataTables.js"></script>
<script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="js/dataTables.select.min.js"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="js/template.js"></script>
<script src="js/settings.js"></script>
<script src="js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="js/dashboard.js"></script>
<script src="js/Chart.roundedBarCharts.js"></script>
<!-- End custom js for this page-->
<!-- script style 1 -->
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
	$(document).ready(function(){
		$(".wish-icon i").click(function(){
			$(this).toggleClass("fa-heart fa-heart-o");
		});
	});	
</script> --}}
<!--end script style 1 -->


<!-- script style 2 -->
{{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
<!--end script style 1 -->

{{-- كود جافاسكربت لتعبئة حقول النموذج  --}}
<script>

  $(document).on('click','.editbtn', function (e) {
   var _this = $(this).parents('tr');
   //لاضافة القيم في الحقول
   $('#donation_id').val(_this.find('.tdonation_id').text());
   $('#user_id').val(_this.find('.tuser_id').text());
   $('#cat_id').val(_this.find('.tcat_id').text());
   $('#donation_title').val(_this.find('.tdonation_title').text());
   $('#donation_desc').val(_this.find('.tdonation_desc').text());
  //  $('#image').attr('src', _this.find('tdonation_image'));
  $('#donation_quantity').val(_this.find('.tdonation_quantity'));
  $('#delivery_place').val(_this.find('.tdelivery_place').text());
  $('#delivery_time').val(_this.find('.tdelivery_time').text());
  
   

   //$('#dir_name').val(_this.find('.tdir_name').text())     
   



    });
    $(document).ready(function(){
          $(".alert").delay(5000).slideUp(300);
    });


</script>

<script>
  $(document).on("click", ".browse", function() {
var file = $(this).parents().find(".file");
file.trigger("click");
});
$('input[type="file"]').change(function(e) {
var fileName = e.target.files[0].name;
$("#file").val(fileName);

var reader = new FileReader();
reader.onload = function(e) {
  // get loaded data and render thumbnail.
  document.getElementById("preview").src = e.target.result;
};
// read the image file as a data URL.
reader.readAsDataURL(this.files[0]);
});


</script>

<script language="javascript">
 var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0');
  var yyyy = today.getFullYear();

  today = yyyy + '-' + mm + '-' + dd;
  $('#donation_exp').attr('min',today);

</script>


</body>
</html>                                		