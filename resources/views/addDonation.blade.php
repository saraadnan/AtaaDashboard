@include('menu.menuBen')

      <!--form -->
    <div class="main-panel" >        
      <div class="content-wrapper">
         <div class="row" >
          <div class="col-md-6 grid-margin stretch-card col-lg-6 col-sm-12" style="margin-right:16em" >
             <div class="card">
                 <div class="card-body"  >
                    <h4 class="card-title " style="text-align: center ; font-size: 1.4em; color: #181f39 " > اضـــافــــة تــبــــرع </h4>
                     
             <form class="forms-sample  form-check-danger" id="image-form" method="POST" action="{{ url('insertdon') }}" enctype="multipart/form-data">
               @csrf


                <div class="form-group" style=" text-align: right ;"  >  
                    
                    
                    <div class=" col-sm-6 col-lg-12" >
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
                         
                      
                      <label for="donation_exp" style="font-size: 1.2em ; padding-bottom: 1%"  > الصنـف </label>
                      <select class="form-control" name="cat_id" style="font-size: 1.2em" id="cat_id" >
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
                  
                  <label for="donation_title" style="font-size: 1.2em ; padding-bottom: 1%"  >  عنـوان التبـرع  </label> 
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
          <div id="otherFieldGroupDiv">
                  <label for="donation_exp" style="font-size: 1.2em ; padding-bottom: 1%"  > تاريخ الانتهاء</label> 
                  <input type="date" class="form-control" name="donation_exp" id="donation_exp" placeholder="تاريخ الانتهاء" style="font-size: 1.1em " >
          </div>
                  <br>

                 
             
              <label for="neigh_id" style="font-size: 1.2em ; padding-bottom: 1% ; padding-right: 0%"> المديريـة </label> 
              <select class="form-control" name="donation_dir" style="font-size: 1.2em" required >
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

              

               

               


              </div>





               <br>
                <button type="submit" class="btn btn-primary mr-2" style="font-size: 1.1em ; background-color: #181f39 ; "> اضـافة </button>
                 <button class="btn btn-light" style="font-size: 1.1em"  >الغـاء</button> 
               






              </form>
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


<script>

$(document).ready(function () {
    toggleFields(); // call this first so we start out with the correct visibility depending on the selected form values
    // this will call our toggleFields function every time the selection value of our other field changes
    $("#cat_id").change(function () {
        toggleFields();
    });

});
// this toggles the visibility of other server
function toggleFields() {
    if ($("#cat_id").val() === "مواد غذائية")
        $("#otherFieldGroupDiv").show();
    else
        $("#otherFieldGroupDiv").hide();
}
//   $("#cat_id").change(function() {
//   if ($(this).val() == "مواد غذائية") {
//     $('#otherFieldGroupDiv').show();
//     $('#donation_exp').attr('required', '');
//     // $('#donation_exp').attr('data-error', 'This field is required.');
//   } else {
//     $('#donation_exp').hide();
//     $('#donation_exp').removeAttr('required');
//     // $('#donation_exp').removeAttr('data-error');
//   }
// });
// $("#cat_id").trigger("change");

// $("#cat_id").change(function() {
//   if ($(this).val() == "ملابس ") {
//     $('#otherFieldGroupDiv').show();
//     $('#donation_exp').attr('required', '');
//     $('#donation_exp').attr('data-error', 'This field is required.');
//     $('#donation_exp').attr('required', '');
//     $('#donation_exp').attr('data-error', 'This field is required.');
//   } else {
//     $('#otherFieldGroupDiv').hide();
//     $('#donation_exp').removeAttr('required');
//     $('#donation_exp').removeAttr('data-error');
//     $('#donation_exp').removeAttr('required');
//     $('#donation_exp').removeAttr('data-error');
//   }
// });
// $("#cat_id").trigger("change");
  </script>

</body>

</html>